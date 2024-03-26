<?php

namespace App\Exports;

use App\Models\Era;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EraExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = [];
        
        $eras = Era::all();

        foreach ($eras as $era) {
            $collection[] = [
                'ID' => '', 
                'Name' => $era->name ?? '',
                'Img' => $era->img ?? '',
                'Desc' => $era->desc ?? '',
            ];
        }

        array_unshift($collection, ['Data Era'], ['']);

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
