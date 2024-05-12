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

        if(auth()->user()->role == 'admin') {
            return back()->with('alert', 'Berhasil Import Data Tag!');
        } else {
            return back()->with('alert', 'Gagal Import Data Tag!');
        }
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

        if(auth()->user()->role == 'admin') {
            return back()->with('alert', 'Berhasil Tambah Data Tag!');
        } else {
            return back()->with('alert', 'Gagal Tambah Data Tag!');
        }
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        if(auth()->user()->role == 'admin') {
            return back()->with('alert', 'Berhasil Edit Data Tag!');
        } else {
            return back()->with('alert', 'Gagal Edit Data Tag!');
        }
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        if(auth()->user()->role == 'admin') {
            return back()->with('alert', 'Berhasil Hapus Data Tag!');
        } else {
            return back()->with('alert', 'Gagal Hapus Data Tag!');
        }
    }

    public function destroyAll()
    {
        Tag::truncate();

        if(auth()->user()->role == 'admin') {
            return back()->with('alert', 'Berhasil Hapus Semua Data Tag!');
        } else {
            return back()->with('alert', 'Gagal Hapus Semua Data Tag!');
        }
    }
}
