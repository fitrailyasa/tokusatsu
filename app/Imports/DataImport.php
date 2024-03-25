<?php

namespace App\Imports;

use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class DataImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $category = Category::where('name', $row['category'])->first();

        if (!$category) {
            $category = Category::create([
                'id' => Str::uuid(),
                'name' => $row['category'],
                'img' => null,
                'franchise_id' => null,
                'era_id' => null,
            ]);
        }

        $existingData = Data::where('name', $row['name'])->first();

        if ($existingData) {
            return null;
        }

        $data = new Data([
            'id' => Str::uuid(),
            'name' => $row['name'],
            'category_id' => $category->id ?? null,
            'img' => $row['img'] ?? null,
        ]);

        $data->save();

        if (!empty($row['tags'])) {
            $tags = explode(',', $row['tags']);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrNew(['name' => trim($tagName)]);

                if (!$tag->exists) {
                    $tag->id = Str::uuid();
                    $tag->save();
                }

                $data->tags()->attach($tag->id);
            }
        }

        return $data;
    }
}
