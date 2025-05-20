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
            'category_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 100 karakter!',
            'type.required' => 'Tipe tidak boleh kosong!',
            'type.max' => 'Tipe maksimal 100 karakter!',
            'category_id.required' => 'Kategori tidak boleh kosong!',
        ];
    }
}
