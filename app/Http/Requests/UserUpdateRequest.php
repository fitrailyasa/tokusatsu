<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new User();

        // dd($db->getConnection()->getDatabaseName());

        $id = $this->route('user');

        return [
            'name' => 'required|max:100',
            'email' => [
                'required',
                'max:255',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'no_hp' => 'max:255',
            'password' => 'nullable|min:8',
            'role' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 100 karakter!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.max' => 'Email maksimal 255 karakter!',
            'email.unique' => 'Email sudah terdaftar!',
            'no_hp.max' => 'No. HP maksimal 255 karakter!',
            'password.min' => 'Kata sandi minimal 8 karakter!',
            'role.required' => 'Role tidak boleh kosong!',
            'status.required' => 'Status tidak boleh kosong!',
        ];
    }
}
