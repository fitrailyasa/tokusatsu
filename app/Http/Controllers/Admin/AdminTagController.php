<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Imports\TagImport;
use App\Exports\TagExport;
use App\Http\Requests\TagRequest;
use App\Http\Requests\TableRequest;

class AdminTagController extends AdminBaseCrudController
{
    protected $model = Tag::class;
    protected $title = 'tag';
    protected $permissionName = 'tag';

    protected $exportClass = TagExport::class;
    protected $importClass = TagImport::class;
    protected $requestClass = TagRequest::class;
    protected $pdfView = 'admin.tag.pdf.template';

    protected $imageField = 'img';
    protected $imageFolder = 'tag';

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $tags = Tag::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $tags = Tag::withTrashed()->paginate($validPerPage);
        }

        $permission = $this->permissionName;

        return view("admin.tag.index", compact('tags', 'search', 'perPage', 'permission'));
    }
}
