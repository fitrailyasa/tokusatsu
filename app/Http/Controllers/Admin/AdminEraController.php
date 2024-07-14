<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Era;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EraImport;
use App\Exports\EraExport;
use App\Http\Requests\EraRequest;

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

        return back()->with('alert', 'Berhasil Import Data Era!');
    }

    public function export()
    {
        return Excel::download(new EraExport, 'Data Era.xlsx');
    }

    public function store(EraRequest $request)
    {
        $era = Era::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data Era!');
    }

    public function update(EraRequest $request, $id)
    {
        $era = Era::findOrFail($id);
        $era->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data Era!');
    }

    public function destroy($id)
    {
        Era::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Era!');
    }

    public function destroyAll()
    {
        Era::truncate();
        return back()->with('alert', 'Berhasil Hapus Semua Era!');
    }
}
