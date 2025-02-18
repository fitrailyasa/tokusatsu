<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DataResource;
use App\Models\Data;

class DataApiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

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

        $perPage = $request->query('per_page', 10);
        $datas = $query->paginate($perPage);

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
