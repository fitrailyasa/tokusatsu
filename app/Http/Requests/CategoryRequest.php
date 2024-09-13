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
                Rule::unique('category', 'name')->ignore($id),
            ],
            'desc' => 'nullable|max:1024',
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'era_id.required' => 'Era harus dipilih!',
            'franchise_id.required' => 'Franchise harus dipilih!',
            'name.required' => 'Kolom Nama harus diisi!',
            'name.max' => 'Kolom Nama tidak boleh lebih dari 100 karakter!',
            'name.unique' => 'Kolom Nama sudah ada!',
            'desc.max' => 'Kolom Deskripsi tidak boleh lebih dari 1024 karakter!',
            'img.mimes' => 'File harus berupa jpg, jpeg, atau png!',
            'img.max' => 'File tidak boleh lebih dari 2 MB!',
        ];
    }
}
