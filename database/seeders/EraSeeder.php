<?php

namespace Database\Seeders;

use App\Models\Era;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eras = [
            [
                'name' => 'Showa',
            ],
            [
                'name' => 'Heisei',
            ],
            [
                'name' => 'Reiwa',
            ],
        ];
        Era::query()->insert($eras);
    }
}
