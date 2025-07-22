<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FranchiseImport;
use App\Exports\FranchiseExport;
use App\Http\Requests\FranchiseRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminFranchiseController extends Controller
{
    // Middleware for franchise permissions
    public function __construct()
    {
        $this->middleware('permission:view-franchise')->only(['index']);
        $this->middleware('permission:create-franchise')->only(['store']);
        $this->middleware('permission:edit-franchise')->only(['update']);
        $this->middleware('permission:delete-franchise')->only(['destroy']);
        $this->middleware('permission:delete-all-franchise')->only(['destroyAll']);
        $this->middleware('permission:soft-delete-franchise')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all-franchise')->only(['softDeleteAll']);
        $this->middleware('permission:restore-franchise')->only(['restore']);
        $this->middleware('permission:restore-all-franchise')->only(['restoreAll']);
        $this->middleware('permission:import-franchise')->only(['import']);
        $this->middleware('permission:export-franchise')->only(['exportExcel', 'exportPDF']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $franchises = Franchise::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $franchises = Franchise::withTrashed()->paginate($validPerPage);
        }

        return view("admin.franchise.index", compact('franchises', 'search', 'perPage'));
    }

    // Handle import data franchise from excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10240|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new FranchiseImport, $file);

        return back()->with('success', 'Successfully Import Data Franchise!');
    }

    // Handle export data franchise to excel file
    public function exportExcel()
    {
        return Excel::download(new FranchiseExport, 'Data Franchise.xlsx');
    }

    // Handle export data franchise to pdf file
    public function exportPDF()
    {
        $franchises = Franchise::withTrashed()->get();
        $pdf = Pdf::loadView('admin.franchise.pdf.template', compact('franchises'));

        return $pdf->stream('Data Franchise.pdf');
    }

    // Handle store data franchise
    public function store(FranchiseRequest $request)
    {
        $franchise = Franchise::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Create Data Franchise!');
    }

    // Handle update data franchise
    public function update(FranchiseRequest $request, $id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Edit Data Franchise!');
    }

    // Handle hard delete data franchise
    public function destroy($id)
    {
        Franchise::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Data Franchise!');
    }

    // Handle hard delete all data franchise
    public function destroyAll()
    {
        Franchise::truncate();
        return back()->with('success', 'Successfully Delete All Franchise!');
    }

    // Handle soft delete data franchise
    public function softDelete($id)
    {
        Franchise::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete Data Franchise!');
    }

    // Handle soft delete all data franchise
    public function softDeleteAll()
    {
        Franchise::query()->delete();
        return back()->with('success', 'Successfully Delete All Franchise!');
    }

    // Handle restore data franchise
    public function restore($id)
    {
        Franchise::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore Franchise!');
    }

    // Handle restore all data franchise
    public function restoreAll()
    {
        Franchise::onlyTrashed()->restore();
        return back()->with('success', 'Successfully Restore All Franchise!');
    }
}
