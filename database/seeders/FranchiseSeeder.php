<?php

namespace Database\Seeders;

use App\Models\Franchise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FranchiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $franchises = [
            [
                'name' => 'Ultraman',
            ],
            [
                'name' => 'Kamen Rider',
            ],
            [
                'name' => 'Super Sentai',
            ],
            [
                'name' => 'Garo',
            ],
        ];
        Franchise::query()->insert($franchises);
    }
}
