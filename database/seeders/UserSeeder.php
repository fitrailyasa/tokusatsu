<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'super@admin.com',
                'role' => 'admin',
                'status' => 'aktif',
                'no_hp' => '081234567890',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'status' => 'aktif',
                'no_hp' => '081234567890',
                'password' => Hash::make('password')
            ],
        ];
        User::query()->insert($users);
    }
}
