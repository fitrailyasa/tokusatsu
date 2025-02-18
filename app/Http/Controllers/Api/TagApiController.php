<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;


class TagApiController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);

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

    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $tag->name . '_' . $img->getClientOriginalExtension();
            $tag->img = $file_name;
            $tag->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Tambah Tag!']);
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $tag->name . '_' . $img->getClientOriginalExtension();
            $tag->img = $file_name;
            $tag->update();
            $img->storeAs('public', $file_name);
        }

        return response()->json(['alert' => 'Berhasil Edit Tag!']);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json(['alert' => 'Berhasil Hapus Tag!']);
    }
}
