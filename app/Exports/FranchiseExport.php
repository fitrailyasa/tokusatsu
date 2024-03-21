<?php

namespace App\Exports;

use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FranchiseExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Franchise::all()->map(function ($franchise) {
            return [
                'Name' => $franchise->name ?? '',
                'Img' => $franchise->img ?? '',
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
