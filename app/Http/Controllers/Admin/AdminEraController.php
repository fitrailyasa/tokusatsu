<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Era;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EraImport;
use App\Exports\EraExport;

class AdminEraController extends Controller
{
    public function index()
    {
        $eras = Era::latest('id')->get();
        return view('admin.era.index', compact('eras'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new EraImport, $file);

        return redirect()->route('admin.era.index')->with('sukses', 'Berhasil Import Era!');
    }

    public function export()
    {
        return Excel::download(new EraExport, 'Data Era.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $era = Era::create([
            'id' => Str::uuid(),
            'name' => $request->name,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $era->name . '_' . $era->category->name . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $data->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('admin.era.index')->with('sukses', 'Berhasil Tambah Era!');
    }

    public function update(Request $request, $id)
    {
        $era = Era::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $era->update([
            'id' => Str::uuid(),
            'name' => $request->name,
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $era->name . '_' . $era->category->name . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('admin.era.index')->with('sukses', 'Berhasil Edit Era!');
    }

    public function destroy($id)
    {
        $era = Era::findOrFail($id);
        $era->delete();

        return redirect()->route('admin.era.index')->with('sukses', 'Berhasil Hapus Era!');
    }
}
