<?php

namespace App\Imports;

use App\Models\Geojson;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GeojsonImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name       = $row[1];
        $desc       = $row[2] ?? null;
        $geometry   = $this->decodeJson($row[3] ?? null);
        $properties = $this->decodeJson($row[4] ?? null);

        $checkGeojson = Geojson::withTrashed()->where('name', $name)->first();

        if ($checkGeojson) {
            $checkGeojson->update([
                'desc'       => $desc,
                'geometry'   => $geometry,
                'properties' => $properties,
            ]);
            return null;
        } else {
            return new Geojson([
                'name'       => $name,
                'desc'       => $desc,
                'geometry'   => $geometry,
                'properties' => $properties,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }

    private function decodeJson($value)
    {
        if (empty($value)) {
            return null;
        }

        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded;
        }

        return $value;
    }
}
