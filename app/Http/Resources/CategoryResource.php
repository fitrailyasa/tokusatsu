<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'img' => $this->img,
            // 'era' => new EraResource($this->whenLoaded('era')),
            // 'franchise' => new FranchiseResource($this->whenLoaded('franchise')),
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
