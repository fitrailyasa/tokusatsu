<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Data::with('category')->get()->map(function ($data) {
            return [
                'Name' => $data->name ?? '',
                'Img' => $data->img ?? '',
                'Category' => $data->Category->name ?? '',
                'Tags' => $data->tags ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Img',
            'Category',
            'Tags',
        ];
    }
}
