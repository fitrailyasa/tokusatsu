<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Kamen Rider',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'V3',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'X',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Amazon',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Stronger',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Skyrider',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Super-1',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'ZX',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Black',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Black RX',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Shin',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'ZO',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'J',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kuuga',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Agito',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ryuki',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => '555',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Blade',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Hibiki',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kabuto',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Den-O',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kiva',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Decade',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'W',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'OOO',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Fourze',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Wizard',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Gaim',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Drive',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ghost',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ex-Aid',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Build',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Zi-O',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Zero-One',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Saber',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Revice',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Geats',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Gotchard',
            ],
        ];
        Category::query()->insert($categories);
    }
}
