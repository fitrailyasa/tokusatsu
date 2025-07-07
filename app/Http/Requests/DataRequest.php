<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Data;

class DataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new Data();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'category_id' => 'required',
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.max' => 'Name must be under 100 chars.',
            'category_id.required' => 'Category is required.',
            'img.mimes' => 'Image must be jpg, jpeg, or png.',
            'img.max' => 'Image size must be under 2MB.',
        ];
    }
}
