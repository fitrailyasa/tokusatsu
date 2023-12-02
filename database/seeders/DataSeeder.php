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

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'name' => "Kamen Rider ($i)",
                'img' => "Kamen Rider/Era Showa/0.1 IchigoNigoRiders ($i).jpg",
                'category_id' => 1,
            ];
        }

        for ($i = 1; $i <= 9; $i++) {
            $datas[] = [
                'name' => "V3 ($i)",
                'img' => "Kamen Rider/Era Showa/0.2 V3RidermanRiders ($i).jpg",
                'category_id' => 2,
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'name' => "X",
                'img' => "Kamen Rider/Era Showa/0.3 XRider.jpg",
                'category_id' => 3,
            ];
        }

        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'name' => "Amazon ($i)",
                'img' => "Kamen Rider/Era Showa/0.4 AmazonRider ($i).jpg",
                'category_id' => 4,
            ];
        }

        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'name' => "Stronger ($i)",
                'img' => "Kamen Rider/Era Showa/0.5 StrongerRider ($i).jpg",
                'category_id' => 5,
            ];
        }

        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'name' => "SkyRider ($i)",
                'img' => "Kamen Rider/Era Showa/0.6 SkyRider ($i).jpg",
                'category_id' => 6,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'name' => "Super-1 ($i)",
                'img' => "Kamen Rider/Era Showa/0.7 Super1Rider ($i).jpg",
                'category_id' => 7,
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'name' => "ZX",
                'img' => "Kamen Rider/Era Showa/0.7.Movie 10thKamenRider.jpg",
                'category_id' => 8,
            ];
        }

        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'name' => "Black ($i)",
                'img' => "Kamen Rider/Era Showa/0.8 BlackRiders ($i).jpg",
                'category_id' => 9,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Black RX ($i)",
                'img' => "Kamen Rider/Era Showa/0.9 BlackRXRiders ($i).jpg",
                'category_id' => 10,
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'name' => "Shin",
                'img' => "Kamen Rider/Era Showa/0.13 ShinRider.jpg",
                'category_id' => 11,
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'name' => "ZO",
                'img' => "Kamen Rider/Era Showa/0.14 ZORider.jpg",
                'category_id' => 12,
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'name' => "J",
                'img' => "Kamen Rider/Era Showa/0.15 JRider.jpg",
                'category_id' => 13,
            ];
        }

        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                'name' => "Kuuga ($i)",
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1 kuugaRider ($i).jpg",
                'category_id' => 14,
            ];
        }

        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'name' => "Villain Kuuga ($i)",
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1.1 Grongi ($i).jpg",
                'category_id' => 14,
            ];
        }

        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                'name' => "Agito ($i)",
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2 AgitoRiders ($i).jpg",
                'category_id' => 15,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Agito ($i)",
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2.1 Unknown ($i).jpg",
                'category_id' => 15,
            ];
        }

        for ($i = 1; $i <= 21; $i++) {
            $datas[] = [
                'name' => "Ryuki ($i)",
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3 RyukiRiders ($i).jpg",
                'category_id' => 16,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Ryuki ($i)",
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3.1 MirrorMonster ($i).jpg",
                'category_id' => 16,
            ];
        }

        for ($i = 1; $i <= 19; $i++) {
            $datas[] = [
                'name' => "Faiz ($i)",
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4 FaizRiders ($i).jpg",
                'category_id' => 17,
            ];
        }

        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                'name' => "Villain Faiz ($i)",
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4.1 Orphnoch ($i).jpg",
                'category_id' => 17,
            ];
        }

        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                'name' => "Blade ($i)",
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5 BladeRiders ($i).jpg",
                'category_id' => 18,
            ];
        }

        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                'name' => "Villain Blade ($i)",
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5.1 Undead ($i).jpg",
                'category_id' => 18,
            ];
        }

        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'name' => "Hibiki ($i)",
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6 HibikiRiders ($i).jpg",
                'category_id' => 19,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Hibiki ($i)",
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6.1 Makamou ($i).jpg",
                'category_id' => 19,
            ];
        }

        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'name' => "Kabuto ($i)",
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7 KabutoRiders ($i).jpg",
                'category_id' => 20,
            ];
        }

        for ($i = 1; $i <= 41; $i++) {
            $datas[] = [
                'name' => "Villain Kabuto ($i)",
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7.1 Worm ($i).jpg",
                'category_id' => 20,
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'name' => "Den-O ($i)",
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8 Den-ORiders ($i).jpg",
                'category_id' => 21,
            ];
        }

        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                'name' => "Villain Den-O ($i)",
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8.1 Imagin ($i).jpg",
                'category_id' => 21,
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'name' => "Kiva ($i)",
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9 KivaRiders ($i).jpg",
                'category_id' => 22,
            ];
        }

        for ($i = 1; $i <= 45; $i++) {
            $datas[] = [
                'name' => "Villain Kiva ($i)",
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9.1 Fangire ($i).jpg",
                'category_id' => 22,
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'name' => "Decade ($i)",
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10 DecadeRiders ($i).jpg",
                'category_id' => 23,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Decade ($i)",
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10.1 DecadeVillain ($i).jpg",
                'category_id' => 23,
            ];
        }

        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                'name' => "W ($i)",
                'img' => "Kamen Rider/Era Heisei/11. W/2.1 WRiders ($i).jpg",
                'category_id' => 24,
            ];
        }

        for ($i = 1; $i <= 51; $i++) {
            $datas[] = [
                'name' => "Villain W ($i)",
                'img' => "Kamen Rider/Era Heisei/11. W/2.1.1 Dopant ($i).jpg",
                'category_id' => 24,
            ];
        }

        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                'name' => "Ooo ($i)",
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2 OooRiders ($i).jpg",
                'category_id' => 25,
            ];
        }

        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                'name' => "Villain Ooo ($i)",
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2.1 Greed ($i).jpg",
                'category_id' => 25,
            ];
        }

        for ($i = 1; $i <= 63; $i++) {
            $datas[] = [
                'name' => "Fourze ($i)",
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3 FourzeRiders ($i).jpg",
                'category_id' => 26,
            ];
        }

        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                'name' => "Villain Fourze ($i)",
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3.1 Zodiarts ($i).jpg",
                'category_id' => 26,
            ];
        }

        for ($i = 1; $i <= 50; $i++) {
            $datas[] = [
                'name' => "Wizard ($i)",
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4 WizardRiders ($i).jpg",
                'category_id' => 27,
            ];
        }

        for ($i = 1; $i <= 39; $i++) {
            $datas[] = [
                'name' => "Villain Wizard ($i)",
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4.1 Phantom ($i).jpg",
                'category_id' => 27,
            ];
        }

        for ($i = 1; $i <= 84; $i++) {
            $datas[] = [
                'name' => "Gaim ($i)",
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5 GaimRiders ($i).jpg",
                'category_id' => 28,
            ];
        }

        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                'name' => "Villain Gaim ($i)",
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5.1 Overlord ($i).jpg",
                'category_id' => 28,
            ];
        }

        for ($i = 1; $i <= 76; $i++) {
            $datas[] = [
                'name' => "Drive ($i)",
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6 DriveRiders ($i).jpg",
                'category_id' => 29,
            ];
        }

        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                'name' => "Villain Drive ($i)",
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6.1 Roidmude ($i).jpg",
                'category_id' => 29,
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'name' => "Ghost ($i)",
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7 GhostRiders ($i).jpg",
                'category_id' => 30,
            ];
        }

        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                'name' => "Villain Ghost ($i)",
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7.1 Gamma ($i).jpg",
                'category_id' => 30,
            ];
        }

        for ($i = 1; $i <= 87; $i++) {
            $datas[] = [
                'name' => "Ex-Aid ($i)",
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8 Ex-AidRiders ($i).jpg",
                'category_id' => 31,
            ];
        }

        for ($i = 1; $i <= 42; $i++) {
            $datas[] = [
                'name' => "Villain Ex-Aid ($i)",
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8.1 Bugster ($i).jpg",
                'category_id' => 31,
            ];
        }

        for ($i = 1; $i <= 146; $i++) {
            $datas[] = [
                'name' => "Build ($i)",
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9 BuildRiders ($i).jpg",
                'category_id' => 32,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'name' => "Villain Build ($i)",
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9.1 Smash ($i).jpg",
                'category_id' => 32,
            ];
        }

        for ($i = 1; $i <= 58; $i++) {
            $datas[] = [
                'name' => "Zi-O ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10 Zi-ORiders ($i).jpg",
                'category_id' => 33,
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'name' => "Villain Zi-O ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10.1 AnotherRiders ($i).jpg",
                'category_id' => 33,
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                'name' => "Shinobi ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10.2 ShinobiRiders ($i).jpg",
                'category_id' => 33,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Goranger ($i)",
                'img' => "Super Sentai/Era Showa/1. Himitsu Sentai Goranger Five Rangers ($i).jpg",
                'category_id' => 39,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "JAKQ ($i)",
                'img' => "Super Sentai/Era Showa/2. J.A.K.Q. Dengekitai JAKQ ($i).jpg",
                'category_id' => 40,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Fever J ($i)",
                'img' => "Super Sentai/Era Showa/3. Battle Fever J ($i).jpg",
                'category_id' => 41,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Denjiman ($i)",
                'img' => "Super Sentai/Era Showa/4. Denshi Sentai Denjiman ($i).jpg",
                'category_id' => 42,
            ];
        }

        for ($i = 1; $i <= 3; $i++) {
            $datas[] = [
                'name' => "Sun Vulcan ($i)",
                'img' => "Super Sentai/Era Showa/5. Taiyo Sentai Sun Vulcan ($i).jpg",
                'category_id' => 43,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Goggle Five ($i)",
                'img' => "Super Sentai/Era Showa/6. Dai Sentai Goggle Five ($i).jpg",
                'category_id' => 44,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'name' => "Dynaman ($i)",
                'img' => "Super Sentai/Era Showa/7. Kagaku Sentai Dynaman ($i).jpg",
                'category_id' => 45,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'name' => "Bioman ($i)",
                'img' => "Super Sentai/Era Showa/8. Choudenshi Bioman ($i).jpg",
                'category_id' => 46,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Changeman ($i)",
                'img' => "Super Sentai/Era Showa/9. Dengeki Sentai Changeman ($i).jpg",
                'category_id' => 47,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Flashman ($i)",
                'img' => "Super Sentai/Era Showa/10. Choushinsei Flashman ($i).jpg",
                'category_id' => 48,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'name' => "Maskman ($i)",
                'img' => "Super Sentai/Era Showa/11. Hikari Sentai Maskman ($i).jpg",
                'category_id' => 49,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'name' => "Liveman ($i)",
                'img' => "Super Sentai/Era Showa/12. Choujuu Sentai Liveman ($i).jpg",
                'category_id' => 50,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'name' => "Turboranger ($i)",
                'img' => "Super Sentai/Era Heisei/13. Kousoku Sentai Turboranger ($i).jpg",
                'category_id' => 51,
            ];
        }

        for ($i = 1; $i <= 10; $i++) {
            $datas[] = [
                'name' => "Fiveman ($i)",
                'img' => "Super Sentai/Era Heisei/14. Chikyuu Sentai Fiveman ($i).jpg",
                'category_id' => 52,
            ];
        }

        for ($i = 1; $i <= 16; $i++) {
            $datas[] = [
                'name' => "Jetman ($i)",
                'img' => "Super Sentai/Era Heisei/15. Choujin Sentai Jetman ($i).jpg",
                'category_id' => 53,
            ];
        }
        
        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'name' => "Zyuranger - Mighty Morphin Power Rangers ($i)",
                'img' => "Super Sentai/Era Heisei/16. Kyouryuu Sentai Zyuranger (JPN) - Mighty Morphin Power Rangers (USA) ($i).jpg",
                'category_id' => 54,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'name' => "Dairanger - Mighty Morphin Power Rangers 2 ($i)",
                'img' => "Super Sentai/Era Heisei/17. Gosei Sentai Dairanger (JPN) - Mighty Morphin Power Rangers 2 (USA) - Star Ranger (INA) ($i).jpg",
                'category_id' => 55,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'name' => "Kakuranger - Mighty Morphin Power Alien Rangers 3 ($i)",
                'img' => "Super Sentai/Era Heisei/18. Ninja Sentai Kakuranger (JPN) - Mighty Morphin Power Alien Rangers 3 (USA) - Ninja Ranger (INA) ($i).jpg",
                'category_id' => 56,
            ];
        }

        Data::query()->insert($datas);
    }
}
