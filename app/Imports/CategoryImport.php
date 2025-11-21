<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CategoryImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $description = $row[3] ?? null;
        $eraName = $row[4] ?? null;
        $franchiseName = $row[5] ?? null;

        $era = Era::withTrashed()->firstOrCreate(
            ['name' => $eraName],
            ['img' => null]
        );

        $franchise = Franchise::withTrashed()->firstOrCreate(
            ['name' => $franchiseName],
            ['img' => null]
        );

        return Category::updateOrCreate(
            ['name' => $name],
            [
                'img' => $img ?? null,
                'description' => $description ?? null,
                'era_id' => $era->id,
                'franchise_id' => $franchise->id,
            ]
        );
    }

    public function startRow(): int
    {
        return 3;
    }
}
