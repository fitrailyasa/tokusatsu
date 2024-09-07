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
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());
        
        $id = $this->route('id');

        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('franchise', 'name')->ignore($id),
            ],
            'desc' => 'max:1024',
            'img' => 'mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 100 karakter!',
            'name.unique' => 'Franchise sudah ada!',
            'desc.max' => 'Deskripsi maksimal 1024 karakter!',
            'img.mimes' => 'Format gambar harus jpg, jpeg, png!',
            'img.max' => 'Ukuran gambar maksimal 2 MB!',
        ];
    }
}
