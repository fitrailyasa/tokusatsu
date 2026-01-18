<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Era;
use Illuminate\Validation\Rule;

class EraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new Era();

        // dd($db->getConnection()->getDatabaseName());

        $id = $this->route('id');

        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique(Era::class, 'name')->ignore($id),
            ],
            'description' => 'nullable|max:1024',
            'img' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'status' => 'nullable|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.max' => 'Name must be under 100 chars.',
            'name.unique' => 'Name already exists.',
            'description.max' => 'Description max 1024 chars.',
            'img.mimes' => 'Image must be jpg, jpeg, png, webp, or svg.',
            'img.max' => 'Image size must be under 2MB.',
            'status.in' => 'Status must be 0 or 1.',
        ];
    }
}
