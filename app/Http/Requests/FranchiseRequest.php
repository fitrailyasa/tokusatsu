<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Franchise;
use Illuminate\Validation\Rule;

class FranchiseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new Franchise();

        // dd($db->getConnection()->getDatabaseName());

        $id = $this->route('id');

        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('franchises', 'name')->ignore($id),
            ],
            'description' => 'max:1024',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
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
            'img.mimes' => 'Image must be jpg, jpeg, or png.',
            'img.max' => 'Image size must be under 2MB.',
            'status.in' => 'Status must be 0 or 1.',
        ];
    }
}
