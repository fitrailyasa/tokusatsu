<?php

namespace App\Imports;

use App\Models\Data;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $category = Category::where('name', $row['category'])->first();

        if (!$category) {
            $category = Category::create([
                'name' => $row['category'],
            ]);
        }

        return new Data([
            'name' => $row['name'],
            'category_id' => $category->id,
            'img' => $row['img'],
        ]);
    }
}
