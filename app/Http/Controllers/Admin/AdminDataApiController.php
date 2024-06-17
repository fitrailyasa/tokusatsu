<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataStoreRequest;
use App\Http\Requests\DataUpdateRequest;
use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;


class AdminDataApiController extends Controller
{
    public function index()
    {
        $datas = Data::paginate(10);
        return response()->json($datas);
    }

    public function store(DataStoreRequest $request)
    {
        $data = Data::create($request->validated());

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

    public function update(DataUpdateRequest $request, $id)
    {
        $data = Data::findOrFail($id);

        $data->update($request->validated());

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
