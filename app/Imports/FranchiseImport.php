<?php

namespace App\Imports;

use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FranchiseImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Franchise([
            'name' => $row['name'],
        ]);
    }
}
