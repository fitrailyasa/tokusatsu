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
                'ID' => $data->id,
                'Name' => $data->name,
                'Img' => $data->img,
                'Category' => $data->category->name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Img',
            'Category',
        ];
    }
}
