<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchiseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'desc' => 'max:1024',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 100 karakter!',
            'desc.max' => 'Deskripsi maksimal 1024 karakter!',
            'img.mimes' => 'Format gambar harus jpg, jpeg, png!',
            'img.max' => 'Ukuran gambar maksimal 2 MB!',
        ];
    }
}
