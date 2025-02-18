<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryApiController extends Controller
{
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

        return response()->json(['alert' => 'Berhasil Tambah Category!']);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

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

        return response()->json(['alert' => 'Berhasil Edit Category!']);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['alert' => 'Berhasil Hapus Category!']);
    }
}
