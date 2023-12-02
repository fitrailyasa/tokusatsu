<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Era;
use Illuminate\Http\Request;

class AdminEraController extends Controller
{
    public function index()
    {
        $eras = Era::latest('id')->get();
        return view('admin.era.index', compact('eras'));
    }

    public function create()
    {
        return view('admin.era.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Era::create($request->all());

        return redirect()->route('admin.era.index')->with('sukses', 'Berhasil Tambah Era!');
    }

    public function show($id)
    {
        $era = Era::findOrFail($id);
        return view('admin.era.read', compact('era'));
    }

    public function edit($id)
    {
        $era = Era::findOrFail($id);
        return view('admin.era.edit', compact('era'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $era = Era::findOrFail($id);
        $era->update($request->all());

        return redirect()->route('admin.era.index')->with('sukses', 'Berhasil Edit Era!');
    }

    public function destroy($id)
    {
        $era = Era::findOrFail($id);
        $era->delete();

        return redirect()->route('admin.era.index')->with('sukses', 'Berhasil Hapus Era!');
    }
}
