<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Table;

class TableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
            'era_id' => 'nullable|exists:eras,id',
            'franchise_id' => 'nullable|exists:franchises,id',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'search.string' => 'Search must be a string.',
            'search.max' => 'Search must not exceed 255 characters.',
            'perPage.integer' => 'Per Page must be an integer.',
            'perPage.in' => 'Per Page must be 10, 50, or 100.',
            'category_id.exists' => 'Category does not exist.',
            'era_id.exists' => 'Era does not exist.',
            'franchise_id.exists' => 'Franchise does not exist.',
            'category_id.exists' => 'Category does not exist.',
        ];
    }
}
