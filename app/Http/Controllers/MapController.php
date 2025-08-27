<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class MapController extends Controller
{
    public function index()
    {
        return view('client.map.index');
    }

    public function province($province)
    {
        $basePath = storage_path("app/public/geojson/");
        $provPath = collect(File::directories($basePath))
            ->first(fn($dir) => str_contains($dir, "id") && str_contains($dir, "_$province"));

        if (!$provPath) {
            abort(404, "Province not found");
        }

        $regency = collect(File::directories($provPath))
            ->map(fn($dir) => basename($dir));

        $provFolder = str_replace(storage_path('app/public'), '', $provPath);
        $provFolder = str_replace('\\', '/', $provFolder);
        $provFolder = '/' . ltrim($provFolder, '/');

        return view('client.map.province', [
            'province' => ucwords(str_replace("_", " ", $province)),
            'regency' => $regency,
            'provFolder' => asset('storage' . $provFolder),
        ]);
    }

    public function regency($province, $regency)
    {
        $basePath = storage_path("app/public/geojson/");
        $provPath = collect(File::directories($basePath))
            ->first(fn($dir) => str_ends_with($dir, "_$province"));

        if (!$provPath) {
            abort(404, "Province not found");
        }

        $regPath = collect(File::directories($provPath))
            ->first(fn($dir) => str_contains($dir, "_$regency"));

        if (!$regPath) {
            abort(404, "Regency not found");
        }

        $files = collect(File::files($regPath))
            ->map(fn($file) => $file->getFilename())
            ->filter(fn($file) => str_ends_with($file, '.geojson'))
            ->values();

        $regFolder = str_replace(storage_path('app/public'), '', $regPath);
        $regFolder = str_replace('\\', '/', $regFolder);
        $regFolder = '/' . ltrim($regFolder, '/');

        return view('client.map.regency', [
            'province' => ucwords(str_replace("_", " ", $province)),
            'regency' => ucwords(str_replace("_", " ", $regency)),
            'geojsonFiles' => $files,
            'regFolder' => asset('storage' . $regFolder),
        ]);
    }
}
