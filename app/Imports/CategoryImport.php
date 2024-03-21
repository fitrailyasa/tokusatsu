<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class CategoryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $era = Era::where('name', $row['era'])->first();

        if (!$era) {
            $era = Era::create([
                'id' => Str::uuid(),
                'name' => $row['era'],
                'img' => $row['img'] ?? null,
            ]);
        }

        $franchise = Franchise::where('name', $row['franchise'])->first();

        if (!$franchise) {
            $franchise = Franchise::create([
                'id' => Str::uuid(),
                'name' => $row['franchise'],
                'img' => $row['img'] ?? null,
            ]);
        }

        $existingCategory = Category::where('name', $row['name'])->first();

        if ($existingCategory) {
            return null;
        }

        return new Category([
            'id' => Str::uuid(),
            'name' => $row['name'],
            'img' => $row['img'] ?? null,
            'era_id' => $era->id ?? null,
            'franchise_id' => $franchise->id ?? null,
        ]);
    }
}
