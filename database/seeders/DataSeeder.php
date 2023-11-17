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

        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                'name' => "Kamen Rider W ($i)",
                'img' => "Kamen Rider/Era Heisei/11. W/2.1 WRiders ($i).jpg",
                'category_id' => 24,
            ];
        }

        for ($i = 1; $i <= 51; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider W ($i)",
                'img' => "Kamen Rider/Era Heisei/11. W/2.1.1 Dopant ($i).jpg",
                'category_id' => 24,
            ];
        }

        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Ooo ($i)",
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2 OooRiders ($i).jpg",
                'category_id' => 25,
            ];
        }

        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Ooo ($i)",
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2.1 Greed ($i).jpg",
                'category_id' => 25,
            ];
        }

        for ($i = 1; $i <= 63; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Fourze ($i)",
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3 FourzeRiders ($i).jpg",
                'category_id' => 26,
            ];
        }

        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Fourze ($i)",
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3.1 Zodiarts ($i).jpg",
                'category_id' => 26,
            ];
        }

        for ($i = 1; $i <= 50; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Wizard ($i)",
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4 WizardRiders ($i).jpg",
                'category_id' => 27,
            ];
        }

        for ($i = 1; $i <= 39; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Wizard ($i)",
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4.1 Phantom ($i).jpg",
                'category_id' => 27,
            ];
        }

        for ($i = 1; $i <= 84; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Gaim ($i)",
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5 GaimRiders ($i).jpg",
                'category_id' => 28,
            ];
        }

        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Gaim ($i)",
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5.1 Overlord ($i).jpg",
                'category_id' => 28,
            ];
        }

        for ($i = 1; $i <= 76; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Drive ($i)",
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6 DriveRiders ($i).jpg",
                'category_id' => 29,
            ];
        }

        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Drive ($i)",
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6.1 Roidmude ($i).jpg",
                'category_id' => 29,
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Ghost ($i)",
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7 GhostRiders ($i).jpg",
                'category_id' => 30,
            ];
        }

        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Ghost ($i)",
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7.1 Gamma ($i).jpg",
                'category_id' => 30,
            ];
        }

        for ($i = 1; $i <= 87; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Ex-Aid ($i)",
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8 Ex-AidRiders ($i).jpg",
                'category_id' => 31,
            ];
        }

        for ($i = 1; $i <= 42; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Ex-Aid ($i)",
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8.1 Bugster ($i).jpg",
                'category_id' => 31,
            ];
        }

        for ($i = 1; $i <= 146; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Build ($i)",
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9 BuildRiders ($i).jpg",
                'category_id' => 32,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Build ($i)",
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9.1 Smash ($i).jpg",
                'category_id' => 32,
            ];
        }

        for ($i = 1; $i <= 58; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Zi-O ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10 Zi-ORiders ($i).jpg",
                'category_id' => 33,
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'name' => "Villain Kamen Rider Zi-O ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10.1 AnotherRiders ($i).jpg",
                'category_id' => 33,
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                'name' => "Kamen Rider Shinobi ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10.2 ShinobiRiders ($i).jpg",
                'category_id' => 33,
            ];
        }

        Data::query()->insert($datas);
    }
}
