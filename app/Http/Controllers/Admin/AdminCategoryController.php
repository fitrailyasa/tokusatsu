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
    public function __construct()
    {
        $this->middleware('permission:view-category')->only(['index']);
        $this->middleware('permission:create-category')->only(['store']);
        $this->middleware('permission:edit-category')->only(['update']);
        $this->middleware('permission:delete-category')->only(['destroy']);
        $this->middleware('permission:delete-all-category')->only(['destroyAll']);
        $this->middleware('permission:soft-delete-category')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all-category')->only(['softDeleteAll']);
        $this->middleware('permission:restore-category')->only(['restore']);
        $this->middleware('permission:restore-all-category')->only(['restoreAll']);
        $this->middleware('permission:import-category')->only(['import']);
        $this->middleware('permission:export-category')->only(['export']);
    }

    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $eras = Era::all();
        $franchises = Franchise::all();

        if ($search) {
            $categories = Category::withTrashed()
                ->with(['era', 'franchise'])
                ->when($search, function ($query, $search) {
                    $query->where(function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%")
                            ->orWhere('desc', 'like', "%{$search}%")
                            ->orWhereHas('era', function ($q) use ($search) {
                                $q->where('name', 'like', "%{$search}%");
                            })
                            ->orWhereHas('franchise', function ($q) use ($search) {
                                $q->where('name', 'like', "%{$search}%");
                            });
                    });
                })
                ->paginate($validPerPage);
        } else {
            $categories = Category::withTrashed()->paginate($validPerPage);
        }

        return view("admin.category.index", compact('categories', 'eras', 'franchises', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new CategoryImport, $file);

        return back()->with('message', 'Berhasil Import Data Category!');
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
            $file_name = $category->name . '_' . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('message', 'Berhasil Tambah Data Category!');
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $category->name . '_' . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('message', 'Berhasil Edit Data Category!');
    }

    public function destroy($id)
    {
        Category::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('message', 'Berhasil Hapus Data Category!');
    }

    public function destroyAll()
    {
        Category::truncate();
        return back()->with('message', 'Berhasil Hapus Semua Category!');
    }

    public function softDelete($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('message', 'Berhasil Hapus Data Category!');
    }

    public function softDeleteAll()
    {
        Category::query()->delete();
        return back()->with('message', 'Berhasil Hapus Semua Category!');
    }

    public function restore($id)
    {
        Category::withTrashed()->findOrFail($id)->restore();
        return back()->with('message', 'Berhasil Restore Category!');
    }

    public function restoreAll()
    {
        Category::onlyTrashed()->restore();
        return back()->with('message', 'Berhasil Restore Semua Category!');
    }
}
