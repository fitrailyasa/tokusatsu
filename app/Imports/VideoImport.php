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
        $title        = trim($row[1] ?? '');
        $categoryName = trim($row[2] ?? '');
        $type         = trim($row[3] ?? '');
        $number       = is_numeric($row[4] ?? null) ? (int) $row[4] : null;
        $rawLink      = trim($row[5] ?? '');

        if (!$title || !$categoryName || !$type) {
            return null;
        }

        $category = Category::withTrashed()
            ->whereRaw('LOWER(name) = ?', [strtolower($categoryName)])
            ->first();

        if (!$category) {
            $baseSlug = Str::slug($categoryName);
            $slug = $baseSlug;
            $i = 1;

            while (Category::withTrashed()->where('slug', $slug)->exists()) {
                $slug = "{$baseSlug}-{$i}";
                $i++;
            }

            $category = Category::create([
                'name'         => $categoryName,
                'fullname'     => $categoryName,
                'franchise_id' => null,
                'era_id' => null,
                'slug' => $slug,
            ]);
        }

        $link = [];

        if (!empty($rawLink)) {
            $link = collect(preg_split('/[|,]/', $rawLink))
                ->map(fn($url) => trim($url))
                ->filter(fn($url) => filter_var($url, FILTER_VALIDATE_URL))
                ->values()
                ->toArray();
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
