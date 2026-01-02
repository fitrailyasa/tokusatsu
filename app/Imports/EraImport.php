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
        $name           = $row[1];
        $img            = $row[2] ?? null;
        $description    = $row[3] ?? null;

        return Era::updateOrCreate(
            ['name' => $name],
            [
                'img'           => $img,
                'description'   => $description
            ]
        );
    }

    public function startRow(): int
    {
        return 3;
    }
}
