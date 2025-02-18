<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Http\Resources\DataResource;
use App\Models\Data;
use App\Models\Category;


class DataApiController extends Controller
{
    public function index()
    {
        $datas = Data::with(['category.era', 'category.franchise', 'tags'])->paginate(10);

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
