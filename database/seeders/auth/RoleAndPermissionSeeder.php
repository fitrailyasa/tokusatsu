<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        $entities = [
            'user' => ['view', 'create', 'edit', 'delete'],
            'role' => ['view', 'create', 'edit', 'delete'],
            'era' => ['view', 'create', 'edit', 'delete', 'delete-all', 'soft-delete', 'soft-delete-all', 'restore', 'restore-all', 'import', 'export'],
            'franchise' => ['view', 'create', 'edit', 'delete', 'delete-all', 'soft-delete', 'soft-delete-all', 'restore', 'restore-all', 'import', 'export'],
            'category' => ['view', 'create', 'edit', 'delete', 'delete-all', 'soft-delete', 'soft-delete-all', 'restore', 'restore-all', 'import', 'export'],
            'tag' => ['view', 'create', 'edit', 'delete', 'delete-all', 'soft-delete', 'soft-delete-all', 'restore', 'restore-all', 'import', 'export'],
            'data' => ['view', 'create', 'edit', 'delete', 'delete-all', 'soft-delete', 'soft-delete-all', 'restore', 'restore-all', 'import', 'export'],
            'video' => ['view', 'create', 'edit', 'delete', 'delete-all', 'soft-delete', 'soft-delete-all', 'restore', 'restore-all', 'import', 'export'],
            'video-report' => ['view', 'delete', 'delete-all'],
            'provider' => ['view', 'upload', 'download', 'edit', 'delete', 'auth', 'export'],
        ];

        foreach ($entities as $entity => $actions) {
            foreach ($actions as $action) {
                Permission::firstOrCreate(['name' => "{$action}:{$entity}"]);
            }
        }

        $roles = [
            'super-admin' => Permission::all()->pluck('name')->toArray(),
            'admin' => Permission::where('name', 'not like', '%:role')->where('name', 'not like', '%:user')->where('name', 'not like', '%-all:%')->pluck('name')->toArray(),
            'user' => [
                'view:provider',
                'view:data'
            ],
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }
    }
}
