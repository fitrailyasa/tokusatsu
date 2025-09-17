<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryApiController extends Controller
{
    // Handle api list data categories
    public function index(Request $request)
    {
        $search  = $request->query('search');
        $perPage = $request->query('per_page', 10);

        $query = Category::with(['franchise', 'era']);

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $categories = $query->paginate($perPage);

        if ($categories->isEmpty()) {
            return ApiResponse::error('No categories found', 404);
        }

        return ApiResponse::success(
            'Categories retrieved successfully',
            CategoryResource::collection($categories),
            [
                'current_page'   => $categories->currentPage(),
                'total'          => $categories->total(),
                'per_page'       => $categories->perPage(),
                'last_page'      => $categories->lastPage(),
                'next_page_url'  => $categories->nextPageUrl(),
                'prev_page_url'  => $categories->previousPageUrl(),
            ]
        );
    }

    // Handle api store data category
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $category->name . '.' . $img->getClientOriginalExtension();
            $category->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Category created successfully', new CategoryResource($category), null, 201);
    }

    // Handle api show data category
    public function show($id)
    {
        $category = Category::with(['franchise', 'era'])->findOrFail($id);
        return ApiResponse::success('Category retrieved successfully', new CategoryResource($category));
    }

    // Handle api edit data category
    public function edit($id)
    {
        return $this->show($id);
    }

    // Handle api update data category
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $category->name . '.' . $img->getClientOriginalExtension();
            $category->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Category updated successfully', new CategoryResource($category));
    }

    // Handle api destroy data category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return ApiResponse::success('Category deleted successfully');
    }

    // Handle api find categories by era
    public function findByEra(Request $request, $era)
    {
        return $this->filterByRelation($request, 'era', $era);
    }

    // Handle api find categories by franchise
    public function findByFranchise(Request $request, $franchise)
    {
        return $this->filterByRelation($request, 'franchise', $franchise);
    }

    // Reusable filter function
    private function filterByRelation(Request $request, $relation, $slug)
    {
        $perPage = $request->query('per_page', 10);

        $categories = Category::with(['era', 'franchise'])
            ->whereHas($relation, fn($query) => $query->where('slug', $slug))
            ->paginate($perPage);

        if ($categories->isEmpty()) {
            return ApiResponse::error("No categories found for the specified $relation", 404);
        }

        return ApiResponse::success(
            'Categories retrieved successfully',
            CategoryResource::collection($categories),
            [
                'current_page'   => $categories->currentPage(),
                'total'          => $categories->total(),
                'per_page'       => $categories->perPage(),
                'last_page'      => $categories->lastPage(),
                'next_page_url'  => $categories->nextPageUrl(),
                'prev_page_url'  => $categories->previousPageUrl(),
            ]
        );
    }

    // Handle api find all data categories
    public function all()
    {
        $categories = Category::with(['franchise', 'era'])->get();

        if ($categories->isEmpty()) {
            return ApiResponse::error('No categories found', 404);
        }

        return ApiResponse::success(
            'All categories retrieved successfully',
            CategoryResource::collection($categories)
        );
    }
}
