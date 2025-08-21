<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Geojson;

class GeojsonSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Monas',
                'desc' => 'Tugu Monas di Jakarta',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [106.827153, -6.175392],
                ],
                'properties' => [
                    'city' => 'Jakarta',
                    'category' => 'Landmark'
                ],
            ],
            [
                'name' => 'Jalur CFD Sudirman',
                'desc' => 'LineString di Jakarta',
                'geometry' => [
                    'type' => 'LineString',
                    'coordinates' => [
                        [106.8218, -6.2146],
                        [106.8225, -6.2025],
                        [106.8272, -6.1860],
                    ],
                ],
                'properties' => [
                    'city' => 'Jakarta',
                    'category' => 'Road'
                ],
            ],
            [
                'name' => 'Bundaran HI',
                'desc' => 'Polygon bundaran HI',
                'geometry' => [
                    'type' => 'Polygon',
                    'coordinates' => [[
                        [106.8230, -6.1930],
                        [106.8235, -6.1925],
                        [106.8240, -6.1930],
                        [106.8235, -6.1935],
                        [106.8230, -6.1930],
                    ]],
                ],
                'properties' => [
                    'city' => 'Jakarta',
                    'category' => 'Area'
                ],
            ],
        ];

        foreach ($data as $item) {
            Geojson::create($item);
        }
    }
}
