<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-user')->only(['index']);
        $this->middleware('permission:create-user')->only(['store']);
        $this->middleware('permission:edit-user')->only(['update']);
        $this->middleware('permission:delete-user')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function store(UserStoreRequest $request)
    {
        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        }

        $role = $userData['role'];
        unset($userData['role']);

        $user = User::create($userData);

        $user->assignRole($role);

        return back()->with('message', 'Berhasil Tambah User!');
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        } else {
            unset($userData['password']);
        }

        $role = $userData['role'];
        unset($userData['role']);

        $user->update($userData);

        $user->syncRoles($role);

        return back()->with('message', 'Berhasil Edit User!');
    }


    public function destroy(string $id)
    {
        User::findOrFail($id)->forceDelete();
        return back()->with('message', 'Berhasil Hapus User!');
    }
}
