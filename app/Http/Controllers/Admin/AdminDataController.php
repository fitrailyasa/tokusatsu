<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminDataController extends Controller
{
    public function index()
    {
        $datas = Data::all();
        return view('admin.data.index', compact('datas'));
    }

    public function create()
    {
        $categories = category::all();
        return view('admin.data.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required|max:2048',
            'category_id' => 'required',
        ]);

        Data::create($request->all());

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Tambah Data!');
    }

    public function show($id)
    {
        $data = Data::findOrFail($id);
        return view('admin.data.read', compact('data'));
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id);
        $categories = category::all();
        return view('admin.data.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required|max:2048',
            'category_id' => 'required',
        ]);

        $data = Data::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Edit Data!');
    }

    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Hapus Data!');
    }
}
