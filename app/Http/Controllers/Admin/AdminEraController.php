<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Era;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EraImport;
use App\Exports\EraExport;
use App\Http\Requests\EraRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminEraController extends Controller
{
    // Middleware for era permissions
    public function __construct()
    {
        $this->middleware('permission:view-era')->only(['index']);
        $this->middleware('permission:create-era')->only(['store']);
        $this->middleware('permission:edit-era')->only(['update']);
        $this->middleware('permission:delete-era')->only(['destroy']);
        $this->middleware('permission:delete-all-era')->only(['destroyAll']);
        $this->middleware('permission:soft-delete-era')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all-era')->only(['softDeleteAll']);
        $this->middleware('permission:restore-era')->only(['restore']);
        $this->middleware('permission:restore-all-era')->only(['restoreAll']);
        $this->middleware('permission:import-era')->only(['import']);
        $this->middleware('permission:export-era')->only(['exportExcel', 'exportPDF']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $eras = Era::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $eras = Era::withTrashed()->paginate($validPerPage);
        }

        return view("admin.era.index", compact('eras', 'search', 'perPage'));
    }

    // Handle import data era from excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10240|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new EraImport, $file);

        return back()->with('success', 'Successfully Import Data Era!');
    }

    // Handle export data era to excel file
    public function exportExcel()
    {
        return Excel::download(new EraExport, 'Data Era.xlsx');
    }

    // Handle export data era to pdf file
    public function exportPDF()
    {
        $eras = Era::withTrashed()->get();
        $pdf = Pdf::loadView('admin.era.pdf.template', compact('eras'));

        return $pdf->stream('Data Era.pdf');
    }

    // Handle store data era
    public function store(EraRequest $request)
    {
        $era = Era::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Create Data Era!');
    }

    // Handle update data era
    public function update(EraRequest $request, $id)
    {
        $era = Era::findOrFail($id);
        $era->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Edit Data Era!');
    }

    // Handle hard delete data era
    public function destroy($id)
    {
        Era::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Data Era!');
    }

    // Handle hard delete all data era
    public function destroyAll()
    {
        Era::truncate();
        return back()->with('success', 'Successfully Delete All Era!');
    }

    // Handle soft delete data era
    public function softDelete($id)
    {
        Era::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete Data Era!');
    }

    // Handle soft delete all data era
    public function softDeleteAll()
    {
        Era::query()->delete();
        return back()->with('success', 'Successfully Delete All Era!');
    }

    // Handle restore data era
    public function restore($id)
    {
        Era::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore Era!');
    }

    // Handle restore all data era
    public function restoreAll()
    {
        Era::onlyTrashed()->restore();
        return back()->with('success', 'Successfully Restore All Era!');
    }
}
