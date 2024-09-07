<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tag;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new Tag();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        $id = $this->route('id');

        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('tag', 'name')->ignore($id),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 100 karakter!',
            'name.unique' => 'Tag sudah ada!'
        ];
    }
}
