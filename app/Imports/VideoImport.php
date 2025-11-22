<?php

namespace App\Imports;

use App\Models\Video;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class VideoImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $title = $row[1];
        $categoryName = $row[2] ?? null;
        $type = $row[3] ?? null;
        $number = $row[4] ?? 0;
        $link = $row[5] ?? null;

        $category = Category::withTrashed()->firstOrCreate(
            ['name' => $categoryName],
            ['type' => null, 'franchise_id' => null, 'era_id' => null]
        );

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
