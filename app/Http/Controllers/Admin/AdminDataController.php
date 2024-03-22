<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;
use App\Exports\DataExport;

class AdminDataController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $datas = Data::paginate(10);
        
        return view('admin.data.index', compact('datas', 'categories', 'tags'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new DataImport, $file);

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Import Data!');
    }

    public function export()
    {
        return Excel::download(new DataExport, 'Data.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'tags' => 'required|array',
        ]);

        $tags = json_encode($request->tags);

        $data = Data::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'tags' => $tags
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $data->name . '_' . $data->category->name . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Tambah Data!');
    }

    public function update(Request $request, $id)
    {
        $data = Data::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $tags = json_encode($request->tags);

        $data->update([
            'id' => Str::uuid(),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'tags' => $tags
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = time() . '_' . $data->name . '_' . $data->category->name . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Edit Data!');
    }

    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Hapus Data!');
    }

    public function destroyAll()
    {
        Data::truncate();

        return redirect()->route('admin.data.index')->with('sukses', 'Berhasil Hapus Semua Data!');
    }
}
