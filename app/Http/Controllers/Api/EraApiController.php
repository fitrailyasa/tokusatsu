<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EraRequest;
use App\Http\Resources\EraResource;
use App\Models\Era;

class EraApiController extends Controller
{
    // Handle api list data eras
    public function index(Request $request)
    {

        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);

        $query = Era::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $eras = $query->paginate($perPage);

        if ($eras->isEmpty()) {
            return ApiResponse::error('No eras found', 404);
        }

        return ApiResponse::success(
            'Eras retrieved successfully',
            EraResource::collection($eras),
            [
                'current_page'   => $eras->currentPage(),
                'total'          => $eras->total(),
                'per_page'       => $eras->perPage(),
                'last_page'      => $eras->lastPage(),
                'next_page_url'  => $eras->nextPageUrl(),
                'prev_page_url'  => $eras->previousPageUrl(),
            ]
        );
    }

    // Handle api store data era
    public function store(EraRequest $request)
    {
        $era = Era::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $era->name . '.' . $img->getClientOriginalExtension();
            $era->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Era created successfully', new EraResource($era), null, 201);
    }

    // Handle api show data era
    public function show($id)
    {
        $era = Era::findOrFail($id);
        return ApiResponse::success('Era retrieved successfully', new EraResource($era));
    }

    // Handle api edit data era
    public function edit($id)
    {
        return $this->show($id);
    }

    // Handle api update data era
    public function update(EraRequest $request, $id)
    {
        $era = Era::findOrFail($id);
        $era->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $era->name . '.' . $img->getClientOriginalExtension();
            $era->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Era updated successfully', new EraResource($era));
    }

    // Handle api destroy data era
    public function destroy($id)
    {
        $era = Era::findOrFail($id);
        $era->delete();

        return ApiResponse::success('Era deleted successfully');
    }

    // Handle api find all eras
    public function all()
    {
        $eras = Era::all();

        if ($eras->isEmpty()) {
            return ApiResponse::error('No eras found', 404);
        }

        return ApiResponse::success(
            'All eras retrieved successfully',
            EraResource::collection($eras)
        );
    }
}
