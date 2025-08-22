<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TagImport;
use App\Exports\TagExport;
use App\Http\Requests\TagRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminTagController extends Controller
{
    // Middleware for tag permissions
    public function __construct()
    {
        $this->middleware('permission:view:tag')->only(['index']);
        $this->middleware('permission:create:tag')->only(['store']);
        $this->middleware('permission:edit:tag')->only(['update']);
        $this->middleware('permission:delete:tag')->only(['destroy']);
        $this->middleware('permission:delete-all:tag')->only(['destroyAll']);
        $this->middleware('permission:soft-delete:tag')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all:tag')->only(['softDeleteAll']);
        $this->middleware('permission:restore:tag')->only(['restore']);
        $this->middleware('permission:restore-all:tag')->only(['restoreAll']);
        $this->middleware('permission:import:tag')->only(['import']);
        $this->middleware('permission:export:tag')->only(['exportExcel', 'exportPDF']);
    }

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

        return view("admin.tag.index", compact('tags', 'search', 'perPage'));
    }


    // Handle import tag data from excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10240|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new TagImport, $file);
        return back()->with('success', 'Successfully Import Data Tag!');
    }

    // Handle export tag data to excel file
    public function exportExcel()
    {
        return Excel::download(new TagExport, 'Data Tag.xlsx');
    }

    // Handle export tag data to pdf file
    public function exportPDF()
    {
        $tags = Tag::withTrashed()->get();
        $pdf = Pdf::loadView('admin.tag.pdf.template', compact('tags'));

        return $pdf->stream('Data Tag.pdf');
    }

    // Handle store tag data
    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());
        return back()->with('success', 'Successfully Create Data Tag!');
    }

    // Handle update tag data
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());
        return back()->with('success', 'Successfully Edit Data Tag!');
    }

    // Handle hard delete tag data
    public function destroy($id)
    {
        Tag::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Data Tag!');
    }

    // Handle hard delete all tag data
    public function destroyAll()
    {
        Tag::truncate();
        return back()->with('success', 'Successfully Delete All Tag!');
    }

    // Handle soft delete tag data
    public function softDelete($id)
    {
        Tag::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete Data Tag!');
    }

    // Handle soft delete all tag data
    public function softDeleteAll()
    {
        Tag::query()->delete();
        return back()->with('success', 'Successfully Delete All Tag!');
    }

    // Handle restore tag data
    public function restore($id)
    {
        Tag::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore Tag!');
    }

    // Handle restore all tag data
    public function restoreAll()
    {
        Tag::onlyTrashed()->restore();
        return back()->with('success', 'Successfully Restore All Tag!');
    }
}
