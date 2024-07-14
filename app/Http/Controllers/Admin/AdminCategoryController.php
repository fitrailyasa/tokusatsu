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
use App\Http\Requests\CategoryRequest;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $eras = Era::all();
        $franchises = Franchise::all();
        $categories = Category::all();

        return view('admin.category.index', compact('categories', 'eras', 'franchises'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new CategoryImport, $file);

        return back()->with('alert', 'Berhasil Import Data Category!');
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'Data Category.xlsx');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data Category!');
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data Category!');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Category!');
    }

    public function destroyAll()
    {
        Category::truncate();
        return back()->with('alert', 'Berhasil Hapus Semua Data Category!');
    }
}
