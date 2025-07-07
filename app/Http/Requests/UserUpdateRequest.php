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
            'email_verified' => 'required|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.max' => 'Name must be under 100 chars.',
            'email.required' => 'Email is required.',
            'email.max' => 'Email must be under 255 chars.',
            'email.unique' => 'Email is already registered.',
            'no_hp.max' => 'Phone number max 255 chars.',
            'password.min' => 'Password must be at least 8 chars.',
            'role.required' => 'Role is required.',
            'email_verified.required' => 'Email is not verified.',
        ];
    }
}
