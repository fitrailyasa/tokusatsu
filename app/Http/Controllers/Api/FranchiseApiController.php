<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
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
        $perPage = $request->query('per_page', 10);

        $query = Franchise::query();

        if (!$search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $franchises = $query->paginate($perPage);

        if (!$franchises) {
            return ApiResponse::error('No franchises found', 404);
        }

        return ApiResponse::success(
            'Franchises retrieved successfully',
            FranchiseResource::collection($franchises),
            [
                'current_page'   => $franchises->currentPage(),
                'total'          => $franchises->total(),
                'per_page'       => $franchises->perPage(),
                'last_page'      => $franchises->lastPage(),
                'next_page_url'  => $franchises->nextPageUrl(),
                'prev_page_url'  => $franchises->previousPageUrl(),
            ]
        );
    }

    // Handle api store data franchise
    public function store(FranchiseRequest $request)
    {
        $franchise = Franchise::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $franchise->name . '.' . $img->getClientOriginalExtension();
            $franchise->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Franchise created successfully', new FranchiseResource($franchise), null, 201);
    }

    // Handle api show data franchise
    public function show($id)
    {
        $franchise = Franchise::findOrFail($id);
        return ApiResponse::success('Franchise retrieved successfully', new FranchiseResource($franchise));
    }

    // Handle api edit data franchise
    public function edit($id)
    {
        return $this->show($id);
    }

    // Handle api update data franchise
    public function update(FranchiseRequest $request, $id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $franchise->name . '.' . $img->getClientOriginalExtension();
            $franchise->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Franchise updated successfully', new FranchiseResource($franchise));
    }

    // Handle api delete data franchise
    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return ApiResponse::success('Franchise deleted successfully');
    }

    // Handle api find all franchises
    public function all()
    {
        $franchises = Franchise::all();

        if (!$franchises) {
            return ApiResponse::error('No franchises found', 404);
        }

        return ApiResponse::success(
            'All franchises retrieved successfully',
            FranchiseResource::collection($franchises)
        );
    }
}
