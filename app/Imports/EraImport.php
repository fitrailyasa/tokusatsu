<?php

namespace App\Imports;

use App\Models\Era;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EraImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkEra = Era::withTrashed()->where('name', $name)->first();

        if ($checkEra) {
            $checkEra->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Era([
                'name' => $name,
                'img' => $img,
                'desc' => $desc,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
