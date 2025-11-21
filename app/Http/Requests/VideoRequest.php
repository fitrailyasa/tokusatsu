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
        $db = new video();
        $videoId = $this->route('video')?->id ?? $this->route('id');

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'number' => [
                'nullable',
                'numeric',
                'max:100',
                Rule::unique($db->getTable(), 'number')->where(function ($query) {
                    return $query->where('type', $this->type);
                })->ignore($videoId)
            ],
            'link' => 'nullable|url',
            'category_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.max'      => 'Name must be under 100 chars.',
            'type.required' => 'Type is required.',
            'type.max'      => 'Type must be under 100 chars.',
            'category_id.required' => 'Category is required.',
            'number.max'      => 'Number must be under 100 chars.',
            'number.numeric'      => 'Number must be numeric.',
            'number.unique'      => 'Number already exists.',
            'link.url'      => 'Link must be url.',
        ];
    }
}
