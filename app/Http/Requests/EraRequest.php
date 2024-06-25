<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 255 karakter!',
            'desc.max' => 'Deskripsi maksimal 255 karakter!',
            'img.mimes' => 'Format gambar harus jpg, jpeg, png!',
            'img.max' => 'Ukuran gambar maksimal 2 MB!',
        ];
    }
}
