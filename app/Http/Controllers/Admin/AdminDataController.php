<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use Illuminate\Http\Request;


class AdminDataController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $datas = Data::latest('id')->paginate(10);
        return view('admin.data.index', compact('datas', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $data = Data::create([
            'name' => $request->name,
            'category_id' => $request->category_id
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

        $data->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
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
}
