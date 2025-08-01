<?php

namespace App\Http\Controllers\Api;

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
        $search = $request->query('search');

        $query = Category::with('franchise', 'era');

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $perPage = $request->query('per_page', 10);
        $categories = $query->paginate($perPage);

        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No categories found'], 404);
        } else {
            return response()->json([
                'message' => 'Category retrieved successfully',
                'data' => CategoryResource::collection($categories),
                'pagination' => [
                    'current_page' => $categories->currentPage(),
                    'total' => $categories->total(),
                    'per_page' => $categories->perPage(),
                    'last_page' => $categories->lastPage(),
                    'next_page_url' => $categories->nextPageUrl(),
                    'prev_page_url' => $categories->previousPageUrl(),
                ]
            ], 200);
        }
    }

    // Handle api store data category
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $category->name . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Successfully Create Category!']);
    }

    // Handle api show data category
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Handle api edit data category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Handle api update data category
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $category->name . '.' . $img->getClientOriginalExtension();
            $category->img = $file_name;
            $category->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Successfully Edit Category!']);
    }

    // Handle api destroy data category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['alert' => 'Successfully Delete Category!']);
    }

    // Handle api find categories by era
    public function findByEra(Request $request, $era)
    {
        $perPage = $request->query('per_page', 10);

        $categories = Category::with('era', 'franchise')
            ->whereHas('era', function ($query) use ($era) {
                $query->where('slug', $era);
            })
            ->paginate($perPage);

        if ($categories->isEmpty()) {
            return response()->json([
                'message' => 'No categories found for the specified era'
            ], 404);
        }

        return response()->json([
            'message' => 'Categories retrieved successfully',
            'data' => CategoryResource::collection($categories),
            'pagination' => [
                'current_page' => $categories->currentPage(),
                'total' => $categories->total(),
                'per_page' => $categories->perPage(),
                'last_page' => $categories->lastPage(),
                'next_page_url' => $categories->nextPageUrl(),
                'prev_page_url' => $categories->previousPageUrl(),
            ]
        ], 200);
    }

    // Handle api find categories by franchise
    public function findByFranchise(Request $request, $franchise)
    {
        $perPage = $request->query('per_page', 10);

        $categories = Category::with('era', 'franchise')
            ->whereHas('franchise', function ($query) use ($franchise) {
                $query->where('slug', $franchise);
            })
            ->paginate($perPage);

        if ($categories->isEmpty()) {
            return response()->json([
                'message' => 'No categories found for the specified franchise'
            ], 404);
        }

        return response()->json([
            'message' => 'Categories retrieved successfully',
            'data' => CategoryResource::collection($categories),
            'pagination' => [
                'current_page' => $categories->currentPage(),
                'total' => $categories->total(),
                'per_page' => $categories->perPage(),
                'last_page' => $categories->lastPage(),
                'next_page_url' => $categories->nextPageUrl(),
                'prev_page_url' => $categories->previousPageUrl(),
            ]
        ], 200);
    }

    // Handle api find all data categories
    public function all()
    {
        $categories = Category::with('franchise', 'era')->get();

        if ($categories->isEmpty()) {
            return response()->json([
                'message' => 'No categories found',
            ], 404);
        }

        return response()->json([
            'message' => 'All categories retrieved successfully',
            'data' => CategoryResource::collection($categories)
        ], 200);
    }
}
