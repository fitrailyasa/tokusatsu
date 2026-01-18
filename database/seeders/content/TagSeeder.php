<?php

namespace Database\Seeders\Content;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Primary',
                'slug' => Str::slug('Primary', '-'),
            ],
            [
                'name' => 'Primary Rider',
                'slug' => Str::slug('Primary Rider', '-'),
            ],
            [
                'name' => 'Primary Character',
                'slug' => Str::slug('Primary Character', '-'),
            ],
            [
                'name' => 'Secondary',
                'slug' => Str::slug('Secondary', '-'),
            ],
            [
                'name' => 'Secondary Rider',
                'slug' => Str::slug('Secondary Rider', '-'),
            ],
            [
                'name' => 'Secondary Character',
                'slug' => Str::slug('Secondary Character', '-'),
            ],
            [
                'name' => 'Rider',
                'slug' => Str::slug('Rider', '-'),
            ],
            [
                'name' => 'Villain',
                'slug' => Str::slug('Villain', '-'),
            ],
            [
                'name' => 'Other',
                'slug' => Str::slug('Other', '-'),
            ],
        ];

        foreach ($data as $item) {
            Tag::create($item);
        }
    }
}
