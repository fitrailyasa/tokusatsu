<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\tag;


class tagApiController extends Controller
{
    // Handle api list data tags
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);

        $query = Tag::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $tags = $query->paginate($perPage);

        if ($tags->isEmpty()) {
            return ApiResponse::error('No tags found', 404);
        }

        return ApiResponse::success(
            'tags retrieved successfully',
            TagResource::collection($tags),
            [
                'current_page'   => $tags->currentPage(),
                'total'          => $tags->total(),
                'per_page'       => $tags->perPage(),
                'last_page'      => $tags->lastPage(),
                'next_page_url'  => $tags->nextPageUrl(),
                'prev_page_url'  => $tags->previousPageUrl(),
            ]
        );
    }

    // Handle api store data tag
    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $tag->name . '.' . $img->getClientOriginalExtension();
            $tag->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Tag created successfully', new TagResource($tag), null, 201);
    }

    // Handle api show data tag
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return ApiResponse::success('Tag retrieved successfully', new TagResource($tag));
    }

    // Handle api edit data tag
    public function edit($id)
    {
        return $this->show($id);
    }

    // Handle api update data tag
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $fileName = $tag->name . '.' . $img->getClientOriginalExtension();
            $tag->update(['img' => $fileName]);
            $img->storeAs('public', $fileName);
        }

        return ApiResponse::success('Tag updated successfully', new TagResource($tag));
    }

    // Handle api delete data tag
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return ApiResponse::success('Tag deleted successfully');
    }

    // Handle api find all tags
    public function all()
    {
        $tags = Tag::all();

        if ($tags->isEmpty()) {
            return ApiResponse::error('No tags found', 404);
        }

        return ApiResponse::success(
            'All tags retrieved successfully',
            TagResource::collection($tags)
        );
    }
}
