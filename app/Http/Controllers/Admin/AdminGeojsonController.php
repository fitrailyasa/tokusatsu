<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Geojson;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GeojsonImport;
use App\Exports\GeojsonExport;
use App\Http\Requests\GeojsonRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminGeojsonController extends Controller
{
    // Middleware for geojson permissions
    public function __construct()
    {
        $this->middleware('permission:view-geojson')->only(['index']);
        $this->middleware('permission:create-geojson')->only(['store']);
        $this->middleware('permission:edit-geojson')->only(['update']);
        $this->middleware('permission:delete-geojson')->only(['destroy']);
        $this->middleware('permission:delete-all-geojson')->only(['destroyAll']);
        $this->middleware('permission:soft-delete-geojson')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all-geojson')->only(['softDeleteAll']);
        $this->middleware('permission:restore-geojson')->only(['restore']);
        $this->middleware('permission:restore-all-geojson')->only(['restoreAll']);
        $this->middleware('permission:import-geojson')->only(['import']);
        $this->middleware('permission:export-geojson')->only(['exportExcel', 'exportPDF']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $geojsons = Geojson::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $geojsons = Geojson::withTrashed()->paginate($validPerPage);
        }

        return view("admin.geojson.index", compact('geojsons', 'search', 'perPage'));
    }

    // Handle import data geojson from excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10240|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new GeojsonImport, $file);

        return back()->with('success', 'Successfully Import Data GeoJSON!');
    }

    // Handle export data geojson to excel file
    public function exportExcel()
    {
        return Excel::download(new GeojsonExport, 'Data Geojson.xlsx');
    }

    // Handle export data geojson to pdf file
    public function exportPDF()
    {
        $geojsons = Geojson::withTrashed()->get();
        $pdf = Pdf::loadView('admin.geojson.pdf.template', compact('geojsons'));

        return $pdf->stream('Data Geojson.pdf');
    }

    // Handle store data geojson
    public function store(GeojsonRequest $request)
    {
        $validated = $request->validated();

        $geometry = json_decode($validated['geometry'], true);
        if (!self::isValidGeometry($geometry)) {
            return back()->withInput()->withErrors(['geometry' => 'Invalid GeoJSON geometry.']);
        }

        $properties = !empty($validated['properties']) ? json_decode($validated['properties'], true) : null;

        Geojson::create([
            'name'       => $validated['name'],
            'desc'       => $validated['desc'] ?? null,
            'geometry'   => $geometry,
            'properties' => $properties,
        ]);

        return back()->with('success', 'Successfully Create Data GeoJSON!');
    }

    // Handle update data geojson
    public function update(GeojsonRequest $request, $id)
    {
        $geojson = Geojson::findOrFail($id);
        $validated = $request->validated();

        $geometry = json_decode($validated['geometry'], true);
        if (!self::isValidGeometry($geometry)) {
            return back()->withInput()->withErrors(['geometry' => 'Invalid GeoJSON geometry.']);
        }

        $properties = !empty($validated['properties']) ? json_decode($validated['properties'], true) : null;

        $geojson->update([
            'name'       => $validated['name'],
            'desc'       => $validated['desc'] ?? null,
            'geometry'   => $geometry,
            'properties' => $properties,
        ]);

        return back()->with('success', 'Successfully Edit Data GeoJSON!');
    }

    // Handle hard delete data geojson
    public function destroy($id)
    {
        Geojson::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Data GeoJSON!');
    }

    // Handle hard delete all data geojson
    public function destroyAll()
    {
        Geojson::truncate();
        return back()->with('success', 'Successfully Delete All GeoJSON!');
    }

    // Handle soft delete data geojson
    public function softDelete($id)
    {
        Geojson::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete Data GeoJSON!');
    }

    // Handle soft delete all data geojson
    public function softDeleteAll()
    {
        Geojson::query()->delete();
        return back()->with('success', 'Successfully Delete All GeoJSON!');
    }

    // Handle restore data geojson
    public function restore($id)
    {
        Geojson::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore GeoJSON!');
    }

    // Handle restore all data geojson
    public function restoreAll()
    {
        Geojson::onlyTrashed()->restore();
        return back()->with('success', 'Successfully Restore All GeoJSON!');
    }

    public function asGeoJSON()
    {
        $features = Geojson::all()->map(function ($f) {
            return [
                'type'       => 'Feature',
                'geometry'   => $f->geometry,
                'properties' => array_merge([
                    'id'          => $f->id,
                    'name'        => $f->name,
                    'desc'        => $f->desc,
                    'created_at'  => $f->created_at,
                ], $f->properties ?? []),
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $features,
        ]);
    }

    private static function isValidGeometry(?array $geom): bool
    {
        if (!$geom || !isset($geom['type'])) return false;
        $type = $geom['type'];
        $hasCoords = isset($geom['coordinates']) || isset($geom['geometries']); // GeometryCollection
        $validType = in_array($type, [
            'Point',
            'MultiPoint',
            'LineString',
            'MultiLineString',
            'Polygon',
            'MultiPolygon',
            'GeometryCollection'
        ], true);
        return $validType && $hasCoords;
    }
}
