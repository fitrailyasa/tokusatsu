<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Film;

class FilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new Film();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'number' => 'nullable|numeric|max:100',
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
            'link.url'      => 'Link must be url.',
        ];
    }
}
