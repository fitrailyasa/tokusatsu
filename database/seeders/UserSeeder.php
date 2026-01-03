<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat roles jika belum ada
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Daftar user
        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'super@admin.com',
                'no_hp' => '081234567890',
                'password' => Hash::make('password'),
                'role' => 'super-admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'no_hp' => '081234567890',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'no_hp' => '081234567890',
                'password' => Hash::make('password'),
                'role' => 'user',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            $role = $userData['role'];
            unset($userData['role']);

            $user = User::create($userData);
            $user->assignRole($role);
        }
    }
}
