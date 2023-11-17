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
                'name' => 'Kamen Rider',
            ],
            [
                'name' => 'Kamen Rider V3',
            ],
            [
                'name' => 'Kamen Rider X',
            ],
            [
                'name' => 'Kamen Rider Amazon',
            ],
            [
                'name' => 'Kamen Rider Stronger',
            ],
            [
                'name' => 'Kamen Rider Skyrider',
            ],
            [
                'name' => 'Kamen Rider Super-1',
            ],
            [
                'name' => 'Kamen Rider ZX',
            ],
            [
                'name' => 'Kamen Rider Black',
            ],
            [
                'name' => 'Kamen Rider Black RX',
            ],
            [
                'name' => 'Kamen Rider Shin',
            ],
            [
                'name' => 'Kamen Rider ZO',
            ],
            [
                'name' => 'Kamen Rider J',
            ],
            [
                'name' => 'Kamen Rider Kuuga',
            ],
            [
                'name' => 'Kamen Rider Agito',
            ],
            [
                'name' => 'Kamen Rider Ryuki',
            ],
            [
                'name' => 'Kamen Rider 555',
            ],
            [
                'name' => 'Kamen Rider Blade',
            ],
            [
                'name' => 'Kamen Rider Hibiki',
            ],
            [
                'name' => 'Kamen Rider Kabuto',
            ],
            [
                'name' => 'Kamen Rider Den-O',
            ],
            [
                'name' => 'Kamen Rider Kiva',
            ],
            [
                'name' => 'Kamen Rider Decade',
            ],
            [
                'name' => 'Kamen Rider W',
            ],
            [
                'name' => 'Kamen Rider OOO',
            ],
            [
                'name' => 'Kamen Rider Fourze',
            ],
            [
                'name' => 'Kamen Rider Wizard',
            ],
            [
                'name' => 'Kamen Rider Gaim',
            ],
            [
                'name' => 'Kamen Rider Drive',
            ],
            [
                'name' => 'Kamen Rider Ghost',
            ],
            [
                'name' => 'Kamen Rider Ex-Aid',
            ],
            [
                'name' => 'Kamen Rider Build',
            ],
            [
                'name' => 'Kamen Rider Zi-O',
            ],
        ];
        Category::query()->insert($categories);
    }
}
