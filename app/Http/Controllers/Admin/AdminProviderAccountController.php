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

        $existingAccount = ProviderAccount::where('email', $request->input('email'))->first();

        $this->client->setAccessToken($token);

        $oauth2 = new Oauth2($this->client);
        $userinfo = $oauth2->userinfo->get();

        if ($existingAccount && empty($token['refresh_token'])) {
            $token['refresh_token'] = $existingAccount->access_token['refresh_token'] ?? null;
        }

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

        $orderBy = $request->get('orderBy', 'name');

        $allowed = ['name', 'modifiedTime', 'createdTime', 'viewedByMeTime'];
        if (!in_array($orderBy, $allowed)) {
            $orderBy = 'name';
        }

        $files = $service->files->listFiles([
            'pageSize' => 200,
            'fields' => 'files(id, name, modifiedTime, permissions(type, role))',
            'orderBy' => $orderBy,
            'q' => "name contains 'episode'",
        ])->getFiles();

        $files = collect($files)->map(function ($file) {
            $file->is_public = collect($file->permissions ?? [])
                ->contains(fn($p) => $p->type === 'anyone');

            return $file;
        })->sortBy(fn($f) => strtolower($f->name))->values();

        return view('admin.provider.show', compact('files', 'email', 'orderBy'));
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
                'Nama File' => $f->name,
                'Link Google Drive' => "https://drive.google.com/file/d/{$f->id}/view?usp=sharing",
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
                return ['Nama File', 'Link Google Drive'];
            }
        }, "Account_{$email}.xlsx");
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
