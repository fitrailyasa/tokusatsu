<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagApiController extends Controller
{
    // Handle api list data tags
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Tag::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $perPage = $request->query('per_page', 10);
        $tags = $query->paginate($perPage);

        if ($tags->isEmpty()) {
            return response()->json(['message' => 'No tags found'], 404);
        } else {
            return response()->json([
                'message' => 'Tag retrieved successfully',
                'data' => TagResource::collection($tags),
                'pagination' => [
                    'current_page' => $tags->currentPage(),
                    'total' => $tags->total(),
                    'per_page' => $tags->perPage(),
                    'last_page' => $tags->lastPage(),
                    'next_page_url' => $tags->nextPageUrl(),
                    'prev_page_url' => $tags->previousPageUrl(),
                ]
            ], 200);
        }
    }

    // Handle api store tag data
    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());

        return response()->json(['alert' => 'Successfully Create Tag!']);
    }

    // Handle api show tag data
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

    // Handle api edit tag data
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

    // Handle api update tag data
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());

        return response()->json(['alert' => 'Successfully Edit Tag!']);
    }

    // Handle api delete tag data
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json(['alert' => 'Successfully Delete Tag!']);
    }

    // Handle api find all tags
    public function all()
    {
        $tags = Tag::all();

        if ($tags->isEmpty()) {
            return response()->json([
                'message' => 'No tags found',
            ], 404);
        }

        return response()->json([
            'message' => 'All tags retrieved successfully',
            'data' => TagResource::collection($tags)
        ], 200);
    }
}
