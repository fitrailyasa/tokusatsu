<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminDataApiController extends Controller
{
    public function index()
    {
        $datas = Data::paginate(10);
        return response()->json($datas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required|max:2048',
            'category_id' => 'required',
        ]);

        $data = Data::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'img' => $request->img,
            'category_id' => $request->category_id,
        ]);

        $data->tags()->attach($request->tags);

        // if ($request->hasFile('img')) {
        //     $img = $request->file('img');
        //     $file_name = $data->name . '_' . $data->Category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
        //     $data->img = $file_name;
        //     $data->update();
        //     $img->move('../public/assets/img/', $file_name);
        // }

        return response()->json(['alert' => 'Berhasil Tambah Data!']);
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Data::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'img' => 'required|max:2048',
            'category_id' => 'required',
        ]);

        $data->update([
            'name' => $request->name,
            'img' => $request->img,
            'category_id' => $request->category_id,
        ]);

        $data->tags()->sync($request->tags);

        // if ($request->hasFile('img')) {
        //     $img = $request->file('img');
        //     $file_name = $data->name . '_' . $data->Category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
        //     $data->img = $file_name;
        //     $data->update();
        //     $img->move('../public/assets/img/', $file_name);
        // }

        return response()->json(['alert' => 'Berhasil Edit Data!']);
    }

    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return response()->json(['alert' => 'Berhasil Hapus Data!']);
    }
}
