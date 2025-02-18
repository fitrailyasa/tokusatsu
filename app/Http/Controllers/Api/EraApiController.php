<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EraRequest;
use App\Http\Resources\EraResource;
use App\Models\Era;

class EraApiController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->query('search');

        $query = Era::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $perPage = $request->query('per_page', 10);
        $eras = $query->paginate($perPage);

        if ($eras->isEmpty()) {
            return response()->json(['message' => 'No eras found'], 404);
        } else {
            return response()->json([
                'message' => 'Era retrieved successfully',
                'data' => EraResource::collection($eras),
                'pagination' => [
                    'current_page' => $eras->currentPage(),
                    'total' => $eras->total(),
                    'per_page' => $eras->perPage(),
                    'last_page' => $eras->lastPage(),
                    'next_page_url' => $eras->nextPageUrl(),
                    'prev_page_url' => $eras->previousPageUrl(),
                ]
            ], 200);
        }
    }

    public function store(EraRequest $request)
    {
        $era = Era::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Tambah Era!']);
    }

    public function show($id)
    {
        $era = Era::findOrFail($id);
        return response()->json($era);
    }

    public function edit($id)
    {
        $era = Era::findOrFail($id);
        return response()->json($era);
    }

    public function update(EraRequest $request, $id)
    {
        $era = Era::findOrFail($id);
        $era->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Edit Era!']);
    }

    public function destroy($id)
    {
        $era = Era::findOrFail($id);
        $era->delete();

        return response()->json(['alert' => 'Berhasil Hapus Era!']);
    }
}
