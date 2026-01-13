<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Franchise;
use App\Models\Era;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use App\Exports\CategoryExport;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminCategoryController extends Controller
{
    protected $title = "Category";

    // Middleware for category permissions
    public function __construct()
    {
        $this->middleware('permission:view:category')->only(['index']);
        $this->middleware('permission:create:category')->only(['store']);
        $this->middleware('permission:edit:category')->only(['update', 'toggleStatus']);
        $this->middleware('permission:delete:category')->only(['destroy']);
        $this->middleware('permission:delete-all:category')->only(['destroyAll']);
        $this->middleware('permission:soft-delete:category')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all:category')->only(['softDeleteAll']);
        $this->middleware('permission:restore:category')->only(['restore']);
        $this->middleware('permission:restore-all:category')->only(['restoreAll']);
        $this->middleware('permission:import:category')->only(['import']);
        $this->middleware('permission:export:category')->only(['exportExcel', 'exportPDF']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);
        $eraId = $request->input('era_id');
        $franchiseId = $request->input('franchise_id');
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $eras = Era::all();
        $franchises = Franchise::all();

        $categories = Category::withTrashed()
            ->with(['era', 'franchise'])
            ->when(!Gate::allows('edit:category'), function ($query) {
                $query->where('status', 1);
            })
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('era', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('franchise', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($eraId, function ($query, $eraId) {
                $query->where('era_id', $eraId);
            })
            ->when($franchiseId, function ($query, $franchiseId) {
                $query->where('franchise_id', $franchiseId);
            })
            ->latest('first_aired')
            ->paginate($validPerPage);

        return view("admin.category.index", compact('categories', 'eras', 'franchises', 'eraId', 'franchiseId', 'search', 'perPage'));
    }

    // Handle toggle status category
    public function toggleStatus($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();

        return redirect()->back()->with('success', 'Successfully Change Status ' . $this->title . '!');
    }

    // Handle import data category from excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10240|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new CategoryImport, $file);

        return back()->with('success', 'Successfully Import Data ' . $this->title . '!');
    }

    // Handle export data category to excel file
    public function exportExcel()
    {
        return Excel::download(new CategoryExport, 'Data ' . $this->title . '.xlsx');
    }

    // Handle export data category to pdf file
    public function exportPDF()
    {
        $categories = Category::withTrashed()->get();
        $pdf = Pdf::loadView('admin.category.pdf.template', compact('categories'));

        return $pdf->stream('Data ' . $this->title . '.pdf');
    }

    // Handle store data category
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $category->slug . '_' . time() . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Create Data ' . $this->title . '!');
    }

    // Handle update data category
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $category->slug . '_' . time() . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Edit Data ' . $this->title . '!');
    }

    // Handle hard delete data category
    public function destroy($id)
    {
        Category::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Data ' . $this->title . '!');
    }

    // Handle hard delete all data category
    public function destroyAll()
    {
        Category::truncate();
        return back()->with('success', 'Successfully Delete All ' . $this->title . '!');
    }

    // Handle soft delete data category
    public function softDelete($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete Data ' . $this->title . '!');
    }

    // Handle soft delete all data category
    public function softDeleteAll()
    {
        Category::query()->delete();
        return back()->with('success', 'Successfully Delete All ' . $this->title . '!');
    }

    // Handle restore data category
    public function restore($id)
    {
        Category::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore ' . $this->title . '!');
    }

    // Handle restore all data category
    public function restoreAll()
    {
        Category::onlyTrashed()->restore();
        return back()->with('success', 'Successfully Restore All ' . $this->title . '!');
    }
}
