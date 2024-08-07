<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|max:255|unique:users,email',
            'no_hp' => 'max:255',
            'password' => 'min:8',
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
