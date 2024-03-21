<?php

namespace App\Exports;

use App\Models\Era;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EraExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Era::all()->map(function ($era) {
            return [
                'Name' => $era->name ?? '',
                'Img' => $era->img ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Img',
        ];
    }
}
