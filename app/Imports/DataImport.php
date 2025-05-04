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
        $name = $row[1];
        $categoryName = $row[2] ?? null;
        $img = $row[3] ?? null;
        $tagsName = $row[4] ?? null;

        $category = Category::withTrashed()->where('name', $categoryName)->first();

        if (!$category) {
            $category = Category::create([
                'name' => $categoryName,
                'img' => null,
                'franchise_id' => null,
                'era_id' => null,
            ]);
        }

        $checkData = Data::withTrashed()->where('name', $name)->first();
        if ($checkData) {
            return null;
        }

        $data = new Data([
            'name' => $name,
            'category_id' => $category->id ?? null,
            'img' => $img,
        ]);
        $data->save();

        if (!empty($tagsName)) {
            $tags = explode(',', $tagsName);
            $tagIds = [];

            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tag::withTrashed()->where('name', $tagName)->first();

                if (!$tag) {
                    $tag = new Tag();
                    $tag->name = $tagName;
                    $tag->id = Str::uuid();
                    $tag->save();
                }

                $tagIds[] = $tag->id;
            }

            $data->tags()->sync($tagIds);
        }

        return $data;
    }

    public function startRow(): int
    {
        return 3;
    }
}
