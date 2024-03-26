<?php

namespace App\Imports;

use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class DataImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $category = Category::where('name', $row[2])->first();

        if (!$category) {
            $category = Category::create([
                'id' => Str::uuid(),
                'name' => $row[2],
                'img' => null,
                'franchise_id' => null,
                'era_id' => null,
            ]);
        }

        $existingData = Data::where('name', $row[1])->first();

        if ($existingData) {
            return null;
        }

        $data = new Data([
            'id' => Str::uuid(),
            'name' => $row[1],
            'category_id' => $category->id ?? null,
            'img' => $row[3] ?? null,
        ]);

        $data->save();

        if (!empty($row[4])) {
            $tags = explode(',', $row[4]);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrNew([
                    'name' => trim($tagName),
                ]);

                if (!$tag->exists) {
                    $tag->id = Str::uuid();
                    $tag->save();
                }

                $data->tags()->attach($tag->id);
            }
        }

        return $data;
    }

    public function startRow(): int
    {
        return 3;
    }

}
