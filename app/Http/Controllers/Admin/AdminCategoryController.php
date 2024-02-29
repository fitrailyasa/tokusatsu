<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Franchise;
use App\Models\Era;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use App\Exports\CategoryExport;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $eras = Era::all();
        $franchises = Franchise::all();
        $categories = Category::latest('id')->get();
        return view('admin.category.index', compact('categories', 'eras', 'franchises'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new CategoryImport, $file);

        return redirect()->route('admin.category.index')->with('sukses', 'Berhasil Import Category!');
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'Data Category.xlsx');
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
