<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Role & User
        $this->call(\Database\Seeders\auth\RoleAndPermissionSeeder::class);
        $this->call(\Database\Seeders\auth\UserSeeder::class);
    }
}
