<?php

namespace App\Exports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TagExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Tag::all()->map(function ($tag) {
            return [
                'Name' => $tag->name ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
        ];
    }
}
