<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;

class FilmApiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

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

        $perPage = $request->query('per_page', 10);
        $films = $query->paginate($perPage);

        if ($films->isEmpty()) {
            return response()->json(['message' => 'No Films found'], 404);
        } else {
            return response()->json([
                'message' => 'Film retrieved successfully',
                'data' => FilmResource::collection($films),
                'pagination' => [
                    'current_page' => $films->currentPage(),
                    'total' => $films->total(),
                    'per_page' => $films->perPage(),
                    'last_page' => $films->lastPage(),
                    'next_page_url' => $films->nextPageUrl(),
                    'prev_page_url' => $films->previousPageUrl(),
                ]
            ], 200);
        }
    }

    public function store(FilmRequest $request)
    {
        $Film = Film::create($request->validated());

        return response()->json(['alert' => 'Berhasil Tambah Film!']);
    }

    public function show($id)
    {
        $Film = Film::findOrFail($id);
        return response()->json($Film);
    }

    public function edit($id)
    {
        $Film = Film::findOrFail($id);
        return response()->json($Film);
    }

    public function update(FilmRequest $request, $id)
    {
        $Film = Film::findOrFail($id);
        $Film->update($request->validated());

        return response()->json(['alert' => 'Berhasil Edit Film!']);
    }

    public function destroy($id)
    {
        $Film = Film::findOrFail($id);
        $Film->delete();

        return response()->json(['alert' => 'Berhasil Hapus Film!']);
    }

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
            return response()->json([
                'message' => 'No film found for the specified franchise and category'
            ], 404);
        }

        return response()->json([
            'message' => 'Film retrieved successfully',
            'data' => FilmResource::collection($films),
            'pagination' => [
                'current_page' => $films->currentPage(),
                'total' => $films->total(),
                'per_page' => $films->perPage(),
                'last_page' => $films->lastPage(),
                'next_page_url' => $films->nextPageUrl(),
                'prev_page_url' => $films->previousPageUrl(),
            ]
        ], 200);
    }

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

        if (!$film) {
            return response()->json(['message' => 'Film not found'], 404);
        }

        return response()->json([
            'message' => 'Film found',
            'data' => new FilmResource($film),
        ], 200);
    }
}
