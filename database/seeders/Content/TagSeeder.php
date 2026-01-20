<?php

namespace Database\Seeders\Content;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Primary',
            'Primary Rider',
            'Primary Character',
            'Secondary',
            'Secondary Rider',
            'Secondary Character',
            'Rider',
            'Villain',
            'Other',
        ];

        foreach ($data as $name) {

            $slug = Str::slug($name);

            $tag = Tag::firstOrNew([
                'slug' => $slug,
            ]);

            $tag->fill([
                'name' => $name,
                'slug' => $slug,
            ]);

            if ($tag->isDirty()) {
                $tag->save();
            }
        }
    }
}
