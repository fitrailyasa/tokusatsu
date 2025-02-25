<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DataRequest;
use App\Http\Resources\DataResource;
use App\Models\Data;

class DataApiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Data::with(['category.era', 'category.franchise', 'tags']);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('tags', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $perPage = $request->query('per_page', 10);
        $datas = $query->paginate($perPage);

        if ($datas->isEmpty()) {
            return response()->json(['message' => 'No datas found'], 404);
        } else {
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
    }

    public function store(DataRequest $request)
    {
        $data = Data::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '.' . $img->getClientOriginalExtension();
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

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '.' . $img->getClientOriginalExtension();
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
