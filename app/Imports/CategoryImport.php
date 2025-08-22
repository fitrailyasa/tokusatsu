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
        $name = $row[1];
        $img = $row[2] ?? null;
        $description = $row[3] ?? null;
        $eraName = $row[4] ?? null;
        $franchiseName = $row[5] ?? null;

        $era = Era::withTrashed()->where('name', $eraName)->first();

        if (!$era) {
            $era = Era::create([
                'name' => $eraName,
                'img' => null,
            ]);
        }

        $franchise = Franchise::withTrashed()->where('name', $franchiseName)->first();

        if (!$franchise) {
            $franchise = Franchise::create([
                'name' => $franchiseName,
                'img' => null,
            ]);
        }

        $checkCategory = Category::withTrashed()->where('name', $name)->first();

        if ($checkCategory) {
            $checkCategory->update([
                'img' => $img ?? $checkCategory->img,
                'description' => $description ?? $checkCategory->description,
                'era_id' => $era->id,
                'franchise_id' => $franchise->id,
            ]);

            return null;
        }

        return new Category([
            // 'id' => Str::uuid(),
            'name' => $name,
            'img' => $img ?? null,
            'description' => $description ?? null,
            'era_id' => $era->id ?? null,
            'franchise_id' => $franchise->id ?? null,
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
