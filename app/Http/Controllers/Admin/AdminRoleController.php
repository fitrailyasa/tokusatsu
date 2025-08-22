<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\TableRequest;

class AdminRoleController extends Controller
{
    // Middleware for role permissions
    public function __construct()
    {
        $this->middleware('permission:view:role')->only(['index']);
        $this->middleware('permission:create:role')->only(['store']);
        $this->middleware('permission:edit:role')->only(['update']);
        $this->middleware('permission:delete:role')->only(['destroy']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
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
        $permissions = $this->mapPermissionBadgeAndType($permissions);

        return view("admin.role.index", compact('roles', 'permissions', 'search', 'perPage'));
    }


    // Handle store data role
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::create(['name' => $validated['name']]);

        if (!empty($validated['permissions'])) {
            $permissions = Permission::whereIn('id', $validated['permissions'])->pluck('name')->toArray();
            $role->syncPermissions($permissions);
        }

        return back()->with('success', 'Successfully Create Data Role!');
    }

    // Handle update data role
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->update(['name' => $validated['name']]);

        if (isset($validated['permissions'])) {
            $permissions = Permission::whereIn('id', $validated['permissions'])->pluck('name')->toArray();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions([]);
        }

        return back()->with('success', 'Successfully Edit Data Role!');
    }

    // Handle delete data role
    public function destroy($id)
    {
        Role::findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Data Role!');
    }

    /**
     * Mapping permission to badgeClass and type
     * 
     * @param Illuminate\Support\Collection $permissions
     * 
     * @return Illuminate\Support\Collection
     */
    private function mapPermissionBadgeAndType($permissions)
    {
        return $permissions->map(function ($permission) {
            $name = strtolower($permission->name);

            if (str_contains($name, 'view')) {
                $badgeClass = 'badge-secondary';
            } elseif (str_contains($name, 'create')) {
                $badgeClass = 'badge-primary';
            } elseif (str_contains($name, 'edit')) {
                $badgeClass = 'badge-warning';
            } elseif (str_contains($name, 'delete')) {
                $badgeClass = 'badge-danger';
            } elseif (str_contains($name, 'restore')) {
                $badgeClass = 'badge-dark';
            } elseif (str_contains($name, 'import')) {
                $badgeClass = 'badge-info';
            } elseif (str_contains($name, 'export')) {
                $badgeClass = 'badge-success';
            } else {
                $badgeClass = 'badge-gray';
            }

            $type = ucfirst(explode('-', $name)[0]);

            return (object)[
                'id' => $permission->id,
                'name' => $permission->name,
                'badgeClass' => $badgeClass,
                'type' => $type,
            ];
        });
    }
}
