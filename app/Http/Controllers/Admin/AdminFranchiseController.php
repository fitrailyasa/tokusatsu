<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FranchiseImport;
use App\Exports\FranchiseExport;

class AdminFranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::all();
        return view('admin.franchise.index', compact('franchises'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new FranchiseImport, $file);

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Import Franchise!');
    }

    public function export()
    {
        return Excel::download(new FranchiseExport, 'Data Franchise.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Franchise::create($request->all());

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Tambah Franchise!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $franchise = Franchise::findOrFail($id);
        $franchise->update($request->all());

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Edit Franchise!');
    }

    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Hapus Franchise!');
    }
}
