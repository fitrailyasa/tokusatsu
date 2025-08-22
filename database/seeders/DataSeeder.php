<?php

namespace Database\Seeders;

use App\Models\Data;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DataSeeder extends Seeder
{
    public function run(): void
    {
        // $uuid = Str::uuid();
        $now = Carbon::now();

        $datas = [];

        // kamen rider
        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider ($i)",
                'img' => "kamen-rider/showa/0.1-ichigo-nigo-riders-$i.jpg",
                'category_id' => $this->Category('kamen-rider'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider v3
        for ($i = 1; $i <= 9; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider V3 ($i)",
                'img' => "kamen-rider/showa/0.2-v3-riderman-riders-$i.jpg",
                'category_id' => $this->Category('v3'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider x
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider X",
                'img' => "kamen-rider/showa/0.3-x-rider.jpg",
                'category_id' => $this->Category('rider-x'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider amazon
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Amazon ($i)",
                'img' => "kamen-rider/showa/0.4-amazon-rider-$i.jpg",
                'category_id' => $this->Category('amazon'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider stronger
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Stronger ($i)",
                'img' => "kamen-rider/showa/0.5-stronger-rider-$i.jpg",
                'category_id' => $this->Category('stronger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider skyrider
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider SkyRider ($i)",
                'img' => "kamen-rider/showa/0.6-sky-rider-$i.jpg",
                'category_id' => $this->Category('skyrider'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider super-1
        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Super-1 ($i)",
                'img' => "kamen-rider/showa/0.7-super1-rider-$i.jpg",
                'category_id' => $this->Category('super-1'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider zx
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider ZX",
                'img' => "kamen-rider/showa/0.7-movie-10th-kamen-rider.jpg",
                'category_id' => $this->Category('zx'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider black
        for ($i = 1; $i <= 2; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Black ($i)",
                'img' => "kamen-rider/showa/0.8-black-riders-$i.jpg",
                'category_id' => $this->Category('black'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider black rx
        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Black RX ($i)",
                'img' => "kamen-rider/showa/0.9-black-rx-riders-$i.jpg",
                'category_id' => $this->Category('black-rx'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider shin
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Shin",
                'img' => "kamen-rider/showa/0.13-shin-rider.jpg",
                'category_id' => $this->Category('shin'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider zo
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider ZO",
                'img' => "kamen-rider/showa/0.14-zo-rider.jpg",
                'category_id' => $this->Category('zo'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider j
        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider J",
                'img' => "kamen-rider/showa/0.15-j-rider.jpg",
                'category_id' => $this->Category('j'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider kuuga
        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Kuuga ($i)",
                'img' => "kamen-rider/heisei/1.kuuga/1.1-kuuga-rider-$i.jpg",
                'category_id' => $this->Category('kuuga'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider kuuga
        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Kuuga ($i)",
                'img' => "kamen-rider/heisei/1.kuuga/1.1.1-grongi-$i.jpg",
                'category_id' => $this->Category('kuuga'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider agito
        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Agito ($i)",
                'img' => "kamen-rider/heisei/2.agito/1.2-agito-riders-$i.jpg",
                'category_id' => $this->Category('agito'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider agito
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Agito ($i)",
                'img' => "kamen-rider/heisei/2.agito/1.2.1-unknown-$i.jpg",
                'category_id' => $this->Category('agito'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider ryuki
        for ($i = 1; $i <= 21; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Ryuki ($i)",
                'img' => "kamen-rider/heisei/3.ryuki/1.3-ryuki-riders-$i.jpg",
                'category_id' => $this->Category('ryuki'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider ryuki
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Ryuki ($i)",
                'img' => "kamen-rider/heisei/3.ryuki/1.3.1-mirror-monster-$i.jpg",
                'category_id' => $this->Category('ryuki'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider faiz (555)
        for ($i = 1; $i <= 19; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Faiz (555) ($i)",
                'img' => "kamen-rider/heisei/4.faiz/1.4-faiz-riders-$i.jpg",
                'category_id' => $this->Category('555'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider faiz (555)
        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Faiz (555) ($i)",
                'img' => "kamen-rider/heisei/4.faiz/1.4.1-orphnoch-$i.jpg",
                'category_id' => $this->Category('555'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider blade
        for ($i = 1; $i <= 23; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Blade ($i)",
                'img' => "kamen-rider/heisei/5.blade/1.5-blade-riders-$i.jpg",
                'category_id' => $this->Category('blade'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider blade
        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Blade ($i)",
                'img' => "kamen-rider/heisei/5.blade/1.5.1-undead-$i.jpg",
                'category_id' => $this->Category('blade'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider hibiki
        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Hibiki ($i)",
                'img' => "kamen-rider/heisei/6.hibiki/1.6-hibiki-riders-$i.jpg",
                'category_id' => $this->Category('hibiki'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider hibiki
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Hibiki ($i)",
                'img' => "kamen-rider/heisei/6.hibiki/1.6.1-makamou-$i.jpg",
                'category_id' => $this->Category('hibiki'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider kabuto
        for ($i = 1; $i <= 28; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Kabuto ($i)",
                'img' => "kamen-rider/heisei/7.kabuto/1.7-kabuto-riders-$i.jpg",
                'category_id' => $this->Category('kabuto'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider kabuto
        for ($i = 1; $i <= 41; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Kabuto ($i)",
                'img' => "kamen-rider/heisei/7.kabuto/1.7.1-worm-$i.jpg",
                'category_id' => $this->Category('kabuto'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider den-o
        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Den-O ($i)",
                'img' => "kamen-rider/heisei/8.den-o/1.8-den-o-riders-$i.jpg",
                'category_id' => $this->Category('den-o'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider den-o
        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Den-O ($i)",
                'img' => "kamen-rider/heisei/8.den-o/1.8.1-imagin-$i.jpg",
                'category_id' => $this->Category('den-o'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider kiva
        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Kiva ($i)",
                'img' => "kamen-rider/heisei/9.kiva/1.9-kiva-riders-$i.jpg",
                'category_id' => $this->Category('kiva'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider kiva
        for ($i = 1; $i <= 45; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Kiva ($i)",
                'img' => "kamen-rider/heisei/9.kiva/1.9.1-fangire-$i.jpg",
                'category_id' => $this->Category('kiva'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider decade
        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Decade ($i)",
                'img' => "kamen-rider/heisei/10.decade/1.10-decade-riders-$i.jpg",
                'category_id' => $this->Category('decade'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider decade
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Decade ($i)",
                'img' => "kamen-rider/heisei/10.decade/1.10.1-decade-villain-$i.jpg",
                'category_id' => $this->Category('decade'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider w
        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider W ($i)",
                'img' => "kamen-rider/heisei/11.w/2.1-w-riders-$i.jpg",
                'category_id' => $this->Category('w'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider w
        for ($i = 1; $i <= 51; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider W ($i)",
                'img' => "kamen-rider/heisei/11.w/2.1.1-dopant-$i.jpg",
                'category_id' => $this->Category('w'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider ooo
        for ($i = 1; $i <= 69; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Ooo ($i)",
                'img' => "kamen-rider/heisei/12.ooo/2.2-ooo-riders-$i.jpg",
                'category_id' => $this->Category('ooo'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider ooo
        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Ooo ($i)",
                'img' => "kamen-rider/heisei/12.ooo/2.2.1-greed-$i.jpg",
                'category_id' => $this->Category('ooo'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider fourze
        for ($i = 1; $i <= 63; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Fourze ($i)",
                'img' => "kamen-rider/heisei/13.fourze/2.3-fourze-riders-$i.jpg",
                'category_id' => $this->Category('fourze'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider fourze
        for ($i = 1; $i <= 47; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Fourze ($i)",
                'img' => "kamen-rider/heisei/13.fourze/2.3.1-zodiarts-$i.jpg",
                'category_id' => $this->Category('fourze'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider wizard
        for ($i = 1; $i <= 50; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Wizard ($i)",
                'img' => "kamen-rider/heisei/14.wizard/2.4-wizard-riders-$i.jpg",
                'category_id' => $this->Category('wizard'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider wizard
        for ($i = 1; $i <= 39; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Wizard ($i)",
                'img' => "kamen-rider/heisei/14.wizard/2.4.1-phantom-$i.jpg",
                'category_id' => $this->Category('wizard'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider gaim
        for ($i = 1; $i <= 84; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Gaim ($i)",
                'img' => "kamen-rider/heisei/15.gaim/2.5-gaim-riders-$i.jpg",
                'category_id' => $this->Category('gaim'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider gaim
        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Gaim ($i)",
                'img' => "kamen-rider/heisei/15.gaim/2.5.1-overlord-$i.jpg",
                'category_id' => $this->Category('gaim'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider drive
        for ($i = 1; $i <= 76; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Drive ($i)",
                'img' => "kamen-rider/heisei/16.drive/2.6-drive-riders-$i.jpg",
                'category_id' => $this->Category('drive'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider drive
        for ($i = 1; $i <= 55; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Drive ($i)",
                'img' => "kamen-rider/heisei/16.drive/2.6.1-roidmude-$i.jpg",
                'category_id' => $this->Category('drive'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider ghost
        for ($i = 1; $i <= 75; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Ghost ($i)",
                'img' => "kamen-rider/heisei/17.ghost/2.7-ghost-riders-$i.jpg",
                'category_id' => $this->Category('ghost'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider ghost
        for ($i = 1; $i <= 49; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Ghost ($i)",
                'img' => "kamen-rider/heisei/17.ghost/2.7.1-gamma-$i.jpg",
                'category_id' => $this->Category('ghost'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider ex-aid
        for ($i = 1; $i <= 87; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Ex-Aid ($i)",
                'img' => "kamen-rider/heisei/18.ex-aid/2.8-ex-aid-riders-$i.jpg",
                'category_id' => $this->Category('ex-aid'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider ex-aid
        for ($i = 1; $i <= 42; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Ex-Aid ($i)",
                'img' => "kamen-rider/heisei/18.ex-aid/2.8.1-bugster-$i.jpg",
                'category_id' => $this->Category('ex-aid'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider build
        for ($i = 1; $i <= 146; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Build ($i)",
                'img' => "kamen-rider/heisei/19.build/2.9-build-riders-$i.jpg",
                'category_id' => $this->Category('build'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider build
        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Build ($i)",
                'img' => "kamen-rider/heisei/19.build/2.9.1-smash-$i.jpg",
                'category_id' => $this->Category('build'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider zi-o
        for ($i = 1; $i <= 58; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Zi-O ($i)",
                'img' => "kamen-rider/heisei/20.zi-o/2.10-zi-o-riders-$i.jpg",
                'category_id' => $this->Category('zi-o'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // villain kamen rider zi-o
        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Villain Kamen Rider Zi-O ($i)",
                'img' => "kamen-rider/heisei/20.zi-o/2.10.1-another-riders-$i.jpg",
                'category_id' => $this->Category('zi-o'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider shinobi
        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Shinobi ($i)",
                'img' => "kamen-rider/heisei/20.zi-o/2.10.2-shinobi-riders-$i.jpg",
                'category_id' => $this->Category('zi-o'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider zero-one
        for ($i = 1; $i <= 113; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Zero-One ($i)",
                'img' => "kamen-rider/reiwa/1.zero-one/zero-one-$i.jpg",
                'category_id' => $this->Category('zero-one'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // humagear
        for ($i = 1; $i <= 59; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Humagear ($i)",
                'img' => "kamen-rider/reiwa/1.zero-one/humagear-$i.jpg",
                'category_id' => $this->Category('zero-one'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider saber
        for ($i = 1; $i <= 125; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Saber ($i)",
                'img' => "kamen-rider/reiwa/2.saber/saber-$i.jpg",
                'category_id' => $this->Category('saber'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // megid
        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Megid ($i)",
                'img' => "kamen-rider/reiwa/2.saber/megid-$i.jpg",
                'category_id' => $this->Category('saber'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // kamen rider revice
        for ($i = 1; $i <= 137; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Revice ($i)",
                'img' => "kamen-rider/reiwa/3.revice/revice-$i.jpg",
                'category_id' => $this->Category('revice'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // deadman
        for ($i = 1; $i <= 58; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Deadman ($i)",
                'img' => "kamen-rider/reiwa/3.revice/deadman-$i.jpg",
                'category_id' => $this->Category('revice'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // geats
        for ($i = 1; $i <= 273; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Geats ($i)",
                'img' => "kamen-rider/reiwa/4.geats/geats-$i.jpg",
                'category_id' => $this->Category('geats'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // gotchard
        for ($i = 1; $i <= 3; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kamen Rider Gotchard ($i)",
                'img' => "kamen-rider/reiwa/5.gotchard/gotchard-$i.jpg",
                'category_id' => $this->Category('gotchard'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Goranger ($i)",
                'img' => "super-sentai/showa/1-himitsu-sentai-goranger-five-rangers-$i.jpg",
                'category_id' => $this->Category('gorenger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "J.A.K.Q ($i)",
                'img' => "super-sentai/showa/2-j.a.k.q-dengekitai-jakq-$i.jpg",
                'category_id' => $this->Category('jakq'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Fever J ($i)",
                'img' => "super-sentai/showa/3-battle-fever-j-$i.jpg",
                'category_id' => $this->Category('fever-j'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Denjiman ($i)",
                'img' => "super-sentai/showa/4-denshi-sentai-denjiman-$i.jpg",
                'category_id' => $this->Category('denziman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 3; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Sun Vulcan ($i)",
                'img' => "super-sentai/showa/5-taiyo-sentai-sun-vulcan-$i.jpg",
                'category_id' => $this->Category('sun-vulcan'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Goggle Five ($i)",
                'img' => "super-sentai/showa/6-dai-sentai-goggle-five-$i.jpg",
                'category_id' => $this->Category('goggle-v'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Dynaman ($i)",
                'img' => "super-sentai/showa/7-kagaku-sentai-dynaman-$i.jpg",
                'category_id' => $this->Category('dynaman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Bioman ($i)",
                'img' => "super-sentai/showa/8-choudenshi-bioman-$i.jpg",
                'category_id' => $this->Category('bioman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Changeman ($i)",
                'img' => "super-sentai/showa/9-dengeki-sentai-changeman-$i.jpg",
                'category_id' => $this->Category('changeman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Flashman ($i)",
                'img' => "super-sentai/showa/10-choushinsei-flashman-$i.jpg",
                'category_id' => $this->Category('flashman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Maskman ($i)",
                'img' => "super-sentai/showa/11-hikari-sentai-maskman-$i.jpg",
                'category_id' => $this->Category('maskman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Liveman ($i)",
                'img' => "super-sentai/showa/12-choujuu-sentai-liveman-$i.jpg",
                'category_id' => $this->Category('liveman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Turboranger ($i)",
                'img' => "super-sentai/heisei/13-kousoku-sentai-turboranger-$i.jpg",
                'category_id' => $this->Category('turboranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 10; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Fiveman ($i)",
                'img' => "super-sentai/heisei/14-chikyuu-sentai-fiveman-$i.jpg",
                'category_id' => $this->Category('fiveman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 16; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Jetman ($i)",
                'img' => "super-sentai/heisei/15-choujin-sentai-jetman-$i.jpg",
                'category_id' => $this->Category('jetman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Zyuranger - Mighty Morphin Power Rangers ($i)",
                'img' => "super-sentai/heisei/16-kyouryuu-sentai-zyuranger-jpn-mighty-morphin-power-rangers-usa-$i.jpg",
                'category_id' => $this->Category('zyuranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Dairanger - Mighty Morphin Power Rangers 2 ($i)",
                'img' => "super-sentai/heisei/17-gosei-sentai-dairanger-jpn-mighty-morphin-power-rangers-2-usa-star-ranger-ina-$i.jpg",
                'category_id' => $this->Category('dairanger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kakuranger - Mighty Morphin Power Alien Rangers 3 ($i)",
                'img' => "super-sentai/heisei/18-ninja-sentai-kakuranger-jpn-mighty-morphin-power-alien-rangers-3-usa-ninja-ranger-ina-$i.jpg",
                'category_id' => $this->Category('kakuranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Choriki Sentai Ohranger (JPN) - Power Rangers Zeo (USA) ($i)",
                'img' => "super-sentai/heisei/19-choriki-sentai-ohranger-jpn-power-rangers-zeo-usa-oh-ranger-ina-$i.jpg",
                'category_id' => $this->Category('ohranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Gekisou Sentai Carranger (JPN) - Power Rangers Turbo (USA) ($i)",
                'img' => "super-sentai/heisei/20-gekisou-sentai-carranger-jpn-power-rangers-turbo-usa-$i.jpg",
                'category_id' => $this->Category('carranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 18; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Denji Sentai Megaranger (JPN) - Power Rangers In Space (USA) ($i)",
                'img' => "super-sentai/heisei/21-denji-sentai-megaranger-jpn-power-rangers-in-space-usa-$i.jpg",
                'category_id' => $this->Category('megaranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Seijuu Sentai Gingaman (JPN) - Power Rangers Lost Galaxy (USA) ($i)",
                'img' => "super-sentai/heisei/22-seijuu-sentai-gingaman-jpn-power-rangers-lost-galaxy-usa-$i.jpg",
                'category_id' => $this->Category('gingaman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "KyuKyu Sentai GoGo V (JPN) - Power Rangers Lightspeed Rescue (USA) ($i)",
                'img' => "super-sentai/heisei/23-kyukyu-sentai-gogo-v-jpn-power-rangers-lightspeed-rescue-usa-$i.jpg",
                'category_id' => $this->Category('go-go-v'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Mirai Sentai Timeranger (JPN) - Power Rangers Time Force (USA) ($i)",
                'img' => "super-sentai/heisei/24-mirai-sentai-timeranger-jpn-power-rangers-time-force-usa-$i.jpg",
                'category_id' => $this->Category('timeranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Hyaku Juu Sentai Gaoranger (JPN) - Power Rangers Wild Force (USA) ($i)",
                'img' => "super-sentai/heisei/25-hyaku-juu-sentai-gaoranger-jpn-power-rangers-wild-force-usa-$i.jpg",
                'category_id' => $this->Category('gaoranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ninpuu Sentai Hurricanger (JPN) - Power Rangers Ninja Storm (USA) ($i)",
                'img' => "super-sentai/heisei/26-ninpuu-sentai-hurricanger-jpn-power-rangers-ninja-storm-usa-$i.jpg",
                'category_id' => $this->Category('hurricaneger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "BakuRyuu Sentai Abaranger (JPN) - Power Rangers Dino Thunder (USA) ($i)",
                'img' => "super-sentai/heisei/27-bakuryuu-sentai-abaranger-jpn-power-rangers-dino-thunder-usa-$i.jpg",
                'category_id' => $this->Category('abaranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 17; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Tokusou Sentai Dekaranger (JPN) - Power Rangers S.P.D (USA) ($i)",
                'img' => "super-sentai/heisei/28-tokusou-sentai-dekaranger-jpn-power-rangers-s.p.d-usa-$i.jpg",
                'category_id' => $this->Category('dekaranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 14; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Mahou Sentai Magiranger (JPN) - Power Rangers Mystic Force (USA) ($i)",
                'img' => "super-sentai/heisei/29-mahou-sentai-magiranger-jpn-power-rangers-mystic-force-usa-$i.jpg",
                'category_id' => $this->Category('magiranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Gougou Sentai Boukenger (JPN) - Power Rangers Operation Overdrive (USA) ($i)",
                'img' => "super-sentai/heisei/30-gougou-sentai-boukenger-jpn-power-rangers-operation-overdrive-usa-$i.jpg",
                'category_id' => $this->Category('boukenger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Juken Sentai Gekiranger (JPN) - Power Rangers Jungle Fury (USA) ($i)",
                'img' => "super-sentai/heisei/31-juken-sentai-gekiranger-jpn-power-rangers-jungle-fury-usa-$i.jpg",
                'category_id' => $this->Category('gekiranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Engine Sentai Go-Onger (JPN) - Power Rangers RPM (USA) ($i)",
                'img' => "super-sentai/heisei/32-engine-sentai-go-onger-jpn-power-rangers-rpm-usa-$i.jpg",
                'category_id' => $this->Category('go-onger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 24; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Samurai Sentai Shinkenger (JPN) - Power Rangers Samurai (USA) ($i)",
                'img' => "super-sentai/heisei/33-samurai-sentai-shinkenger-jpn-power-rangers-samurai-usa-$i.jpg",
                'category_id' => $this->Category('shinkenger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Tensou Sentai Goseiger (JPN) - Power Rangers Megaforce (USA) ($i)",
                'img' => "super-sentai/heisei/34-tensou-sentai-goseiger-jpn-power-rangers-megaforce-usa-$i.jpg",
                'category_id' => $this->Category('goseiger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kaizoku Sentai okaiger (JPN) - Power Rangers Super Megaforce (USA) ($i)",
                'img' => "super-sentai/heisei/35-kaizoku-sentai-gokaiger-jpn-power-rangers-super-megaforce-usa-$i.jpg",
                'category_id' => $this->Category('gokaiger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Tokumei Sentai Go-Busters  ($i)",
                'img' => "super-sentai/heisei/36-tokumei-sentai-go-busters-$i.jpg",
                'category_id' => $this->Category('go-busters'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 29; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Zyuden Sentai Kyoryuger ($i)",
                'img' => "super-sentai/heisei/37-zyuden-sentai-kyoryuger-$i.jpg",
                'category_id' => $this->Category('kyoryuger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ressha Sentai Tokkyuger ($i)",
                'img' => "super-sentai/heisei/38-ressha-sentai-tokkyuger-$i.jpg",
                'category_id' => $this->Category('toqger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 20; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Shuriken Sentai Ninninger ($i)",
                'img' => "super-sentai/heisei/39-shuriken-sentai-ninninger-$i.jpg",
                'category_id' => $this->Category('ninninger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Doubutsu Sentai Zyouhger ($i)",
                'img' => "super-sentai/heisei/40-doubutsu-sentai-zyouhger-$i.jpg",
                'category_id' => $this->Category('zyuohger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 27; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Uchuu Sentai Kyuuranger ($i)",
                'img' => "super-sentai/heisei/41-uchuu-sentai-kyuuranger-$i.jpg",
                'category_id' => $this->Category('kyuuranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kaitou Sentai Lupinranger _ Keisatsu Sentai Patranger (Lupat Rangers) ($i)",
                'img' => "super-sentai/heisei/42-kaitou-sentai-lupinranger-keisatsu-sentai-patranger-lupat-rangers-$i.jpg",
                'category_id' => $this->Category('lupinranger-vs-patranger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kishiryu Sentai Ryusoulger ($i)",
                'img' => "super-sentai/heisei/43-kishiryu-sentai-ryusoulger-$i.jpg",
                'category_id' => $this->Category('ryusoulger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 60; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Mashin Sentai Kiramager ($i)",
                'img' => "super-sentai/reiwa/1-mashin-sentai-kiramager/mashin-sentai-kiramager-$i.jpg",
                'category_id' => $this->Category('kiramager'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 62; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Kikai Sentai Zenkaiger ($i)",
                'img' => "super-sentai/reiwa/2-kikai-sentai-zenkaiger/kikai-sentai-zenkaiger-$i.jpg",
                'category_id' => $this->Category('zenkaiger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 79; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Avataro Sentai Donbrothers ($i)",
                'img' => "super-sentai/reiwa/3-avataro-sentai-donbrothers/avataro-sentai-donbrothers-$i.jpg",
                'category_id' => $this->Category('donbrothers'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ohsama Sentai King-Ohger ($i)",
                'img' => "super-sentai/reiwa/4-ohsama-sentai-king-ohger/ohsama-sentai-king-ohger-$i.jpg",
                'category_id' => $this->Category('king-ohger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Bakuage Sentai Boonboomger ($i)",
                'img' => null,
                'category_id' => $this->Category('boonboomger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman ($i)",
                'img' => "ultraman/showa/1.ultraman/ultraman-$i.jpg",
                'category_id' => $this->Category('ultraman'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultra Seven ($i)",
                'img' => "ultraman/showa/2.ultra-seven/ultra-seven-$i.jpg",
                'category_id' => $this->Category('ultra-seven'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Jack ($i)",
                'img' => "ultraman/showa/3.ultraman-jack/ultraman-jack-$i.jpg",
                'category_id' => $this->Category('jack'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 9; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Ace ($i)",
                'img' => "ultraman/showa/4.ultraman-ace/ultraman-ace-$i.jpg",
                'category_id' => $this->Category('ace'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 7; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Taro ($i)",
                'img' => "ultraman/showa/5.ultraman-taro/ultraman-taro-$i.jpg",
                'category_id' => $this->Category('taro'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Leo ($i)",
                'img' => "ultraman/showa/6.ultraman-leo/ultraman-leo-$i.jpg",
                'category_id' => $this->Category('leo'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman 80 ($i)",
                'img' => "ultraman/showa/7.ultraman-80/ultraman-80-$i.jpg",
                'category_id' => $this->Category('80'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 6; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Zoffy ($i)",
                'img' => "ultraman/showa/8.ultraman-zoffy/ultraman-zoffy-$i.jpg",
                'category_id' => $this->Category('zoffy'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 13; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Tiga ($i)",
                'img' => "ultraman/heisei/1.ultraman-tiga/ultraman-tiga-$i.jpg",
                'category_id' => $this->Category('tiga'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 8; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Dyna ($i)",
                'img' => "ultraman/heisei/2.ultraman-dyna/ultraman-dyna-$i.jpg",
                'category_id' => $this->Category('dyna'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Gaia ($i)",
                'img' => "ultraman/heisei/3.ultraman-gaia/ultraman-gaia-$i.jpg",
                'category_id' => $this->Category('gaia'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 14; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Cosmos ($i)",
                'img' => "ultraman/heisei/4.ultraman-cosmos/ultraman-cosmos-$i.jpg",
                'category_id' => $this->Category('cosmos'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 11; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Nexus ($i)",
                'img' => "ultraman/heisei/5.ultraman-nexus/ultraman-nexus-$i.jpg",
                'category_id' => $this->Category('nexus'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Max ($i)",
                'img' => "ultraman/heisei/6.ultraman-max/ultraman-max-$i.jpg",
                'category_id' => $this->Category('max'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 20; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Mebius ($i)",
                'img' => "ultraman/heisei/7.ultraman-mebius/ultraman-mebius-$i.jpg",
                'category_id' => $this->Category('mebius'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 30; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Zero ($i)",
                'img' => "ultraman/heisei/8.ultraman-zero/ultraman-zero-$i.jpg",
                'category_id' => $this->Category('zero'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 25; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Ginga ($i)",
                'img' => "ultraman/heisei/9.ultraman-ginga/ultraman-ginga-$i.jpg",
                'category_id' => $this->Category('ginga'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Ginga S ($i)",
                'img' => "ultraman/heisei/10.ultraman-ginga-s/ultraman-ginga-s-$i.jpg",
                'category_id' => $this->Category('ginga-s'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 29; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman X ($i)",
                'img' => "ultraman/heisei/11.ultraman-x/ultraman-x-$i.jpg",
                'category_id' => $this->Category('x'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 54; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Orb ($i)",
                'img' => "ultraman/heisei/12.ultraman-orb/ultraman-orb-$i.jpg",
                'category_id' => $this->Category('orb'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Geed ($i)",
                'img' => "ultraman/heisei/13.ultraman-geed/ultraman-geed-$i.jpg",
                'category_id' => $this->Category('geed'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Rb ($i)",
                'img' => "ultraman/heisei/14.ultraman-rb/ultraman-rb-$i.jpg",
                'category_id' => $this->Category('rb'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 22; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Taiga ($i)",
                'img' => "ultraman/reiwa/1.ultraman-taiga/ultraman-taiga-$i.jpg",
                'category_id' => $this->Category('taiga'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 37; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Z ($i)",
                'img' => "ultraman/reiwa/2.ultraman-z/ultraman-z-$i.jpg",
                'category_id' => $this->Category('z'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 35; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Trigger ($i)",
                'img' => "ultraman/reiwa/3.ultraman-trigger/ultraman-trigger-$i.jpg",
                'category_id' => $this->Category('trigger'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 34; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Decker ($i)",
                'img' => "ultraman/reiwa/4.ultraman-decker/ultraman-decker-$i.jpg",
                'category_id' => $this->Category('decker'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 1; $i <= 1; $i++) {
            $datas[] = [
                // 'id' => $uuid,
                'name' => "Ultraman Blazar ($i)",
                'img' => null,
                'category_id' => $this->Category('blazar'),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        Data::query()->insert($datas);
    }

    private function Category(string $slug): string
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            $category = Category::create([
                // 'id' => $uuid,
                'slug' => $slug,
            ]);
        }
        return $category->id;
    }
}
