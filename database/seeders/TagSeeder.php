<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Tags = [
            [
                'id' => Str::uuid(),
                'name' => 'Primary',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Primary Rider',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Primary Character',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Secondary',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Secondary Rider',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Secondary Character',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Rider',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Villain',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Other',
            ],
        ];
        Tag::query()->insert($Tags);
    }
}
