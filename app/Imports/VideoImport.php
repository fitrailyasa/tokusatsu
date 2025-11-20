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
        $name = $row[1];
        $categoryName = $row[2] ?? null;
        $type = $row[3] ?? null;
        $number = $row[4] ?? 0;
        $link = $row[5] ?? null;

        $category = Category::withTrashed()->where('name', $categoryName)->first();

        if (!$category) {
            $category = Category::create([
                'name' => $categoryName,
                'type' => null,
                'franchise_id' => null,
                'era_id' => null,
            ]);
        }

        $checkVideo = Video::withTrashed()->where('name', $name)->first();
        if ($checkVideo) {
            // return null;
            $checkVideo->update([
                'category_id' => $category->id ?? null,
                'type' => $type,
                'number' => $number,
                'link' => $link,
            ]);
            return $checkVideo;
        }

        $video = new Video([
            'name' => $name,
            'category_id' => $category->id ?? null,
            'type' => $type,
            'number' => $number,
            'link' => $link,
        ]);

        $video->save();

        return $video;
    }

    public function startRow(): int
    {
        return 3;
    }
}
