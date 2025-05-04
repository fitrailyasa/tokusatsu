<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

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

    public function store(UserStoreRequest $request)
    {
        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        }

        User::create($userData);

        return back()->with('message', 'Berhasil Tambah User!');
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::where('id', $id)->first();
        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        } else {
            unset($userData['password']);
        }

        $user->update($userData);
        return back()->with('message', 'Berhasil Edit User!');
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->forceDelete();
        return back()->with('message', 'Berhasil Hapus User!');
    }
}
