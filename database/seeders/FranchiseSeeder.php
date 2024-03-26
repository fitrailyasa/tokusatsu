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
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kamen Rider',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Super Sentai',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Garo',
            ],
        ];
        Franchise::query()->insert($franchises);
    }
}
