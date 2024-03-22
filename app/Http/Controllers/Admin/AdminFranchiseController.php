<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        $franchise = Franchise::create([
            'id' => Str::uuid(),
            'name' => $request->name,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $franchise->name . '_' . $franchise->category->name . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Tambah Franchise!');
    }

    public function update(Request $request, $id)
    {
        $franchise = Franchise::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $franchise->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $franchise->name . '_' . $franchise->category->name . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Edit Franchise!');
    }

    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Hapus Franchise!');
    }
}
