<?php

namespace Database\Seeders;

use App\Models\Era;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eras = [
            [
                'id' => Str::uuid(),
                'name' => 'Showa',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Heisei',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Reiwa',
            ],
        ];
        Era::query()->insert($eras);
    }
}
