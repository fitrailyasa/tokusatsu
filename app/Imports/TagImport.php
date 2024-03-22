<?php

namespace App\Imports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class TagImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $existingTag = Tag::where('name', $row['name'])->first();

        if (!$existingTag) {
            return new Tag([
                'id' => Str::uuid(),
                'name' => $row['name'],
            ]);
        }

        return null;
    }
}
