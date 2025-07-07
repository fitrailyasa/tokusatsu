<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;
use App\Exports\DataExport;
use App\Http\Requests\DataRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-data')->only(['index']);
        $this->middleware('permission:create-data')->only(['store']);
        $this->middleware('permission:edit-data')->only(['update']);
        $this->middleware('permission:delete-data')->only(['destroy']);
        $this->middleware('permission:delete-all-data')->only(['destroyAll']);
        $this->middleware('permission:soft-delete-data')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all-data')->only(['softDeleteAll']);
        $this->middleware('permission:restore-data')->only(['restore']);
        $this->middleware('permission:restore-all-data')->only(['restoreAll']);
        $this->middleware('permission:import-data')->only(['import']);
        $this->middleware('permission:export-data')->only(['exportExcel', 'exportPDF']);
    }

    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $perPage = (int) $request->input('perPage', 10);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $tags = Tag::all();
        $categories = Category::all();
        $groupedCategories = $categories->groupBy('franchise.name');

        $datas = Data::withTrashed()
            ->with(['category', 'category.era', 'category.franchise'])
            ->when($search, function ($query, $search) {
                $searchTerms = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($searchTerms as $term) {
                    $query->where(function ($q) use ($term) {
                        $q->where('name', 'like', "%{$term}%")
                            ->orWhere('img', 'like', "%{$term}%")
                            ->orWhereHas('category', function ($q) use ($term) {
                                $q->where('name', 'like', "%{$term}%")
                                    ->orWhereHas('era', fn($q) => $q->where('name', 'like', "%{$term}%"))
                                    ->orWhereHas('franchise', fn($q) => $q->where('name', 'like', "%{$term}%"));
                            });
                    });
                }
            })
            ->when($categoryId, fn($query) => $query->where('category_id', $categoryId))
            ->orderBy('id', 'desc')
            ->paginate($validPerPage);

        return view('admin.data.index', compact(
            'datas',
            'groupedCategories',
            'categories',
            'categoryId',
            'tags',
            'search',
            'perPage'
        ));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new DataImport, $file);

        return back()->with('success', 'Successfully Import Data!');
    }

    public function exportExcel()
    {
        return Excel::download(new DataExport, 'Data.xlsx');
    }

    public function exportPDF()
    {
        $datas = Data::withTrashed()->get();
        $pdf = Pdf::loadView('admin.data.pdf.template', compact('datas'));

        return $pdf->stream('Data.pdf');
    }

    public function store(DataRequest $request)
    {
        $data = Data::create($request->validated());
        $data->tags()->attach($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Create Data!');
    }

    public function update(DataRequest $request, $id)
    {
        $data = Data::findOrFail($id);
        $data->update($request->validated());
        $data->tags()->sync($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->storeAs('public', $file_name);
        }

        return back()->with('success', 'Successfully Edit Data!');
    }

    public function destroy($id)
    {
        Data::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Data!');
    }

    public function destroyAll()
    {
        Data::truncate();
        return back()->with('success', 'Successfully Delete All Data!');
    }

    public function softDelete($id)
    {
        Data::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete Data!');
    }

    public function softDeleteAll()
    {
        Data::query()->delete();
        return back()->with('success', 'Successfully Delete All Data!');
    }

    public function restore($id)
    {
        Data::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore Data!');
    }

    public function restoreAll()
    {
        Data::onlyTrashed()->restore();

        return back()->with('success', 'Successfully Restore All Data!');
    }
}
