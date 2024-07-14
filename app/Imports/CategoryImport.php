<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class CategoryImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $era = Era::where('name', $row[3])->first();

        if (!$era) {
            $era = Era::create([
                'id' => Str::uuid(),
                'name' => $row[3],
                'img' => null,
            ]);
        }

        $franchise = Franchise::where('name', $row[1])->first();

        if (!$franchise) {
            $franchise = Franchise::create([
                'id' => Str::uuid(),
                'name' => $row[1],
                'img' => null,
            ]);
        }

        $checkCategory = Category::where('name', $row[2])->first();

        if ($checkCategory) {
            return null;
        }

        return new Category([
            'id' => Str::uuid(),
            'name' => $row[2],
            'img' => $row[4] ?? null,
            'desc' => $row[5] ?? null,
            'era_id' => $era->id ?? null,
            'franchise_id' => $franchise->id ?? null,
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
    
}
