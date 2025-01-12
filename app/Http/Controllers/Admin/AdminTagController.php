<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TagImport;
use App\Exports\TagExport;
use App\Http\Requests\TagRequest;

class AdminTagController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

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

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new TagImport, $file);
        return back()->with('message', 'Berhasil Import Data Tag!');
    }

    public function export()
    {
        return Excel::download(new TagExport, 'Data Tag.xlsx');
    }

    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());
        return back()->with('message', 'Berhasil Tambah Data Tag!');
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());
        return back()->with('message', 'Berhasil Edit Data Tag!');
    }

    public function destroy($id)
    {
        Tag::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('message', 'Berhasil Hapus Data Tag!');
    }

    public function destroyAll()
    {
        Tag::truncate();
        return back()->with('message', 'Berhasil Hapus Semua Tag!');
    }

    public function softDelete($id)
    {
        Tag::findOrFail($id)->delete();
        return back()->with('message', 'Berhasil Hapus Data Tag!');
    }

    public function softDeleteAll()
    {
        Tag::query()->delete();
        return back()->with('message', 'Berhasil Hapus Semua Tag!');
    }

    public function restore($id)
    {
        Tag::withTrashed()->findOrFail($id)->restore();
        return back()->with('message', 'Berhasil Restore Tag!');
    }

    public function restoreAll()
    {
        Tag::onlyTrashed()->restore();
        return back()->with('message', 'Berhasil Restore Semua Tag!');
    }
}
