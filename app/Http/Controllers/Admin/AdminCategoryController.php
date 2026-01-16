<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Franchise;
use App\Models\Era;
use Illuminate\Support\Facades\Gate;
use App\Imports\CategoryImport;
use App\Exports\CategoryExport;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TableRequest;

class AdminCategoryController extends AdminBaseCrudController
{
    protected $model = Category::class;
    protected $title = 'category';
    protected $permissionName = 'category';

    protected $exportClass = CategoryExport::class;
    protected $importClass = CategoryImport::class;
    protected $requestClass = CategoryRequest::class;
    protected $pdfView = 'admin.category.pdf.template';

    protected $imageField = 'img';
    protected $imageFolder = 'category';

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
}
