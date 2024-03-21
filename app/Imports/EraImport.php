<?php

namespace App\Imports;

use App\Models\Era;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class EraImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $existingEra = Era::where('name', $row['name'])->first();

        if (!$existingEra) {
            return new Era([
                'id' => Str::uuid(),
                'name' => $row['name'],
                'img' => $row['img'] ?? null,
            ]);
        }

        return null;
    }
}
