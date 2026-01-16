<?php

namespace App\Http\Controllers\Admin;

use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use App\Imports\DataImport;
use App\Exports\DataExport;
use App\Http\Requests\DataRequest;
use App\Http\Requests\TableRequest;

class AdminDataController extends AdminBaseCrudController
{
    protected $model = Data::class;
    protected $title = 'data';
    protected $permissionName = 'data';

    protected $exportClass = DataExport::class;
    protected $importClass = DataImport::class;
    protected $requestClass = DataRequest::class;
    protected $pdfView = 'admin.data.pdf.template';

    protected $imageField = 'img';
    protected $imageFolder = 'data';

    // Display a listing of the resource
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

        $permission = $this->permissionName;

        return view('admin.data.index', compact(
            'datas',
            'groupedCategories',
            'categories',
            'categoryId',
            'tags',
            'search',
            'perPage',
            'permission',
        ));
    }
}
