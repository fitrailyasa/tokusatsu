<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'era_id' => 'required',
            'franchise_id' => 'required',
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'era_id.required' => 'Era harus dipilih!',
            'franchise_id.required' => 'Franchise harus dipilih!',
            'name.required' => 'Kolom Nama harus diisi!',
            'name.max' => 'Kolom Nama tidak boleh lebih dari 255 karakter!',
            'desc.max' => 'Kolom Deskripsi tidak boleh lebih dari 255 karakter!',
            'img.mimes' => 'File harus berupa jpg, jpeg, atau png!',
            'img.max' => 'File tidak boleh lebih dari 2 MB!',
        ];
    }
}
