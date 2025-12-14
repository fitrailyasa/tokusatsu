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
        $fullname = $row[1];
        $name = $row[2];
        $img = $row[3] ?? null;
        $description = $row[4] ?? null;
        $eraName = $row[5] ?? null;
        $franchiseName = $row[6] ?? null;
        $status = $row[7] ?? null;

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
                'fullname' => $fullname,
                'img' => $img ?? null,
                'description' => $description ?? null,
                'era_id' => $era->id,
                'franchise_id' => $franchise->id,
                'status' => $status,
            ]
        );
    }

    public function startRow(): int
    {
        return 3;
    }
}
