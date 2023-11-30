<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use Illuminate\Http\Request;

class AdminFranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::all();
        return view('admin.franchise.index', compact('franchises'));
    }

    public function create()
    {
        return view('admin.franchise.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Franchise::create($request->all());

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Tambah Data!');
    }

    public function show($id)
    {
        $franchise = Franchise::findOrFail($id);
        return view('admin.franchise.read', compact('franchise'));
    }

    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);
        return view('admin.franchise.edit', compact('franchise'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $franchise = Franchise::findOrFail($id);
        $franchise->update($request->all());

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Edit Data!');
    }

    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return redirect()->route('admin.franchise.index')->with('sukses', 'Berhasil Hapus Data!');
    }
}
