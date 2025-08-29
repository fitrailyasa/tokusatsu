<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DataRequest;
use App\Http\Resources\DataResource;
use App\Models\Data;

class DataApiController extends Controller
{
    // Handle api list datas
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);

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

        $datas = $query->paginate($perPage);

        if ($datas->isEmpty()) {
            return ApiResponse::error('No datas found', 404);
        }

        return ApiResponse::success(
            'Datas retrieved successfully',
            DataResource::collection($datas),
            [
                'current_page'   => $datas->currentPage(),
                'total'          => $datas->total(),
                'per_page'       => $datas->perPage(),
                'last_page'      => $datas->lastPage(),
                'next_page_url'  => $datas->nextPageUrl(),
                'prev_page_url'  => $datas->previousPageUrl(),
            ]
        );
    }

    // Handle api store data
    public function store(DataRequest $request)
    {
        $data = Data::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $data->name . '.' . $img->getClientOriginalExtension();
            $data->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Data created successfully', new DataResource($data), null, 201);
    }

    // Handle api show data
    public function show($id)
    {
        $data = Data::findOrFail($id);
        return ApiResponse::success('Data retrieved successfully', new DataResource($data));
    }

    // Handle api edit data
    public function edit($id)
    {
        return $this->show($id);
    }

    // Handle api update data
    public function update(DataRequest $request, $id)
    {
        $data = Data::findOrFail($id);
        $data->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $data->name . '.' . $img->getClientOriginalExtension();
            $data->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Data updated successfully', new DataResource($data));
    }

    // Handle api delete data
    public function destroy($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return ApiResponse::success('Data deleted successfully');
    }

    // Handle api find datas by franchise category
    public function findByFranchiseCategory(Request $request, $franchise, $category)
    {
        $perPage = $request->query('per_page', 10);

        $datas = Data::with(['category.franchise', 'tags'])
            ->whereHas('category', function ($q) use ($category, $franchise) {
                $q->where('slug', 'LIKE', "%{$category}%")
                    ->whereHas('franchise', function ($q2) use ($franchise) {
                        $q2->where('slug', 'LIKE', "%{$franchise}%");
                    });
            })
            ->paginate($perPage);

        if ($datas->isEmpty()) {
            return response()->json([
                'message' => 'No data found for the specified franchise and category'
            ], 404);
        }

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
