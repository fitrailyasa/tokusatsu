<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'img' => $this->img,
                'description' => $this->description ?? '', // Ensure description is not null
                'category' => $this->whenLoaded('category', function () {
                    return new CategoryResource($this->category);
                }), // Load category only when it is loaded
                'tags' => $this->whenLoaded('tags', function () {
                    return TagResource::collection($this->tags);
                }), // Load tags only when they are loaded
            ],
        ];
    }
}
