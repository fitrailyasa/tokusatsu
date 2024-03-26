<?php

namespace App\Imports;

use App\Models\Tag;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TagImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];

        $existingTag = Tag::where('name', $name)->first();

        if (!$existingTag) {
            return new Tag([
                'id' => Str::uuid(),
                'name' => $name,
            ]);
        }

        return null;
    }

    public function startRow(): int
    {
        return 3;
    }
    
}
