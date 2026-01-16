<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Uploadable
{
    public function uploadImage($file, $slug, $folder = 'uploads')
    {
        $filename = $slug . '_' . time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs($folder, $filename, 'public');

        return $folder . '/' . $filename;
    }

    public function deleteImage($filename, $folder = 'uploads')
    {
        if ($filename && Storage::disk('public')->exists($folder . '/' . $filename)) {
            Storage::disk('public')->delete($folder . '/' . $filename);
        }
    }
}
