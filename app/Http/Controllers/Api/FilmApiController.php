<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;

class FilmApiController extends Controller
{
    // Handle api list films data
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);

        $query = Film::with(['category.era', 'category.franchise']);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $films = $query->paginate($perPage);

        if ($films->isEmpty()) {
            return ApiResponse::error('No films found', 404);
        }

        return ApiResponse::success(
            'Films retrieved successfully',
            FilmResource::collection($films),
            [
                'current_page'   => $films->currentPage(),
                'total'          => $films->total(),
                'per_page'       => $films->perPage(),
                'last_page'      => $films->lastPage(),
                'next_page_url'  => $films->nextPageUrl(),
                'prev_page_url'  => $films->previousPageUrl(),
            ]
        );
    }

    // Handle api store film data
    public function store(FilmRequest $request)
    {
        $Film = Film::create($request->validated());
        return ApiResponse::success('Film created successfully', new FilmResource($Film), null, 201);
    }

    // Handle api show film data
    public function show($id)
    {
        $Film = Film::findOrFail($id);
        return ApiResponse::success('Film retrieved successfully', new FilmResource($Film));
    }

    // Handle api edit film data
    public function edit($id)
    {
        return $this->show($id);
    }

    // Handle api update film data
    public function update(FilmRequest $request, $id)
    {
        $Film = Film::findOrFail($id);
        $Film->update($request->validated());

        return ApiResponse::success('Film updated successfully', new FilmResource($Film));
    }

    // Handle api delete film data
    public function destroy($id)
    {
        $Film = Film::findOrFail($id);
        $Film->delete();

        return ApiResponse::success('Film deleted successfully');
    }

    // Handle api find films by franchise category
    public function findByFranchiseCategory(Request $request, $franchise, $category)
    {
        $perPage = $request->query('per_page', 10);

        $films = Film::with(['category.franchise'])
            ->whereHas('category', function ($q) use ($category, $franchise) {
                $q->where('slug', 'LIKE', "%{$category}%")
                    ->whereHas('franchise', function ($q2) use ($franchise) {
                        $q2->where('slug', 'LIKE', "%{$franchise}%");
                    });
            })
            ->paginate($perPage);

        if ($films->isEmpty()) {
            return ApiResponse::error("No film found for the specified franchise and category", 404);
        }

        return ApiResponse::success(
            'Films retrieved successfully',
            FilmResource::collection($films),
            [
                'current_page'   => $films->currentPage(),
                'total'          => $films->total(),
                'per_page'       => $films->perPage(),
                'last_page'      => $films->lastPage(),
                'next_page_url'  => $films->nextPageUrl(),
                'prev_page_url'  => $films->previousPageUrl(),
            ]
        );
    }

    // Handle api find films by franchise category & episode number
    public function findByFranchiseCategoryNumber($franchise, $category, $number)
    {
        $film = Film::with(['category.franchise'])
            ->where('number', $number)
            ->whereHas('category', function ($query) use ($category, $franchise) {
                $query->where('slug', $category)
                    ->whereHas('franchise', function ($subQuery) use ($franchise) {
                        $subQuery->where('slug', $franchise);
                    });
            })->first();

        if ($film->isEmpty()) {
            return ApiResponse::error('No film found', 404);
        }

        return ApiResponse::success(
            'Film retrieved successfully',
            FilmResource::collection($film)
        );
    }
}
