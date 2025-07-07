<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new Category();

        // dd($db->getConnection()->getDatabaseName());

        $id = $this->route('id');

        return [
            'era_id' => 'required',
            'franchise_id' => 'required',
            'name' => [
                'required',
                'max:100',
                Rule::unique('categories', 'name')->ignore($id),
            ],
            'desc' => 'nullable|max:1024',
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'era_id.required'       => 'Era is required.',
            'franchise_id.required' => 'Franchise is required.',
            'name.required'         => 'Name is required.',
            'name.max'              => 'Name must be under 100 chars.',
            'name.unique'           => 'Name already exists.',
            'desc.max'              => 'Description max 1024 chars.',
            'img.mimes'             => 'Image must be jpg, jpeg, or png.',
            'img.max'               => 'Image max size is 2MB.',
        ];
    }
}
