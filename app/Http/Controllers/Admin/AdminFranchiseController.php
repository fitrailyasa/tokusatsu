<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FranchiseImport;
use App\Exports\FranchiseExport;
use App\Http\Requests\FranchiseRequest;

class AdminFranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::latest('id')->get();
        return view('admin.franchise.index', compact('franchises'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new FranchiseImport, $file);

        return back()->with('alert', 'Berhasil Import Data Franchise!');
    }

    public function export()
    {
        return Excel::download(new FranchiseExport, 'Data Franchise.xlsx');
    }

    public function store(FranchiseRequest $request)
    {
        $franchise = Franchise::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data Franchise!');
    }

    public function update(FranchiseRequest $request, $id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data Franchise!');
    }

    public function destroy($id)
    {
        Franchise::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Franchise!');
    }

    public function destroyAll()
    {
        Franchise::truncate();
        return back()->with('alert', 'Berhasil Hapus Semua Franchise!');
    }
}
