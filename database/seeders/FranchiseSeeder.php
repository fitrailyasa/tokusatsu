<?php

namespace Database\Seeders;

use App\Models\Franchise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FranchiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $franchises = [
            [
                'id' => Str::uuid(),
                'name' => 'Ultraman',
                'img' => null,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kamen Rider',
                'img' => null,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Super Sentai',
                'img' => null,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Garo',
                'img' => null,
            ],
        ];
        Franchise::query()->insert($franchises);
    }
}
