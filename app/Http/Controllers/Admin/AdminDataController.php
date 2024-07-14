<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;
use App\Exports\DataExport;
use App\Http\Requests\DataRequest;

class AdminDataController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $datas = Data::paginate(10);
        $counter = ($datas->currentPage() - 1) * $datas->perPage() + 1;

        return view("admin.data.index", compact('datas', 'categories', 'tags', 'counter'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new DataImport, $file);

        return back()->with('alert', 'Berhasil Import Data!');
    }

    public function export()
    {
        return Excel::download(new DataExport, 'Data.xlsx');
    }

    public function store(DataRequest $request)
    {
        $data = Data::create($request->validated());
        $data->tags()->attach($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data!');
    }

    public function update(DataRequest $request, $id)
    {
        $data = Data::findOrFail($id)->update($request->validated());
        $data->tags()->sync($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data!');
    }

    public function destroy($id)
    {
        Data::findOrFail($id)->delete();

        return back()->with('alert', 'Berhasil Hapus Data!');
    }

    public function destroyAll()
    {
        Data::truncate();

        return back()->with('alert', 'Berhasil Hapus Semua Data!');
    }

    public function search(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $datas = Data::all();

        $validatedData = $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = '%' . $validatedData['query'] . '%';

        $datas = Data::where('name', 'like', $query)
            ->orWhere('img', 'like', $query)
            ->orWhereHas('tags', function ($q) use ($query) {
                $q->where('name', 'like', $query);
            })
            ->paginate(50);

        return view('admin.data.search', compact('datas', 'categories', 'tags'));
    }
}
