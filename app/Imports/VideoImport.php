<?php

namespace App\Imports;

use App\Models\Video;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class VideoImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $title = $row[1];
        $categoryName = $row[2] ?? null;
        $type = $row[3] ?? null;
        $number = $row[4] ?? 0;
        $link = $row[5] ?? null;

        $normalizedName = trim($categoryName);

        $category = Category::withTrashed()
            ->whereRaw('LOWER(name) = ?', [strtolower($normalizedName)])
            ->first();

        if (!$category) {
            $baseSlug = Str::slug(Str::lower($normalizedName));
            $slug = $baseSlug;
            $i = 1;

            while (Category::withTrashed()->where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }

            $category = Category::create([
                'name' => $normalizedName,
                'fullname' => $normalizedName,
                'type' => null,
                'franchise_id' => null,
                'era_id' => null,
                'slug' => $slug,
            ]);
        }

        return Video::updateOrCreate(
            [
                'category_id' => $category->id,
                'type' => $type,
                'number' => $number
            ],
            [
                'title' => $title,
                'link' => $link
            ]
        );
    }

    public function startRow(): int
    {
        return 3;
    }
}
