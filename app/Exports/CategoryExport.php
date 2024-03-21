<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Category::with(['franchise', 'era'])->get()->map(function ($category) {
            return [
                'Name' => $category->name ?? '',
                'Img' => $category->img ?? '',
                'Era' => $category->era->name ?? '',
                'Franchise' => $category->franchise->name ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Img',
            'Era',
            'Franchise',
        ];
    }
}
