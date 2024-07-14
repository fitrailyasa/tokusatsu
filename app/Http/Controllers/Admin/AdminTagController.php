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
    public function index()
    {
        $tags = Tag::orderBy('name')->get();
        return view('admin.tag.index', compact('tags'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new TagImport, $file);
        return back()->with('alert', 'Berhasil Import Data Tag!');
    }

    public function export()
    {
        return Excel::download(new TagExport, 'Data Tag.xlsx');
    }

    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Tag!');
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Tag!');
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Tag!');
    }

    public function destroyAll()
    {
        Tag::truncate();
        return back()->with('alert', 'Berhasil Hapus Semua Data Tag!');
    }
}
