<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Video;

class VideoApiController extends Controller
{
    // Handle api list videos data
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);

        $query = Video::with(['category.era', 'category.franchise']);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $videos = $query->paginate($perPage);

        if ($videos->isEmpty()) {
            return ApiResponse::error('No videos found', 404);
        }

        return ApiResponse::success(
            'Videos retrieved successfully',
            videoResource::collection($videos),
            [
                'current_page'   => $videos->currentPage(),
                'total'          => $videos->total(),
                'per_page'       => $videos->perPage(),
                'last_page'      => $videos->lastPage(),
                'next_page_url'  => $videos->nextPageUrl(),
                'prev_page_url'  => $videos->previousPageUrl(),
            ]
        );
    }

    // Handle api store video data
    public function store(videoRequest $request)
    {
        $video = Video::create($request->validated());
        return ApiResponse::success('Video created successfully', new videoResource($video), null, 201);
    }

    // Handle api show video data
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return ApiResponse::success('Video retrieved successfully', new videoResource($video));
    }

    // Handle api edit video data
    public function edit($id)
    {
        return $this->show($id);
    }

    // Handle api update video data
    public function update(videoRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->update($request->validated());

        return ApiResponse::success('Video updated successfully', new videoResource($video));
    }

    // Handle api delete video data
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return ApiResponse::success('Video deleted successfully');
    }

    // Handle api find videos by franchise category
    public function findByFranchiseCategory(Request $request, $franchise, $category)
    {
        $perPage = $request->query('per_page', 10);

        $videos = Video::with(['category.franchise'])
            ->whereHas('category', function ($q) use ($category, $franchise) {
                $q->where('slug', 'LIKE', "%{$category}%")
                    ->whereHas('franchise', function ($q2) use ($franchise) {
                        $q2->where('slug', 'LIKE', "%{$franchise}%");
                    });
            })
            ->paginate($perPage);

        if ($videos->isEmpty()) {
            return ApiResponse::error("No video found for the specified franchise and category", 404);
        }

        return ApiResponse::success(
            'Videos retrieved successfully',
            videoResource::collection($videos),
            [
                'current_page'   => $videos->currentPage(),
                'total'          => $videos->total(),
                'per_page'       => $videos->perPage(),
                'last_page'      => $videos->lastPage(),
                'next_page_url'  => $videos->nextPageUrl(),
                'prev_page_url'  => $videos->previousPageUrl(),
            ]
        );
    }

    // Handle api find videos by franchise category & episode number
    public function findByFranchiseCategoryNumber($franchise, $category, $type, $number)
    {
        $video = Video::with(['category.franchise'])
            ->where('number', $number)
            ->where('type', $type)
            ->whereHas('category', function ($query) use ($category, $franchise) {
                $query->where('slug', $category)
                    ->whereHas('franchise', function ($subQuery) use ($franchise) {
                        $subQuery->where('slug', $franchise);
                    });
            })->first();

        if (!$video) {
            return ApiResponse::error('No video found', 404);
        }

        return ApiResponse::success(
            'Video retrieved successfully',
            new videoResource($video)
        );
    }
}
