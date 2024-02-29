<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $era = Era::where('name', $row['era'])->first();

        if (!$era) {
            $era = Era::create([
                'name' => $row['era'],
            ]);
        }

        $franchise = Franchise::where('name', $row['franchise'])->first();

        if (!$franchise) {
            $franchise = Franchise::create([
                'name' => $row['franchise'],
            ]);
        }

        return new Category([
            'name' => $row['name'],
            'era_id' => $era->id,
            'franchise_id' => $franchise->id,
        ]);
    }
}
