<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MapApiController extends Controller
{
    public function province($province)
    {
        $basePath = storage_path("app/public/geojson/");
        $provPath = collect(File::directories($basePath))
            ->first(fn($dir) => str_contains($dir, "id") && str_contains($dir, "_$province"));

        if (!$provPath) {
            abort(404, "Province not found");
        }

        $regencies = collect(File::directories($provPath))
            ->map(fn($dir) => basename($dir));

        $provFolder = str_replace(storage_path('app/public'), '', $provPath);
        $provFolder = str_replace('\\', '/', $provFolder);
        $provFolder = '/' . ltrim($provFolder, '/');

        return response()->json([
            'message' => 'Province retrieved successfully',
            'data' => [
                'province' => ucwords(str_replace("_", " ", $province)),
                'regencies' => $regencies,
                'provFolder' => asset('storage' . $provFolder),
            ],
            'status' => 200,
            'success' => true,
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
            ->reverse()
            ->values();

        $regFolder = str_replace(storage_path('app/public'), '', $regPath);
        $regFolder = str_replace('\\', '/', $regFolder);
        $regFolder = '/' . ltrim($regFolder, '/');

        return response()->json([
            'message' => 'Regency retrieved successfully',
            'data' => [
                'province' => ucwords(str_replace("_", " ", $province)),
                'regency' => ucwords(str_replace("_", " ", $regency)),
                'geojsonFiles' => $files,
                'regFolder' => asset('storage' . $regFolder),
            ],
            'status' => 200,
            'success' => true,
        ]);
    }
}
