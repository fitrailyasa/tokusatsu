<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $roles = [
            [
                'id' => 'admin',
                'name' => 'Admin',
            ],
            [
                'id' => 'user',
                'name' => 'User',
            ]
        ];
        $users = User::all();
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email',
                'no_hp' => 'max:255',
                'password' => 'required',
                'role' => 'required',
                'status' => 'required',
            ],
            [
                'name.required' => 'name harus diisi!',
                'name.max' => 'name maksimal 255 karakter!',
                'email.required' => 'Email harus diisi!',
                'email.max' => 'Email maksimal 255 karakter!',
                'email.unique' => 'Email sudah terdaftar!',
                'no_hp.max' => 'No HP maksimal 255 karakter!',
                'password.required' => 'Password harus diisi!',
                'role.required' => 'Roles harus diisi!',
                'status.required' => 'Status harus diisi!',
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return back()->with('alert', 'Berhasil Tambah User!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'no_hp' => 'max:255',
            'role' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'name harus diisi!',
            'name.max' => 'name maksimal 255 karakter!',
            'email.required' => 'Email harus diisi!',
            'email.max' => 'Email maksimal 255 karakter!',
            'no_hp.max' => 'No HP maksimal 255 karakter!',
            'role.required' => 'Roles harus diisi!',
            'status.required' => 'Status harus diisi!',
        ]);

        $user = User::where('id', $id)->first();
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
            'status' => $request->status,
        ];

        if ($request->has('password') && !empty($request->password)) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return back()->with('alert', 'Berhasil Edit User!');
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return back()->with('alert', 'Berhasil Hapus User!');
    }
}
