<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    public function collection()
    {

        $collection = [];
        
        $datas = Data::with('category')->get();

        foreach ($datas as $data) {
            $collection[] = [
                'ID' => '', 
                'Name' => $data->name ?? '',
                'Category' => $data->Category->name ?? '',
                'Img' => $data->img ?? '',
                'Tags' => implode(', ', $data->tags->pluck('name')->toArray()),
            ];
        }

        array_unshift($collection, ['Data'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                '',
                'Name',
                'Category',
                'Img',
                'Tags',
            ]
        ];
    }
}
