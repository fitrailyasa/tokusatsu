<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Video;
use Illuminate\Validation\Rule;

class VideoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $video = $this->route('video') ?? Video::find($this->route('id'));
        $videoId = $video?->id;

        return [
            'title' => 'required|max:1000',
            'type' => 'required|max:100',
            'category_id' => 'required',

            'number' => [
                'nullable',
                'numeric',
                Rule::unique(Video::class, 'number')
                    ->ignore($videoId)
                    ->where(function ($query) {
                        $query->where('type', $this->input('type'))
                            ->where('category_id', $this->input('category_id'));
                    }),
            ],

            'link' => 'nullable|array',
            'link.*' => 'nullable|url|max:225',
            'airdate' => 'nullable|date',
            'status' => 'nullable|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required.',
            'title.max'      => 'Title must be under 100 chars.',
            'type.required' => 'Type is required.',
            'type.max'      => 'Type must be under 100 chars.',
            'category_id.required' => 'Category is required.',
            'number.max'      => 'Number must be under 100 chars.',
            'number.numeric'      => 'Number must be numeric.',
            'number.unique'      => 'Number already exists.',
            'link.array' => 'Link must be an array.',
            'link.*.url' => 'Each link must be a valid URL.',
            'link.*.max' => 'Each link must not exceed 225 characters.',
            'airdate.date'      => 'Airdate must be date.',
            'status.in'      => 'Status must be 0 or 1.',
        ];
    }
}
