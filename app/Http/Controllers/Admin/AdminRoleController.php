<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $roles = Role::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $roles = Role::paginate($validPerPage);
        }

        $permissions = Permission::all();

        return view("admin.role.index", compact('roles', 'permissions', 'search', 'perPage'));
    }


    public function store(Request $request)
    {
        return back()->with('message', 'Berhasil Tambah Data Role!');
    }

    public function update(Request $request, $id)
    {
        return back()->with('message', 'Berhasil Edit Data Role!');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->forceDelete();
        return back()->with('message', 'Berhasil Hapus Data Role!');
    }
}
