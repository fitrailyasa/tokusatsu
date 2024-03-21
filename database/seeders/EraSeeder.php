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
                'img' => null,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Heisei',
                'img' => null,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Reiwa',
                'img' => null,
            ],
        ];
        Era::query()->insert($eras);
    }
}
