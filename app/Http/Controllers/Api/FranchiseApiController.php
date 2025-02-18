<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FranchiseRequest;
use App\Http\Resources\FranchiseResource;
use App\Models\Franchise;


class FranchiseApiController extends Controller
{
    public function index()
    {
        $franchises = Franchise::paginate(10);

        return response()->json([
            'message' => 'Franchise retrieved successfully',
            'data' => FranchiseResource::collection($franchises),
            'pagination' => [
                'current_page' => $franchises->currentPage(),
                'total' => $franchises->total(),
                'per_page' => $franchises->perPage(),
                'last_page' => $franchises->lastPage(),
                'next_page_url' => $franchises->nextPageUrl(),
                'prev_page_url' => $franchises->previousPageUrl(),
            ]
        ], 200);
    }

    public function store(FranchiseRequest $request)
    {
        $franchise = Franchise::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Tambah Franchise!']);
    }

    public function show($id)
    {
        $franchise = Franchise::findOrFail($id);
        return response()->json($franchise);
    }

    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);
        return response()->json($franchise);
    }

    public function update(FranchiseRequest $request, $id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Edit Franchise!']);
    }

    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return response()->json(['alert' => 'Berhasil Hapus Franchise!']);
    }
}
