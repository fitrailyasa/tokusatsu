<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Franchise;
use App\Models\Era;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $eras = Era::all();
        $franchises = Franchise::all();
        $categories = Category::all();
        return view('admin.category.index', compact('categories', 'eras', 'franchises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'era_id' => 'required',
            'franchise_id' => 'required',
            'name' => 'required|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.category.index')->with('sukses', 'Berhasil Tambah Category!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'era_id' => 'required',
            'franchise_id' => 'required',
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.category.index')->with('sukses', 'Berhasil Edit Category!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('sukses', 'Berhasil Hapus Category!');
    }
}
