<?php

namespace App\Exports;

use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FranchiseExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = [];
        
        $franchises = Franchise::all();

        foreach ($franchises as $franchise) {
            $collection[] = [
                'ID' => '', 
                'Name' => $franchise->name ?? '',
                'Img' => $franchise->img ?? '',
                'Desc' => $franchise->desc ?? '',
            ];
        }

        array_unshift($collection, ['Data Franchise'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                '',
                'Name',
                'Img',
                'Desc',
            ]
        ];
    }

}
