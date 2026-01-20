<?php

namespace Database\Seeders\Content;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryUltramanSeeder extends Seeder
{
    public function run(): void
    {
        $showa = $this->Era('Showa');
        $heisei = $this->Era('Heisei');
        $reiwa = $this->Era('Reiwa');
        $ultraman = $this->Franchise('Ultraman');

        $data = collect([
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman',
                'name' => 'Ultraman',
                'slug' => Str::slug('Ultraman', '-'),
                'description' => 'Ultraman (ウルトラマン, Urutoraman) is an alien from a place called the Land of Light in Nebula M78, who chased the monster Bemular to Planet Earth, and merged with Shin Hayata during his tenure there. He is the first Ultra to visit Earth and defended the planet against Kaiju until he was recalled after his battle with Zetton. Ultraman was given his title by his human host.',
                'img' => 'category/showa-1-ultraman-logo.webp',
                'first_aired' => '1966-07-17',
                'last_aired' => '1967-04-09',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultra Seven',
                'name' => 'Ultra Seven',
                'slug' => Str::slug('Ultra Seven', '-'),
                'description' => null,
                'img' => 'category/showa-2-ultraman-logo.webp',
                'first_aired' => '1967-10-01',
                'last_aired' => '1968-09-08',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Jack',
                'name' => 'Jack',
                'slug' => Str::slug('Jack', '-'),
                'description' => null,
                'img' => 'category/showa-3-ultraman-logo.webp',
                'first_aired' => '1971-04-02',
                'last_aired' => '1972-03-31',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Ace',
                'name' => 'Ace',
                'slug' => Str::slug('Ace', '-'),
                'description' => null,
                'img' => 'category/showa-4-ultraman-logo.webp',
                'first_aired' => '1972-04-07',
                'last_aired' => '1973-03-30',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Taro',
                'name' => 'Taro',
                'slug' => Str::slug('Taro', '-'),
                'description' => null,
                'img' => 'category/showa-5-ultraman-logo.webp',
                'first_aired' => '1973-04-06',
                'last_aired' => '1974-04-05',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Leo',
                'name' => 'Leo',
                'slug' => Str::slug('Leo', '-'),
                'description' => null,
                'img' => 'category/showa-6-ultraman-logo.webp',
                'first_aired' => '1974-04-12',
                'last_aired' => '1975-03-28',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman 80',
                'name' => '80',
                'slug' => Str::slug('80', '-'),
                'description' => null,
                'img' => 'category/showa-7-ultraman-logo.webp',
                'first_aired' => '1980-04-02',
                'last_aired' => '1981-03-25',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Zoffy',
                'name' => 'Zoffy',
                'slug' => Str::slug('Zoffy', '-'),
                'description' => null,
                'img' => 'category/showa-8-ultraman-logo.webp',
                'first_aired' => '1984-03-17',
                'last_aired' => '1984-03-17',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Tiga',
                'name' => 'Tiga',
                'slug' => Str::slug('Tiga', '-'),
                'description' => null,
                'img' => 'category/heisei-1-ultraman-logo.webp',
                'first_aired' => '1996-09-07',
                'last_aired' => '1997-08-30',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Dyna',
                'name' => 'Dyna',
                'slug' => Str::slug('Dyna', '-'),
                'description' => null,
                'img' => 'category/heisei-2-ultraman-logo.webp',
                'first_aired' => '1997-09-06',
                'last_aired' => '1998-08-29',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Gaia',
                'name' => 'Gaia',
                'slug' => Str::slug('Gaia', '-'),
                'description' => null,
                'img' => 'category/heisei-3-ultraman-logo.webp',
                'first_aired' => '1998-09-05',
                'last_aired' => '1999-08-28',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Neos',
                'name' => 'Neos',
                'slug' => Str::slug('Neos', '-'),
                'description' => null,
                'img' => 'category/heisei-4-ultraman-logo.webp',
                'first_aired' => '2000-11-22',
                'last_aired' => '2001-05-05',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Cosmos',
                'name' => 'Cosmos',
                'slug' => Str::slug('Cosmos', '-'),
                'description' => null,
                'img' => 'category/heisei-5-ultraman-logo.webp',
                'first_aired' => '2001-07-07',
                'last_aired' => '2002-09-28',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Nexus',
                'name' => 'Nexus',
                'slug' => Str::slug('Nexus', '-'),
                'description' => null,
                'img' => 'category/heisei-6-ultraman-logo.webp',
                'first_aired' => '2004-10-02',
                'last_aired' => '2005-06-25',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Max',
                'name' => 'Max',
                'slug' => Str::slug('Max', '-'),
                'description' => null,
                'img' => 'category/heisei-7-ultraman-logo.webp',
                'first_aired' => '2005-07-02',
                'last_aired' => '2006-03-25',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Mebius',
                'name' => 'Mebius',
                'slug' => Str::slug('Mebius', '-'),
                'description' => null,
                'img' => 'category/heisei-8-ultraman-logo.webp',
                'first_aired' => '2006-04-08',
                'last_aired' => '2007-03-31',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Zero',
                'name' => 'Zero',
                'slug' => Str::slug('Zero', '-'),
                'description' => null,
                'img' => 'category/heisei-9-ultraman-logo.webp',
                'first_aired' => '2010-12-23',
                'last_aired' => '2010-12-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Ginga',
                'name' => 'Ginga',
                'slug' => Str::slug('Ginga', '-'),
                'description' => null,
                'img' => 'category/heisei-10-ultraman-logo.webp',
                'first_aired' => '2013-07-10',
                'last_aired' => '2013-12-18',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Ginga S',
                'name' => 'Ginga S',
                'slug' => Str::slug('Ginga S', '-'),
                'description' => null,
                'img' => 'category/heisei-11-ultraman-logo.webp',
                'first_aired' => '2014-07-15',
                'last_aired' => '2014-12-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman X',
                'name' => 'X',
                'slug' => Str::slug('X', '-'),
                'description' => null,
                'img' => 'category/heisei-12-ultraman-logo.webp',
                'first_aired' => '2015-07-14',
                'last_aired' => '2015-12-22',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Orb',
                'name' => 'Orb',
                'slug' => Str::slug('Orb', '-'),
                'description' => null,
                'img' => 'category/heisei-13-ultraman-logo.webp',
                'first_aired' => '2016-07-09',
                'last_aired' => '2016-12-24',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Geed',
                'name' => 'Geed',
                'slug' => Str::slug('Geed', '-'),
                'description' => null,
                'img' => 'category/heisei-14-ultraman-logo.webp',
                'first_aired' => '2017-07-08',
                'last_aired' => '2017-12-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman R/B',
                'name' => 'R/B',
                'slug' => Str::slug('R/B', '-'),
                'description' => null,
                'img' => 'category/heisei-15-ultraman-logo.webp',
                'first_aired' => '2018-07-07',
                'last_aired' => '2018-12-22',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Taiga',
                'name' => 'Taiga',
                'slug' => Str::slug('Taiga', '-'),
                'description' => null,
                'img' => 'category/reiwa-1-ultraman-logo.webp',
                'first_aired' => '2019-07-06',
                'last_aired' => '2019-12-28',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Z',
                'name' => 'Z',
                'slug' => Str::slug('Z', '-'),
                'description' => null,
                'img' => 'category/reiwa-2-ultraman-logo.webp',
                'first_aired' => '2020-06-20',
                'last_aired' => '2020-12-19',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Trigger',
                'name' => 'Trigger',
                'slug' => Str::slug('Trigger', '-'),
                'description' => null,
                'img' => 'category/reiwa-3-ultraman-logo.webp',
                'first_aired' => '2021-07-10',
                'last_aired' => '2022-01-22',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Decker',
                'name' => 'Decker',
                'slug' => Str::slug('Decker', '-'),
                'description' => null,
                'img' => 'category/reiwa-4-ultraman-logo.webp',
                'first_aired' => '2022-07-09',
                'last_aired' => '2023-01-21',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Blazar',
                'name' => 'Blazar',
                'slug' => Str::slug('Blazar', '-'),
                'description' => null,
                'img' => 'category/reiwa-5-ultraman-logo.webp',
                'first_aired' => '2023-07-08',
                'last_aired' => '2024-01-20',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Arc',
                'name' => 'Arc',
                'slug' => Str::slug('Arc', '-'),
                'description' => null,
                'img' => 'category/reiwa-6-ultraman-logo.webp',
                'first_aired' => '2024-07-06',
                'last_aired' => '2025-01-18',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'fullname' => 'Ultraman Omega',
                'name' => 'Omega',
                'slug' => Str::slug('Omega', '-'),
                'description' => null,
                'img' => 'category/reiwa-7-ultraman-logo.webp',
                'first_aired' => '2025-07-05',
                'last_aired' => null,
            ],
        ]);

        foreach ($data as $item) {
            Category::create($item);
        }
    }

    private function Era(string $name): string
    {
        $era = Era::where('name', $name)->first();
        if (!$era) {
            $era = Era::create([
                'name' => $name,
            ]);
        }
        return $era->id;
    }

    private function Franchise(string $name): string
    {
        $franchise = Franchise::where('name', $name)->first();
        if (!$franchise) {
            $franchise = Franchise::create([
                'name' => $name,
            ]);
        }
        return $franchise->id;
    }
}
