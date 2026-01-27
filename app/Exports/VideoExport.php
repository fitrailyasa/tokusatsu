<?php

namespace App\Exports;

use App\Models\Video;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class VideoExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $categoryId;

    public function __construct($categoryId = null)
    {
        $this->categoryId = $categoryId;
    }

    public function collection()
    {
        $no         = 1;
        $collection = [];
        $Videos = Video::leftJoin('categories', 'videos.category_id', '=', 'categories.id')
            ->leftJoin('franchises', 'categories.franchise_id', '=', 'franchises.id')
            ->select('videos.*')
            ->when(
                $this->categoryId,
                fn($q) =>
                $q->where('videos.category_id', $this->categoryId)
            )
            ->orderBy('videos.type')
            ->orderBy('franchises.id')
            ->orderBy('categories.first_aired')
            ->get();

        foreach ($Videos as $item) {
            $collection[] = [
                'No'       => $no++,
                'Title'    => $item->title ?? '',
                'Category' => $item->category->name ?? 'null',
                'Type'     => $item->type ?? '',
                'Number'   => $item->number ?? 0,
                'Link'     => is_array($item->link) ? implode(', ', $item->link) : ($item->link ?? ''),
                'AirDate'  => $item->airdate ? \Carbon\Carbon::parse($item->airdate)->format('Y-m-d') : '',
            ];
        }

        array_unshift($collection, ['Video'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                'No',
                'Title',
                'Category',
                'Type',
                'Number',
                'Link',
                'AirDate',
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:G1');

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:G' . $sheet->getHighestRow())
            ->applyFromArray($borderStyle);

        $highestRow = $sheet->getHighestRow();
        $sheet->getStyle("G3:G{$highestRow}")
            ->getNumberFormat()
            ->setFormatCode('yyyy-mm-dd');

        $sheet->getStyle("G3:G{$highestRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_RIGHT);

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
