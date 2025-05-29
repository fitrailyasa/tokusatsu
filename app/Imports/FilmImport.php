<?php

namespace App\Imports;

use App\Models\Film;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FilmImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $categoryName = $row[2] ?? null;
        $type = $row[3] ?? null;
        $number = $row[4] ?? 0;

        $category = Category::withTrashed()->where('name', $categoryName)->first();

        if (!$category) {
            $category = Category::create([
                'name' => $categoryName,
                'type' => null,
                'franchise_id' => null,
                'era_id' => null,
            ]);
        }

        $checkFilm = Film::withTrashed()->where('name', $name)->first();
        if ($checkFilm) {
            return null;
        }

        $film = new Film([
            'name' => $name,
            'category_id' => $category->id ?? null,
            'type' => $type,
            'number' => $number,
        ]);

        $film->save();

        return $film;
    }

    public function startRow(): int
    {
        return 3;
    }
}
