<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;

class DownloadController extends Controller
{
    public function handle($token)
    {
        try {
            $fileId = Crypt::decrypt($token);
        } catch (\Exception $e) {
            abort(403);
        }

        $driveUrl = "https://drive.google.com/uc?export=download&id={$fileId}";

        return redirect()->away($driveUrl);
    }
}
