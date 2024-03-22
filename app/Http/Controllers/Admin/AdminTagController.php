<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TagImport;
use App\Exports\TagExport;

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

        return redirect()->route('admin.tag.index')->with('sukses', 'Berhasil Import tag!');
    }

    public function export()
    {
        return Excel::download(new TagExport, 'Data Tag.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = Tag::create([
            'id' => Str::uuid(),
            'name' => $request->name,
        ]);

        return redirect()->route('admin.tag.index')->with('sukses', 'Berhasil Tambah tag!');
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag->update([
            'id' => Str::uuid(),
            'name' => $request->name,
        ]);

        return redirect()->route('admin.tag.index')->with('sukses', 'Berhasil Edit tag!');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('admin.tag.index')->with('sukses', 'Berhasil Hapus tag!');
    }
}
