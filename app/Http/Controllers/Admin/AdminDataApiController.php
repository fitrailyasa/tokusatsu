<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Http\Resources\DataResource;
use App\Models\Data;


class AdminDataApiController extends Controller
{
    public function index()
    {
        $datas = Data::with(['category', 'tags'])->paginate(12);

        return response()->json([
            'message' => 'Data retrieved successfully',
            'data' => DataResource::collection($datas),
            'pagination' => [
                'current_page' => $datas->currentPage(),
                'total' => $datas->total(),
                'per_page' => $datas->perPage(),
                'last_page' => $datas->lastPage(),
                'next_page_url' => $datas->nextPageUrl(),
                'prev_page_url' => $datas->previousPageUrl(),
            ]
        ], 200);
    }

    public function store(DataRequest $request)
    {
        $data = Data::create($request->validated());

        $data->tags()->attach($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Tambah Data!']);
    }

    public function show($id)
    {
        $data = Data::findOrFail($id);
        return response()->json($data);
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id);
        return response()->json($data);
    }

    public function update(DataRequest $request, $id)
    {
        $data = Data::findOrFail($id);
        $data->update($request->validated());

        $data->tags()->sync($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Edit Data!']);
    }

    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return response()->json(['alert' => 'Berhasil Hapus Data!']);
    }
}
