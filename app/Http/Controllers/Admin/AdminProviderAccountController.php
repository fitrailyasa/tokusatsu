<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Oauth2;
use App\Models\ProviderAccount;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminProviderAccountController extends Controller
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('app/credentials.json'));
        $this->client->addScope([
            Drive::DRIVE,
            Oauth2::USERINFO_EMAIL
        ]);
        $this->client->setRedirectUri(route('admin.auth.callback'));
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
    }

    public function index()
    {
        $accounts = ProviderAccount::all();

        return view('admin.provider.index', compact('accounts'));
    }

    public function login()
    {
        $authUrl = $this->client->createAuthUrl();
        return redirect()->away($authUrl);
    }

    public function callback(Request $request)
    {
        if (!$request->has('code')) {
            return redirect()->route('admin.auth')
                ->with('error', 'Login failed: no auth code');
        }

        $token = $this->client->fetchAccessTokenWithAuthCode($request->code);

        if (isset($token['error'])) {
            return redirect()->route('admin.auth')
                ->with('error', $token['error_description'] ?? 'OAuth error');
        }

        $this->client->setAccessToken($token);

        $oauth2 = new Oauth2($this->client);
        $userinfo = $oauth2->userinfo->get();

        ProviderAccount::updateOrCreate(
            ['email' => $userinfo->email],
            ['access_token' => $token]
        );

        return redirect()->route('admin.auth')
            ->with('success', "Account {$userinfo->email} successfully logged in!");
    }

    public function files(Request $request, string $email)
    {
        $account = ProviderAccount::where('email', $email)->firstOrFail();
        $this->useAccountToken($account);

        $service = new Drive($this->client);

        $folderId = $request->get('folder', 'root');

        $query = "'{$folderId}' in parents and trashed = false";

        $files = $service->files->listFiles([
            'q' => $query,
            'fields' => 'files(id,name,mimeType,modifiedTime,permissions(type))',
            'orderBy' => 'folder,name',
        ])->getFiles();

        $files = collect($files)->map(function ($file) {
            $file->is_folder = $file->mimeType === 'application/vnd.google-apps.folder';

            $file->is_public = collect($file->permissions ?? [])
                ->contains(fn($p) => $p->type === 'anyone');

            return $file;
        })->sortBy(fn($f) => [$f->is_folder ? 0 : 1, strtolower($f->name)])
            ->values();

        $breadcrumbs = $this->getBreadcrumbs($service, $folderId);

        return view('admin.provider.show', compact(
            'files',
            'email',
            'folderId',
            'breadcrumbs'
        ));
    }

    private function getBreadcrumbs(Drive $service, string $folderId): array
    {
        $breadcrumbs = [];

        while ($folderId !== 'root') {
            $folder = $service->files->get($folderId, [
                'fields' => 'id,name,parents',
            ]);

            array_unshift($breadcrumbs, [
                'id' => $folder->id,
                'name' => $folder->name,
            ]);

            $folderId = $folder->parents[0] ?? 'root';
        }

        array_unshift($breadcrumbs, [
            'id' => 'root',
            'name' => 'Root',
        ]);

        return $breadcrumbs;
    }

    public function renameFile(Request $request, string $email, string $fileId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $account = ProviderAccount::where('email', $email)->firstOrFail();
        $this->useAccountToken($account);

        $service = new Drive($this->client);

        $fileMetadata = new \Google\Service\Drive\DriveFile([
            'name' => $request->name,
        ]);

        $service->files->update($fileId, $fileMetadata);

        return response()->json([
            'success' => true,
            'message' => 'File name updated successfully',
        ]);
    }

    public function upload(Request $request, string $email)
    {
        $request->validate([
            'file' => 'required|file|max:512000',
            'folder_id' => 'nullable|string',
        ]);

        $account = ProviderAccount::where('email', $email)->firstOrFail();
        $this->useAccountToken($account);

        $service = new Drive($this->client);

        $file = $request->file('file');

        $fileMetadata = new \Google\Service\Drive\DriveFile([
            'name' => $file->getClientOriginalName(),
            'parents' => [$request->folder_id ?? 'root'],
        ]);

        $service->files->create($fileMetadata, [
            'data' => file_get_contents($file->getRealPath()),
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
        ]);

        return back()->with('success', 'File uploaded successfully');
    }

    public function toggleStatus(string $email, string $fileId)
    {
        $account = ProviderAccount::where('email', $email)->firstOrFail();
        $this->client->setAccessToken($account->access_token);

        $service = new Drive($this->client);

        $permissions = $service->permissions->listPermissions($fileId)->getPermissions();

        $anyonePermission = collect($permissions)
            ->first(fn($p) => $p->type === 'anyone');

        if ($anyonePermission) {
            $service->permissions->delete($fileId, $anyonePermission->id);
            $message = 'File successfully set PRIVATE';
        } else {
            $permission = new \Google\Service\Drive\Permission([
                'type' => 'anyone',
                'role' => 'reader',
            ]);

            $service->permissions->create($fileId, $permission, [
                'sendNotificationEmail' => false,
            ]);

            $message = 'File successfully set PUBLIC';
        }

        return back()->with('success', $message);
    }

    public function exportExcel($email)
    {
        $account = ProviderAccount::where('email', $email)->firstOrFail();
        $this->client->setAccessToken($account->access_token);

        $service = new Drive($this->client);

        $files = $service->files->listFiles([
            'pageSize' => 200,
            'fields' => 'files(id, name)',
            'q' => "name contains 'episode'",
        ])->getFiles();

        usort($files, function ($a, $b) {
            return strnatcmp(strtolower($a->name), strtolower($b->name));
        });

        $data = collect($files)->map(function ($f) {
            return [
                'File Name' => $f->name,
                'Link' => "https://drive.google.com/file/d/{$f->id}/view?usp=sharing",
            ];
        });

        return Excel::download(new class($data) implements FromCollection, WithHeadings {
            private $data;
            public function __construct($data)
            {
                $this->data = $data;
            }
            public function collection()
            {
                return $this->data;
            }
            public function headings(): array
            {
                return ['File Name', 'Link'];
            }
        }, "Account_{$email}.xlsx");
    }

    public function delete(string $email, string $fileId)
    {
        $account = ProviderAccount::where('email', $email)->firstOrFail();
        $this->useAccountToken($account);

        $service = new Drive($this->client);

        $service->files->delete($fileId);

        return response()->json([
            'success' => true,
            'message' => 'File successfully deleted',
        ]);
    }


    public function logout($email)
    {
        ProviderAccount::where('email', $email)->delete();
        return redirect()->route('admin.auth')->with('status', "Account {$email} successfully logged out!");
    }

    private function useAccountToken(ProviderAccount $account): void
    {
        $this->client->setAccessToken($account->access_token);

        if ($this->client->isAccessTokenExpired()) {
            if (empty($account->access_token['refresh_token'])) {
                abort(401, 'Google token expired. Please login again.');
            }

            $newToken = $this->client->fetchAccessTokenWithRefreshToken(
                $account->access_token['refresh_token']
            );

            $account->update([
                'access_token' => array_merge(
                    $account->access_token,
                    $newToken
                ),
            ]);

            $this->client->setAccessToken($account->access_token);
        }
    }
}
