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
        $db->setDynamicConnection();

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
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 100 karakter!',
            'category_id.required' => 'Kategori tidak boleh kosong!',
            'img.mimes' => 'Format gambar harus jpg, jpeg, png!',
            'img.max' => 'Ukuran gambar maksimal 2 MB!',
        ];
    }
}
