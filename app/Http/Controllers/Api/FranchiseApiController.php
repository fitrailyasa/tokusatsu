<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FranchiseRequest;
use App\Http\Resources\FranchiseResource;
use App\Models\Franchise;


class FranchiseApiController extends Controller
{
    // Handle api list data franchises
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Franchise::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $perPage = $request->query('per_page', 10);
        $franchises = $query->paginate($perPage);

        if ($franchises->isEmpty()) {
            return response()->json(['message' => 'No franchises found'], 404);
        } else {
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
    }

    // Handle api store data franchise
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

        return response()->json(['alert' => 'Successfully Create Franchise!']);
    }

    // Handle api show data franchise
    public function show($id)
    {
        $franchise = Franchise::findOrFail($id);
        return response()->json($franchise);
    }

    // Handle api edit data franchise
    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);
        return response()->json($franchise);
    }

    // Handle api update data franchise
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

        return response()->json(['alert' => 'Successfully Edit Franchise!']);
    }

    // Handle api delete data franchise
    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return response()->json(['alert' => 'Successfully Delete Franchise!']);
    }

    // Handle api find all franchises
    public function all()
    {
        $franchises = Franchise::all();

        if ($franchises->isEmpty()) {
            return response()->json([
                'message' => 'No franchises found',
            ], 404);
        }

        return response()->json([
            'message' => 'All franchises retrieved successfully',
            'data' => FranchiseResource::collection($franchises)
        ], 200);
    }
}
