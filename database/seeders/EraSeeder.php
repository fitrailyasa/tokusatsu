<?php

namespace Database\Seeders;

use App\Models\Era;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class EraSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Showa',
                'slug' => Str::slug('Showa', '-'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Heisei',
                'slug' => Str::slug('Heisei', '-'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Reiwa',
                'slug' => Str::slug('Reiwa', '-'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        
        foreach ($data as $era) {
            Era::create($era);
        }
    }
}
