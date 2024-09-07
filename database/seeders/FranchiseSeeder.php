<?php

namespace Database\Seeders;

use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class FranchiseSeeder extends Seeder
{
    public function run(): void
    {
        $data = collect([
            [
                'name' => 'Ultraman',
                'slug' => Str::slug('Ultraman', '-'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kamen Rider',
                'slug' => Str::slug('Kamen Rider', '-'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Super Sentai',
                'slug' => Str::slug('Super Sentai', '-'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        foreach ($data as $franchise) {
            Franchise::create($franchise);
        }
    }
}
