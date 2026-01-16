<?php

namespace App\Http\Controllers\Admin;

use App\Models\Franchise;
use Illuminate\Support\Facades\Gate;
use App\Imports\FranchiseImport;
use App\Exports\FranchiseExport;
use App\Http\Requests\FranchiseRequest;
use App\Http\Requests\TableRequest;

class AdminFranchiseController extends AdminBaseCrudController
{
    protected $model = Franchise::class;
    protected $title = 'Franchise';
    protected $permissionName = 'franchise';

    protected $exportClass = FranchiseExport::class;
    protected $importClass = FranchiseImport::class;
    protected $requestClass = FranchiseRequest::class;
    protected $pdfView = 'admin.franchise.pdf.template';

    protected $imageField = 'img';
    protected $imageFolder = 'franchise';

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $franchises = Franchise::withTrashed()
                ->when(!Gate::allows('edit:franchise'), function ($query) {
                    $query->where('status', 1);
                })
                ->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $franchises = Franchise::withTrashed()
                ->when(!Gate::allows('edit:franchise'), function ($query) {
                    $query->where('status', 1);
                })
                ->paginate($validPerPage);
        }

        $permission = $this->permissionName;

        return view("admin.franchise.index", compact('franchises', 'search', 'perPage', 'permission'));
    }
}
