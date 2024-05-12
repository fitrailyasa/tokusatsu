<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $collection = [];
        
        $categories = Category::with(['franchise', 'era'])->get();

        foreach ($categories as $category) {
            $collection[] = [
                'ID' => '', 
                'Name' => $category->name ?? '',
                'Img' => $category->img ?? '',
                'Desc' => $category->desc ?? '',
                'Era' => $category->Era->name ?? '',
                'Franchise' => $category->Franchise->name ?? '',
            ];
        }

        array_unshift($collection, ['Data Category'], ['']);

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
                'Era',
                'Franchise',
            ],
        ];
    }
}
