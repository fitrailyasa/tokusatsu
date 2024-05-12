<?php

namespace Database\Seeders;

use App\Models\Franchise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kamen Rider',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Super Sentai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Garo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        Franchise::query()->insert($franchises);
    }
}
