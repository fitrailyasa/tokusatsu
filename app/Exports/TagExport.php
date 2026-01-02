<?php

namespace App\Exports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;

class TagExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $no         = 1;
        $collection = [];
        $tags       = Tag::all();

        foreach ($tags as $item) {
            $collection[] = [
                'No'    => $no++,
                'Name'  => $item->name ?? '',
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
                'No',
                'Name',
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:B1');

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:B' . $sheet->getHighestRow())
            ->applyFromArray($borderStyle);

        return [
            // Style for the first heading
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']], // White
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'], // Black
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
            // Style for the second heading
            2 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']], // White
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'], // Black
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }
}
