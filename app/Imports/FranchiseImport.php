<?php

namespace App\Imports;

use App\Models\Franchise;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FranchiseImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $description = $row[3] ?? null;

        $checkFranchise = Franchise::withTrashed()->where('name', $name)->first();

        if ($checkFranchise) {
            $checkFranchise->update([
                'img' => $img,
                'description' => $description,
            ]);

            return null;
        } else {
            return new Franchise([
                'name' => $name,
                'img' => $img,
                'description' => $description,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
