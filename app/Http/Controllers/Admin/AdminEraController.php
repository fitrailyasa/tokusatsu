<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Era;
use Illuminate\Support\Facades\Gate;
use App\Imports\EraImport;
use App\Exports\EraExport;
use App\Http\Requests\EraRequest;
use App\Http\Requests\TableRequest;

class AdminEraController extends Controller
{
    protected $model = Era::class;
    protected $title = 'era';
    protected $permissionName = 'era';

    protected $exportClass = EraExport::class;
    protected $importClass = EraImport::class;
    protected $requestClass = EraRequest::class;
    protected $pdfView = 'admin.era.pdf.template';

    protected $imageField = 'img';
    protected $imageFolder = 'era';

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $eras = Era::withTrashed()
                ->when(!Gate::allows('edit:era'), function ($query) {
                    $query->where('status', 1);
                })
                ->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $eras = Era::withTrashed()
                ->when(!Gate::allows('edit:era'), function ($query) {
                    $query->where('status', 1);
                })
                ->paginate($validPerPage);
        }

        return view("admin.era.index", compact('eras', 'search', 'perPage'));
    }
}
