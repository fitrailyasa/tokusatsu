<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [];

        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Kuuga ($i)",
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1 kuugaRider ($i).jpg",
                'category_id' => 14,
            ];
        }

        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Kuuga ($i)",
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1.1 Grongi ($i).jpg",
                'category_id' => 14,
            ];
        }

        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Agito ($i)",
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2 AgitoRiders ($i).jpg",
                'category_id' => 15,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Agito ($i)",
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2.1 Unknown ($i).jpg",
                'category_id' => 15,
            ];
        }

        for ($i = 1; $i <= 21; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Ryuki ($i)",
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3 RyukiRiders ($i).jpg",
                'category_id' => 16,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Ryuki ($i)",
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3.1 MirrorMonster ($i).jpg",
                'category_id' => 16,
            ];
        }

        for ($i = 1; $i <= 19; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Faiz ($i)",
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4 FaizRiders ($i).jpg",
                'category_id' => 17,
            ];
        }

        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Faiz ($i)",
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4.1 Orphnoch ($i).jpg",
                'category_id' => 17,
            ];
        }

        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Blade ($i)",
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5 BladeRiders ($i).jpg",
                'category_id' => 18,
            ];
        }

        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Blade ($i)",
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5.1 Undead ($i).jpg",
                'category_id' => 18,
            ];
        }

        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Hibiki ($i)",
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6 HibikiRiders ($i).jpg",
                'category_id' => 19,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Hibiki ($i)",
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6.1 Makamou ($i).jpg",
                'category_id' => 19,
            ];
        }

        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Kabuto ($i)",
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7 KabutoRiders ($i).jpg",
                'category_id' => 20,
            ];
        }

        for ($i = 1; $i <= 41; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Kabuto ($i)",
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7.1 Worm ($i).jpg",
                'category_id' => 20,
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Den-O ($i)",
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8 Den-ORiders ($i).jpg",
                'category_id' => 21,
            ];
        }

        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Den-O ($i)",
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8.1 Imagin ($i).jpg",
                'category_id' => 21,
            ];
        }

        for ($i = 1; $i <= 52; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Kiva ($i)",
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9 KivaRiders ($i).jpg",
                'category_id' => 22,
            ];
        }

        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Kiva ($i)",
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9.1 Fangire ($i).jpg",
                'category_id' => 22,
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Decade ($i)",
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10 DecadeRiders ($i).jpg",
                'category_id' => 23,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Decade ($i)",
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10.1 DecadeVillain ($i).jpg",
                'category_id' => 23,
            ];
        }

        Data::query()->insert($datas);
    }
}
