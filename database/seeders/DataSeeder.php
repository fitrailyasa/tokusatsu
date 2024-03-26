<?php

namespace Database\Seeders;

use App\Models\Data;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [];

        // Kamen Rider
        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider ($i)",
                'img' => "Kamen Rider/Era Showa/0.1 IchigoNigoRiders ($i).jpg",
                'category_id' => $this->Category('Kamen Rider'),
            ];
        }

        // Kamen Rider V3
        for ($i = 1; $i <= 9; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider V3 ($i)",
                'img' => "Kamen Rider/Era Showa/0.2 V3RidermanRiders ($i).jpg",
                'category_id' => $this->Category('V3'),
            ];
        }

        // Kamen Rider X
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider X",
                'img' => "Kamen Rider/Era Showa/0.3 XRider.jpg",
                'category_id' => $this->Category('X'),
            ];
        }

        // Kamen Rider Amazon
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Amazon ($i)",
                'img' => "Kamen Rider/Era Showa/0.4 AmazonRider ($i).jpg",
                'category_id' => $this->Category('Amazon'),
            ];
        }

        // Kamen Rider Stronger
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Stronger ($i)",
                'img' => "Kamen Rider/Era Showa/0.5 StrongerRider ($i).jpg",
                'category_id' => $this->Category('Stronger'),
            ];
        }

        // Kamen Rider SkyRider
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider SkyRider ($i)",
                'img' => "Kamen Rider/Era Showa/0.6 SkyRider ($i).jpg",
                'category_id' => $this->Category('Skyrider'),
            ];
        }

        // Kamen Rider Super-1
        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Super-1 ($i)",
                'img' => "Kamen Rider/Era Showa/0.7 Super1Rider ($i).jpg",
                'category_id' => $this->Category('Super-1'),
            ];
        }

        // Kamen Rider ZX
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider ZX",
                'img' => "Kamen Rider/Era Showa/0.7.Movie 10thKamenRider.jpg",
                'category_id' => $this->Category('ZX'),
            ];
        }

        // Kamen Rider Black
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Black ($i)",
                'img' => "Kamen Rider/Era Showa/0.8 BlackRiders ($i).jpg",
                'category_id' => $this->Category('Black'),
            ];
        }

        // Kamen Rider Black RX
        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Black RX ($i)",
                'img' => "Kamen Rider/Era Showa/0.9 BlackRXRiders ($i).jpg",
                'category_id' => $this->Category('Black RX'),
            ];
        }

        // Kamen Rider Shin
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Shin",
                'img' => "Kamen Rider/Era Showa/0.13 ShinRider.jpg",
                'category_id' => $this->Category('Shin'),
            ];
        }

        // Kamen Rider ZO
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider ZO",
                'img' => "Kamen Rider/Era Showa/0.14 ZORider.jpg",
                'category_id' => $this->Category('ZO'),
            ];
        }

        // Kamen Rider J
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider J",
                'img' => "Kamen Rider/Era Showa/0.15 JRider.jpg",
                'category_id' => $this->Category('J'),
            ];
        }

        // Kamen Rider Kuuga
        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Kuuga ($i)",
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1 kuugaRider ($i).jpg",
                'category_id' => $this->Category('Kuuga'),
            ];
        }

        // Kamen Rider Kuuga
        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Kuuga ($i)",
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1.1 Grongi ($i).jpg",
                'category_id' => $this->Category('Kuuga'),
            ];
        }

        // Kamen Rider Agito
        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Agito ($i)",
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2 AgitoRiders ($i).jpg",
                'category_id' => $this->Category('Agito'),
            ];
        }

        // Villain Kamen Rider Agito
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Agito ($i)",
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2.1 Unknown ($i).jpg",
                'category_id' => $this->Category('Agito'),
            ];
        }

        // Kamen Rider Ryuki
        for ($i = 1; $i <= 21; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Ryuki ($i)",
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3 RyukiRiders ($i).jpg",
                'category_id' => $this->Category('Ryuki'),
            ];
        }

        // Villain Kamen Rider Ryuki
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Ryuki ($i)",
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3.1 MirrorMonster ($i).jpg",
                'category_id' => $this->Category('Ryuki'),
            ];
        }

        // Kamen Rider Faiz (555)
        for ($i = 1; $i <= 19; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Faiz (555) ($i)",
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4 FaizRiders ($i).jpg",
                'category_id' => $this->Category('555'),
            ];
        }

        // Villain Kamen Rider Faiz (555)
        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Faiz (555) ($i)",
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4.1 Orphnoch ($i).jpg",
                'category_id' => $this->Category('555'),
            ];
        }

        // Kamen Rider Blade
        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Blade ($i)",
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5 BladeRiders ($i).jpg",
                'category_id' => $this->Category('Blade'),
            ];
        }

        // Villain Kamen Rider Blade
        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Blade ($i)",
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5.1 Undead ($i).jpg",
                'category_id' => $this->Category('Blade'),
            ];
        }

        // Kamen Rider Hibiki
        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Hibiki ($i)",
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6 HibikiRiders ($i).jpg",
                'category_id' => $this->Category('Hibiki'),
            ];
        }

        // Villain Kamen Rider Hibiki
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Hibiki ($i)",
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6.1 Makamou ($i).jpg",
                'category_id' => $this->Category('Hibiki'),
            ];
        }

        // Kamen Rider Kabuto
        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Kabuto ($i)",
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7 KabutoRiders ($i).jpg",
                'category_id' => $this->Category('Kabuto'),
            ];
        }

        // Villain Kamen Rider Kabuto
        for ($i = 1; $i <= 41; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Kabuto ($i)",
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7.1 Worm ($i).jpg",
                'category_id' => $this->Category('Kabuto'),
            ];
        }

        // Kamen Rider Den-O
        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Den-O ($i)",
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8 Den-ORiders ($i).jpg",
                'category_id' => $this->Category('Den-O'),
            ];
        }

        // Villain Kamen Rider Den-O
        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Den-O ($i)",
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8.1 Imagin ($i).jpg",
                'category_id' => $this->Category('Den-O'),
            ];
        }

        // Kamen Rider Kiva
        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Kiva ($i)",
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9 KivaRiders ($i).jpg",
                'category_id' => $this->Category('Kiva'),
            ];
        }

        // Villain Kamen Rider Kiva
        for ($i = 1; $i <= 45; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Kiva ($i)",
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9.1 Fangire ($i).jpg",
                'category_id' => $this->Category('Kiva'),
            ];
        }

        // Kamen Rider Decade
        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Decade ($i)",
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10 DecadeRiders ($i).jpg",
                'category_id' => $this->Category('Decade'),
            ];
        }

        // Villain Kamen Rider Decade
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Decade ($i)",
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10.1 DecadeVillain ($i).jpg",
                'category_id' => $this->Category('Decade'),
            ];
        }

        // Kamen Rider W
        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider W ($i)",
                'img' => "Kamen Rider/Era Heisei/11. W/2.1 WRiders ($i).jpg",
                'category_id' => $this->Category('W'),
            ];
        }

        // Villain Kamen Rider W
        for ($i = 1; $i <= 51; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider W ($i)",
                'img' => "Kamen Rider/Era Heisei/11. W/2.1.1 Dopant ($i).jpg",
                'category_id' => $this->Category('W'),
            ];
        }

        // Kamen Rider Ooo
        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Ooo ($i)",
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2 OooRiders ($i).jpg",
                'category_id' => $this->Category('OOO'),
            ];
        }

        // Villain Kamen Rider Ooo
        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Ooo ($i)",
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2.1 Greed ($i).jpg",
                'category_id' => $this->Category('OOO'),
            ];
        }

        // Kamen Rider Fourze
        for ($i = 1; $i <= 63; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Fourze ($i)",
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3 FourzeRiders ($i).jpg",
                'category_id' => $this->Category('Fourze'),
            ];
        }

        // Villain Kamen Rider Fourze
        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Fourze ($i)",
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3.1 Zodiarts ($i).jpg",
                'category_id' => $this->Category('Fourze'),
            ];
        }

        // Kamen Rider Wizard
        for ($i = 1; $i <= 50; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Wizard ($i)",
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4 WizardRiders ($i).jpg",
                'category_id' => $this->Category('Wizard'),
            ];
        }

        // Villain Kamen Rider Wizard
        for ($i = 1; $i <= 39; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Wizard ($i)",
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4.1 Phantom ($i).jpg",
                'category_id' => $this->Category('Wizard'),
            ];
        }

        // Kamen Rider Gaim
        for ($i = 1; $i <= 84; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Gaim ($i)",
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5 GaimRiders ($i).jpg",
                'category_id' => $this->Category('Gaim'),
            ];
        }

        // Villain Kamen Rider Gaim
        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Gaim ($i)",
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5.1 Overlord ($i).jpg",
                'category_id' => $this->Category('Gaim'),
            ];
        }

        // Kamen Rider Drive
        for ($i = 1; $i <= 76; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Drive ($i)",
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6 DriveRiders ($i).jpg",
                'category_id' => $this->Category('Drive'),
            ];
        }

        // Villain Kamen Rider Drive
        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Drive ($i)",
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6.1 Roidmude ($i).jpg",
                'category_id' => $this->Category('Drive'),
            ];
        }

        // Kamen Rider Ghost
        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Ghost ($i)",
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7 GhostRiders ($i).jpg",
                'category_id' => $this->Category('Ghost'),
            ];
        }

        // Villain Kamen Rider Ghost
        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Ghost ($i)",
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7.1 Gamma ($i).jpg",
                'category_id' => $this->Category('Ghost'),
            ];
        }

        // Kamen Rider Ex-Aid
        for ($i = 1; $i <= 87; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Ex-Aid ($i)",
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8 Ex-AidRiders ($i).jpg",
                'category_id' => $this->Category('Ex-Aid'),
            ];
        }

        // Villain Kamen Rider Ex-Aid
        for ($i = 1; $i <= 42; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Ex-Aid ($i)",
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8.1 Bugster ($i).jpg",
                'category_id' => $this->Category('Ex-Aid'),
            ];
        }

        // Kamen Rider Build
        for ($i = 1; $i <= 146; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Build ($i)",
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9 BuildRiders ($i).jpg",
                'category_id' => $this->Category('Build'),
            ];
        }

        // Villain Kamen Rider Build
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Build ($i)",
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9.1 Smash ($i).jpg",
                'category_id' => $this->Category('Build'),
            ];
        }

        // Kamen Rider Zi-O
        for ($i = 1; $i <= 58; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Zi-O ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10 Zi-ORiders ($i).jpg",
                'category_id' => $this->Category('Zi-O'),
            ];
        }

        // Villain Kamen Rider Zi-O
        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Villain Kamen Rider Zi-O ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10.1 AnotherRiders ($i).jpg",
                'category_id' => $this->Category('Zi-O'),
            ];
        }

        // Kamen Rider Shinobi
        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Shinobi ($i)",
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10.2 ShinobiRiders ($i).jpg",
                'category_id' => $this->Category('Zi-O'),
            ];
        }

        // Kamen Rider Zero-One
        for ($i = 1; $i <= 113; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Zero-One ($i)",
                'img' => "Kamen Rider/Era Reiwa/1. Zero-One/Zero-One ($i).jpg",
                'category_id' => $this->Category('Zero-One'),
            ];
        }

        // Humagear
        for ($i = 1; $i <= 59; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Humagear ($i)",
                'img' => "Kamen Rider/Era Reiwa/1. Zero-One/Humagear ($i).jpg",
                'category_id' => $this->Category('Zero-One'),
            ];
        }

        // Kamen Rider Saber
        for ($i = 1; $i <= 125; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Saber ($i)",
                'img' => "Kamen Rider/Era Reiwa/2. Saber/Saber ($i).jpg",
                'category_id' => $this->Category('Saber'),
            ];
        }

        // Megid
        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Megid ($i)",
                'img' => "Kamen Rider/Era Reiwa/2. Saber/Megid ($i).jpg",
                'category_id' => $this->Category('Saber'),
            ];
        }

        // Kamen Rider Revice
        for ($i = 1; $i <= 137; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Revice ($i)",
                'img' => "Kamen Rider/Era Reiwa/3. Revice/Revice ($i).jpg",
                'category_id' => $this->Category('Revice'),
            ];
        }

        // Deadman
        for ($i = 1; $i <= 58; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Deadman ($i)",
                'img' => "Kamen Rider/Era Reiwa/3. Revice/Deadman ($i).jpg",
                'category_id' => $this->Category('Revice'),
            ];
        }

        // Geats
        for ($i = 1; $i <= 273; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Geats ($i)",
                'img' => "Kamen Rider/Era Reiwa/4. Geats/Geats ($i).jpg",
                'category_id' => $this->Category('Geats'),
            ];
        }

        // Gotchard
        for ($i = 1; $i <= 3; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kamen Rider Gotchard ($i)",
                'img' => "Kamen Rider/Era Reiwa/5. Gotchard/Gotchard ($i).jpg",
                'category_id' => $this->Category('Gotchard'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Goranger ($i)",
                'img' => "Super Sentai/Era Showa/1. Himitsu Sentai Goranger Five Rangers ($i).jpg",
                'category_id' => $this->Category('Himitsu Sentai Gorenger (1975-1977)'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "JAKQ ($i)",
                'img' => "Super Sentai/Era Showa/2. J.A.K.Q. Dengekitai JAKQ ($i).jpg",
                'category_id' => $this->Category('J.A.K.Q. Dengekitai (1977)'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Fever J ($i)",
                'img' => "Super Sentai/Era Showa/3. Battle Fever J ($i).jpg",
                'category_id' => $this->Category('Battle Fever J (1979-1980)'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Denjiman ($i)",
                'img' => "Super Sentai/Era Showa/4. Denshi Sentai Denjiman ($i).jpg",
                'category_id' => $this->Category('Denshi Sentai Denziman (1980-1981)'),
            ];
        }

        for ($i = 1; $i <= 3; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Sun Vulcan ($i)",
                'img' => "Super Sentai/Era Showa/5. Taiyo Sentai Sun Vulcan ($i).jpg",
                'category_id' => $this->Category('Taiyou Sentai Sun Vulcan (1981-1982)'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Goggle Five ($i)",
                'img' => "Super Sentai/Era Showa/6. Dai Sentai Goggle Five ($i).jpg",
                'category_id' => $this->Category('Dai Sentai Goggle V (1982-1983)'),
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Dynaman ($i)",
                'img' => "Super Sentai/Era Showa/7. Kagaku Sentai Dynaman ($i).jpg",
                'category_id' => $this->Category('Kagaku Sentai Dynaman (1983-1984)'),
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Bioman ($i)",
                'img' => "Super Sentai/Era Showa/8. Choudenshi Bioman ($i).jpg",
                'category_id' => $this->Category('Choudenshi Bioman (1984-1985)'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Changeman ($i)",
                'img' => "Super Sentai/Era Showa/9. Dengeki Sentai Changeman ($i).jpg",
                'category_id' => $this->Category('Dengeki Sentai Changeman (1985-1986)'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Flashman ($i)",
                'img' => "Super Sentai/Era Showa/10. Choushinsei Flashman ($i).jpg",
                'category_id' => $this->Category('Choushinsei Flashman (1986-1987)'),
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Maskman ($i)",
                'img' => "Super Sentai/Era Showa/11. Hikari Sentai Maskman ($i).jpg",
                'category_id' => $this->Category('Hikari Sentai Maskman (1987-1988)'),
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Liveman ($i)",
                'img' => "Super Sentai/Era Showa/12. Choujuu Sentai Liveman ($i).jpg",
                'category_id' => $this->Category('Choujuu Sentai Liveman (1988-1989)'),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Turboranger ($i)",
                'img' => "Super Sentai/Era Heisei/13. Kousoku Sentai Turboranger ($i).jpg",
                'category_id' => $this->Category('Kousoku Sentai Turboranger (1989-1990)'),
            ];
        }

        for ($i = 1; $i <= 10; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Fiveman ($i)",
                'img' => "Super Sentai/Era Heisei/14. Chikyuu Sentai Fiveman ($i).jpg",
                'category_id' => $this->Category('Chikyuu Sentai Fiveman (1990-1991)'),
            ];
        }

        for ($i = 1; $i <= 16; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Jetman ($i)",
                'img' => "Super Sentai/Era Heisei/15. Choujin Sentai Jetman ($i).jpg",
                'category_id' => $this->Category('Choujin Sentai Jetman (1991-1992)'),
            ];
        }
        
        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Zyuranger - Mighty Morphin Power Rangers ($i)",
                'img' => "Super Sentai/Era Heisei/16. Kyouryuu Sentai Zyuranger (JPN) - Mighty Morphin Power Rangers (USA) ($i).jpg",
                'category_id' => $this->Category('Kyouryuu Sentai Zyuranger (1992-1993)'),
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Dairanger - Mighty Morphin Power Rangers 2 ($i)",
                'img' => "Super Sentai/Era Heisei/17. Gosei Sentai Dairanger (JPN) - Mighty Morphin Power Rangers 2 (USA) - Star Ranger (INA) ($i).jpg",
                'category_id' => $this->Category('Gosei Sentai Dairanger (1993-1994)'),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kakuranger - Mighty Morphin Power Alien Rangers 3 ($i)",
                'img' => "Super Sentai/Era Heisei/18. Ninja Sentai Kakuranger (JPN) - Mighty Morphin Power Alien Rangers 3 (USA) - Ninja Ranger (INA) ($i).jpg",
                'category_id' => $this->Category('Ninja Sentai Kakuranger (1994-1995)'),
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Choriki Sentai Ohranger (JPN) - Power Rangers Zeo (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/19. Choriki Sentai Ohranger (JPN) - Power Rangers Zeo (USA) - Oh Ranger (INA) ($i).jpg",
                'category_id' => $this->Category('Chouriki Sentai Ohranger (1995-1996)'),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Gekisou Sentai Carranger (JPN) - Power Rangers Turbo (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/20. Gekisou Sentai Carranger (JPN) - Power Rangers Turbo (USA) ($i).jpg",
                'category_id' => $this->Category('Gekisou Sentai Carranger (1996-1997)'),
            ];
        }

        for ($i = 1; $i <= 18; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Denji Sentai Megaranger (JPN) - Power Rangers In Space (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/21. Denji Sentai Megaranger (JPN) - Power Rangers In Space (USA) ($i).jpg",
                'category_id' => $this->Category('Denji Sentai Megaranger (1997-1998)'),
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Seijuu Sentai Gingaman (JPN) - Power Rangers Lost Galaxy (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/22. Seijuu Sentai Gingaman (JPN) - Power Rangers Lost Galaxy (USA) ($i).jpg",
                'category_id' => $this->Category('Seijuu Sentai Gingaman (1998-1999)'),
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "KyuKyu Sentai GoGo V (JPN) - Power Rangers Lightspeed Rescue(USA) ($i)",
                'img' => "Super Sentai/Era Heisei/23. KyuKyu Sentai GoGo V (JPN) - Power Rangers Lightspeed Rescue(USA) ($i).jpg",
                'category_id' => $this->Category('Kyuukyuu Sentai Go Go V (1999-2000)'),
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Mirai Sentai Timeranger (JPN) - Power Rangers Time Force (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/24. Mirai Sentai Timeranger (JPN) - Power Rangers Time Force (USA) ($i).jpg",
                'category_id' => $this->Category('Mirai Sentai Timeranger (2000-2001)'),
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Hyaku Juu Sentai Gaoranger (JPN) - Power Rangers Wild Force (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/25. Hyaku Juu Sentai Gaoranger (JPN) - Power Rangers Wild Force (USA) ($i).jpg",
                'category_id' => $this->Category('Hyakujuu Sentai Gaoranger (2001-2002)'),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ninpuu Sentai Hurricanger (JPN) - Power Rangers Ninja Storm (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/26. Ninpuu Sentai Hurricanger (JPN) - Power Rangers Ninja Storm (USA) ($i).jpg",
                'category_id' => $this->Category('Ninpuu Sentai Hurricaneger (2002-2003)'),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "BakuRyuu Sentai Abaranger (JPN) - Power Rangers Dino Thunder (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/27. BakuRyuu Sentai Abaranger (JPN) - Power Rangers Dino Thunder (USA) ($i).jpg",
                'category_id' => $this->Category('Bakuryuu Sentai Abaranger (2003-2004)'),
            ];
        }

        for ($i = 1; $i <= 17; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Tokusou Sentai Dekaranger (JPN) - Power Rangers S.P.D (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/28. Tokusou Sentai Dekaranger (JPN) - Power Rangers S.P.D (USA) ($i).jpg",
                'category_id' => $this->Category('Tokusou Sentai Dekaranger (2004-2005)'),
            ];
        }

        for ($i = 1; $i <= 14; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Mahou Sentai Magiranger (JPN) - Power Rangers Mystic Force (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/29. Mahou Sentai Magiranger (JPN) - Power Rangers Mystic Force (USA) ($i).jpg",
                'category_id' => $this->Category('Mahou Sentai Magiranger (2005-2006)'),
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Gougou Sentai Boukenger (JPN) - Power Rangers Operation Overdrive (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/30. Gougou Sentai Boukenger (JPN) - Power Rangers Operation Overdrive (USA) ($i).jpg",
                'category_id' => $this->Category('Gougou Sentai Boukenger (2006-2007)'),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Juken Sentai Gekiranger (JPN) - Power Rangers Jungle Fury (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/31. Juken Sentai Gekiranger (JPN) - Power Rangers Jungle Fury (USA) ($i).jpg",
                'category_id' => $this->Category('Juuken Sentai Gekiranger (2007-2008)'),
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Engine Sentai Go-Onger (JPN) - Power Rangers RPM (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/32. Engine Sentai Go-Onger (JPN) - Power Rangers RPM (USA) ($i).jpg",
                'category_id' => $this->Category('Engine Sentai Go-onger (2008-2009)'),
            ];
        }

        for ($i = 1; $i <= 24; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Samurai Sentai Shinkenger (JPN) - Power Rangers Samurai (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/33. Samurai Sentai Shinkenger (JPN) - Power Rangers Samurai (USA) ($i).jpg",
                'category_id' => $this->Category('Samurai Sentai Shinkenger (2009-2010)'),
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Tensou Sentai Goseiger (JPN) - Power Rangers Megaforce (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/34. Tensou Sentai Goseiger (JPN) - Power Rangers Megaforce (USA) ($i).jpg",
                'category_id' => $this->Category('Tensou Sentai Goseiger (2010-2011)'),
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kaizoku Sentai Gokaiger (JPN) - Power Rangers Super Megaforce (USA) ($i)",
                'img' => "Super Sentai/Era Heisei/35. Kaizoku Sentai Gokaiger (JPN) - Power Rangers Super Megaforce (USA) ($i).jpg",
                'category_id' => $this->Category('Kaizoku Sentai Gokaiger (2011-2012)'),
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Tokumei Sentai Go-Busters  ($i)",
                'img' => "Super Sentai/Era Heisei/36. Tokumei Sentai Go-Busters  ($i).jpg",
                'category_id' => $this->Category('Tokumei Sentai Go-Busters (2012-2013)'),
            ];
        }

        for ($i = 1; $i <= 29; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Zyuden Sentai Kyoryuger ($i)",
                'img' => "Super Sentai/Era Heisei/37. Zyuden Sentai Kyoryuger ($i).jpg",
                'category_id' => $this->Category('Zyuden Sentai Kyoryuger (2013-2014)'),
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ressha Sentai Tokkyuger ($i)",
                'img' => "Super Sentai/Era Heisei/38. Ressha Sentai Tokkyuger ($i).jpg",
                'category_id' => $this->Category('Ressha Sentai ToQger (2014-2015)'),
            ];
        }

        for ($i = 1; $i <= 20; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Shuriken Sentai Ninninger ($i)",
                'img' => "Super Sentai/Era Heisei/39. Shuriken Sentai Ninninger ($i).jpg",
                'category_id' => $this->Category('Shuriken Sentai Ninninger (2015-2016)'),
            ];
        }

        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Doubutsu Sentai Zyouhger ($i)",
                'img' => "Super Sentai/Era Heisei/40. Doubutsu Sentai Zyouhger ($i).jpg",
                'category_id' => $this->Category('Doubutsu Sentai Zyuohger (2016-2017)'),
            ];
        }

        for ($i = 1; $i <= 27; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Uchuu Sentai Kyuuranger ($i)",
                'img' => "Super Sentai/Era Heisei/41. Uchuu Sentai Kyuuranger ($i).jpg",
                'category_id' => $this->Category('Uchuu Sentai Kyuuranger (2017-2018)'),
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kaitou Sentai Lupinranger _ Keisatsu Sentai Patranger (Lupat Rangers) ($i)",
                'img' => "Super Sentai/Era Heisei/42. Kaitou Sentai Lupinranger _ Keisatsu Sentai Patranger (Lupat Rangers) ($i).jpg",
                'category_id' => $this->Category('Kaitou Sentai Lupinranger VS Keisatsu Sentai Patranger (2018-2019)'),
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kishiryu Sentai Ryusoulger ($i)",
                'img' => "Super Sentai/Era Heisei/43. Kishiryu Sentai Ryusoulger ($i).jpg",
                'category_id' => $this->Category('Kishiryu Sentai Ryusoulger (2019-2020)'),
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman ($i)",
                'img' => "Ultraman/Era Showa/1. Ultraman/Ultraman ($i).jpg",
                'category_id' => $this->Category('Ultraman'),
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultra Seven ($i)",
                'img' => "Ultraman/Era Showa/2. Ultra Seven/Ultra Seven ($i).jpg",
                'category_id' => $this->Category('Ultra Seven'),
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Jack ($i)",
                'img' => "Ultraman/Era Showa/3. Ultraman Jack/Ultraman Jack ($i).jpg",
                'category_id' => $this->Category('Ultraman Jack'),
            ];
        }

        for ($i = 1; $i <= 9; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Ace ($i)",
                'img' => "Ultraman/Era Showa/4. Ultraman Ace/Ultraman Ace ($i).jpg",
                'category_id' => $this->Category('Ultraman Ace'),
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Taro ($i)",
                'img' => "Ultraman/Era Showa/5. Ultraman Taro/Ultraman Taro ($i).jpg",
                'category_id' => $this->Category('Ultraman Taro'),
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Leo ($i)",
                'img' => "Ultraman/Era Showa/6. Ultraman Leo/Ultraman Leo ($i).jpg",
                'category_id' => $this->Category('Ultraman Leo'),
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman 80 ($i)",
                'img' => "Ultraman/Era Showa/7. Ultraman 80/Ultraman 80 ($i).jpg",
                'category_id' => $this->Category('Ultraman 80'),
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Zoffy ($i)",
                'img' => "Ultraman/Era Showa/8. Ultraman Zoffy/Ultraman Zoffy ($i).jpg",
                'category_id' => $this->Category('Ultraman Zoffy'),
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Tiga ($i)",
                'img' => "Ultraman/Era Heisei/1. Ultraman Tiga/Ultraman Tiga ($i).jpg",
                'category_id' => $this->Category('Ultraman Tiga'),
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Dyna ($i)",
                'img' => "Ultraman/Era Heisei/2. Ultraman Dyna/Ultraman Dyna ($i).jpg",
                'category_id' => $this->Category('Ultraman Dyna'),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Gaia ($i)",
                'img' => "Ultraman/Era Heisei/3. Ultraman Gaia/Ultraman Gaia ($i).jpg",
                'category_id' => $this->Category('Ultraman Gaia'),
            ];
        }

        for ($i = 1; $i <= 14; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Cosmos ($i)",
                'img' => "Ultraman/Era Heisei/4. Ultraman Cosmos/Ultraman Cosmos ($i).jpg",
                'category_id' => $this->Category('Ultraman Cosmos'),
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Nexus ($i)",
                'img' => "Ultraman/Era Heisei/5. Ultraman Nexus/Ultraman Nexus ($i).jpg",
                'category_id' => $this->Category('Ultraman Nexus'),
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Max ($i)",
                'img' => "Ultraman/Era Heisei/6. Ultraman Max/Ultraman Max ($i).jpg",
                'category_id' => $this->Category('Ultraman Max'),
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Zero ($i)",
                'img' => "Ultraman/Era Heisei/7. Ultraman Zero/Ultraman Zero ($i).jpg",
                'category_id' => $this->Category('Ultraman Zero'),
            ];
        }

        for ($i = 1; $i <= 25; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Ginga ($i)",
                'img' => "Ultraman/Era Heisei/8. Ultraman Ginga/Ultraman Ginga ($i).jpg",
                'category_id' => $this->Category('Ultraman Ginga'),
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Ginga S ($i)",
                'img' => "Ultraman/Era Heisei/9. Ultraman Ginga S/Ultraman Ginga S ($i).jpg",
                'category_id' => $this->Category('Ultraman Ginga S'),
            ];
        }

        for ($i = 1; $i <= 29; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman X ($i)",
                'img' => "Ultraman/Era Heisei/10. Ultraman X/Ultraman X ($i).jpg",
                'category_id' => $this->Category('Ultraman X'),
            ];
        }

        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Orb ($i)",
                'img' => "Ultraman/Era Heisei/11. Ultraman Orb/Ultraman Orb ($i).jpg",
                'category_id' => $this->Category('Ultraman Orb'),
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Geed ($i)",
                'img' => "Ultraman/Era Heisei/12. Ultraman Geed/Ultraman Geed ($i).jpg",
                'category_id' => $this->Category('Ultraman Geed'),
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman RB ($i)",
                'img' => "Ultraman/Era Heisei/13. Ultraman RB/Ultraman RB ($i).jpg",
                'category_id' => $this->Category('Ultraman R/B'),
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Mashin Sentai Kiramager ($i)",
                'img' => "Super Sentai/Era Reiwa/1. Mashin Sentai Kiramager/Mashin Sentai Kiramager ($i).jpg",
                'category_id' => $this->Category('Mashin Sentai Kiramager (2020-2021)'),
            ];
        }

        for ($i = 1; $i <= 62; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Kikai Sentai Zenkaiger ($i)",
                'img' => "Super Sentai/Era Reiwa/2. Kikai Sentai Zenkaiger/Kikai Sentai Zenkaiger ($i).jpg",
                'category_id' => $this->Category('Kikai Sentai Zenkaiger (2021-2022)'),
            ];
        }

        for ($i = 1; $i <= 79; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Avataro Sentai Donbrothers ($i)",
                'img' => "Super Sentai/Era Reiwa/3. Avataro Sentai Donbrothers/Avataro Sentai Donbrothers ($i).jpg",
                'category_id' => $this->Category('Avataro Sentai Donbrothers (2022-2023)'),
            ];
        }

        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ohsama Sentai King-Ohger ($i)",
                'img' => "Super Sentai/Era Reiwa/4. Ohsama Sentai King-Ohger/Ohsama Sentai King-Ohger ($i).jpg",
                'category_id' => $this->Category('Ohsama Sentai King-Ohger (2023-2024)'),
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Bakuage Sentai Boonboomger ($i)",
                'img' => "logo.png",
                'category_id' => $this->Category('Bakuage Sentai Boonboomger (2024-2025)'),
            ];
        }

        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Taiga ($i)",
                'img' => "Ultraman/Era Reiwa/1. Ultraman Taiga/Ultraman Taiga ($i).jpg",
                'category_id' => $this->Category('Ultraman Taiga'),
            ];
        }

        for ($i = 1; $i <= 37; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Z ($i)",
                'img' => "Ultraman/Era Reiwa/2. Ultraman Z/Ultraman Z ($i).jpg",
                'category_id' => $this->Category('Ultraman Z'),
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Trigger ($i)",
                'img' => "Ultraman/Era Reiwa/3. Ultraman Trigger/Ultraman Trigger ($i).jpg",
                'category_id' => $this->Category('Ultraman Trigger'),
            ];
        }

        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Decker ($i)",
                'img' => "Ultraman/Era Reiwa/4. Ultraman Decker/Ultraman Decker ($i).jpg",
                'category_id' => $this->Category('Ultraman Decker'),
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                'id' => Str::uuid(),
                'name' => "Ultraman Blazar ($i)",
                'img' => "logo.png",
                'category_id' => $this->Category('Ultraman Blazar'),
            ];
        }

        Data::query()->insert($datas);
    }

    private function Category(string $name): string
    {
        $category = Category::where('name', $name)->first();
        if (!$category) {
            $category = Category::create([
                'id' => Str::uuid(),
                'name' => $name,
            ]);
        }
        return $category->id;
    }

}
