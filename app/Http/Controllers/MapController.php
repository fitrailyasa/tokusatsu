<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\AddressDistrict;
use App\Models\Geojson;

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

        $regencies = collect(File::directories($provPath))
            ->map(fn($dir) => basename($dir));

        $provFolder = str_replace(storage_path('app/public'), '', $provPath);
        $provFolder = str_replace('\\', '/', $provFolder);
        $provFolder = '/' . ltrim($provFolder, '/');

        return view('client.map.province', [
            'province' => ucwords(str_replace("_", " ", $province)),
            'regencies' => $regencies,
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

        $regFolder = str_replace(storage_path('app/public'), '', $regPath);
        $regFolder = str_replace('\\', '/', $regFolder);
        $regFolder = '/' . ltrim($regFolder, '/');
        $regFolderUrl = asset('storage' . $regFolder);

        $staticGeojsons = collect(File::files($regPath))
            ->filter(fn($file) => str_ends_with($file->getFilename(), '.geojson'))
            ->map(fn($file) => $regFolderUrl . '/' . $file->getFilename())
            ->reverse()
            ->values();

        preg_match('/id(\d+)_/', basename($regPath), $matches);
        $regencyId = $matches[1] ?? null;
        $districtIds = AddressDistrict::where('regency_id', $regencyId)->pluck('id');

        $dynamicGeojsons = Geojson::whereIn('district_id', $districtIds)->get() ?? [];

        return view('client.map.regency', [
            'province' => ucwords(str_replace("_", " ", $province)),
            'regency' => ucwords(str_replace("_", " ", $regency)),
            'staticGeojsons' => $staticGeojsons,
            'dynamicGeojsons' => $dynamicGeojsons,
        ]);
    }

    public function district($province, $regency, $district)
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

        $regFolder = str_replace(storage_path('app/public'), '', $regPath);
        $regFolder = str_replace('\\', '/', $regFolder);
        $regFolder = '/' . ltrim($regFolder, '/');

        $staticGeojsons = collect(File::files($regPath))
            ->filter(fn($file) => str_contains($file->getFilename(), $district))
            ->filter(fn($file) => str_ends_with($file->getFilename(), '.geojson'))
            ->map(fn($file) => asset('storage' . $regFolder . '/' . $file->getFilename()))
            ->reverse()
            ->values();

        preg_match('/id(\d+)_/', basename($regPath), $matches);
        $regencyId = $matches[1] ?? null;
        $districtIds = AddressDistrict::where('regency_id', $regencyId)->pluck('id');

        $dynamicGeojsons = Geojson::whereIn('district_id', $districtIds)->get() ?? [];

        if (!$staticGeojsons->count()) {
            abort(404, "District not found");
        }

        return view('client.map.district', [
            'province' => ucwords(str_replace("_", " ", $province)),
            'regency' => ucwords(str_replace("_", " ", $regency)),
            'district' => ucwords(str_replace("_", " ", $district)),
            'staticGeojsons' => $staticGeojsons,
            'dynamicGeojsons' => $dynamicGeojsons,
        ]);
    }
}
