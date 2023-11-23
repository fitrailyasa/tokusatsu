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
                'name' => 'Kamen Rider',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider V3',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider X',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider Amazon',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider Stronger',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider Skyrider',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider Super-1',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider ZX',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider Black',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider Black RX',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider Shin',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider ZO',
            ],
            [
                'era_id' => 1,
                'name' => 'Kamen Rider J',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Kuuga',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Agito',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Ryuki',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider 555',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Blade',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Hibiki',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Kabuto',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Den-O',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Kiva',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Decade',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider W',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider OOO',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Fourze',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Wizard',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Gaim',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Drive',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Ghost',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Ex-Aid',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Build',
            ],
            [
                'era_id' => 2,
                'name' => 'Kamen Rider Zi-O',
            ],
            [
                'era_id' => 3,
                'name' => 'Kamen Rider Zero-One',
            ],
            [
                'era_id' => 3,
                'name' => 'Kamen Rider Saber',
            ],
            [
                'era_id' => 3,
                'name' => 'Kamen Rider Revice',
            ],
            [
                'era_id' => 3,
                'name' => 'Kamen Rider Geats',
            ],
            [
                'era_id' => 3,
                'name' => 'Kamen Rider Gotchard',
            ],
        ];
        Category::query()->insert($categories);
    }
}
