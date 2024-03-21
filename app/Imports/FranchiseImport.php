<?php

namespace App\Imports;

use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class FranchiseImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $existingFranchise = Franchise::where('name', $row['name'])->first();

        if (!$existingFranchise) {
            return new Franchise([
                'id' => Str::uuid(),
                'name' => $row['name'],
                'img' => $row['img'] ?? null,
            ]);
        }

        return null;
    }
}
