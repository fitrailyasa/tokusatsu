<?php

namespace App\Imports;

use App\Models\Video;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Illuminate\Support\Carbon;

class VideoImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $title        = trim($row[1] ?? '');
        $categoryName = trim($row[2] ?? '');
        $type         = trim($row[3] ?? '');
        $number       = is_numeric($row[4] ?? null) ? (int) $row[4] : null;
        $rawLink      = trim($row[5] ?? '');
        $airDateRaw   = trim($row[6] ?? '');
        $airDate      = null;

        if ($airDateRaw !== '') {
            if (is_numeric($airDateRaw)) {
                $airDate = ExcelDate::excelToDateTimeObject($airDateRaw);
            } else {
                $airDate = null;
            }
        }

        if (!$title || !$categoryName || !$type) {
            return null;
        }

        $category = Category::withTrashed()
            ->whereRaw('LOWER(name) = ?', [strtolower($categoryName)])
            ->first();

        if (!$category) {
            $baseSlug = Str::slug($categoryName);
            $slug = $baseSlug;
            $i = 1;

            while (Category::withTrashed()->where('slug', $slug)->exists()) {
                $slug = "{$baseSlug}-{$i}";
                $i++;
            }

            $category = Category::create([
                'name'          => $categoryName,
                'fullname'      => $categoryName,
                'franchise_id'  => null,
                'era_id'        => null,
                'slug'          => $slug,
            ]);
        }

        $link = [];

        if (!empty($rawLink)) {
            $link = collect(preg_split('/[|,]/', $rawLink))
                ->map(fn($url) => trim($url))
                ->filter(fn($url) => filter_var($url, FILTER_VALIDATE_URL))
                ->values()
                ->toArray();
        }

        $video = Video::firstOrNew([
            'category_id' => $category->id,
            'type'        => $type,
            'number'      => $number,
        ]);

        $video->title = $title;
        $video->link  = $link;

        if ($airDate !== null || !$video->exists) {
            $video->airdate = $airDate?->format('Y-m-d');
        }

        $video->timestamps = false;

        if (!$video->exists) {
            $timestamp = $airDate
                ? Carbon::instance($airDate)
                : now();

            $video->created_at = $timestamp;
            $video->updated_at = $timestamp;
        }

        $video->save();

        return $video;
    }

    public function startRow(): int
    {
        return 3;
    }
}
