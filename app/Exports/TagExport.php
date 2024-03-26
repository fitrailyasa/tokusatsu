<?php

namespace App\Exports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TagExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = [];
        
        $tags = Tag::all();

        foreach ($tags as $tag) {
            $collection[] = [
                'ID' => '', 
                'Name' => $tag->name ?? '',
            ];
        }

        array_unshift($collection, ['Data Tag'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                '',
                'Name',
            ]
        ];
    }

}
