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
        $era = Era::withTrashed()->where('name', $row[4])->first();

        if (!$era) {
            $era = Era::create([
                'name' => $row[4],
                'img' => null,
            ]);
        }

        $franchise = Franchise::withTrashed()->where('name', $row[5])->first();

        if (!$franchise) {
            $franchise = Franchise::create([
                'name' => $row[5],
                'img' => null,
            ]);
        }

        $checkCategory = Category::withTrashed()->where('name', $row[2])->first();

        if ($checkCategory) {
            $checkCategory->update([
                'img' => $row[4] ?? $checkCategory->img,
                'desc' => $row[5] ?? $checkCategory->desc,
                'era_id' => $era->id,
                'franchise_id' => $franchise->id,
            ]);

            return null;
        }

        return new Category([
            // 'id' => Str::uuid(),
            'name' => $row[2],
            'img' => $row[3] ?? null,
            'desc' => $row[4] ?? null,
            'era_id' => $era->id ?? null,
            'franchise_id' => $franchise->id ?? null,
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
