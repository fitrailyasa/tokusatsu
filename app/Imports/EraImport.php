<?php

namespace App\Imports;

use App\Models\Era;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EraImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Era([
            'name' => $row['name'],
        ]);
    }
}
