<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryGaroSeeder extends Seeder
{
    public function run(): void
    {
        $heisei = $this->Era('Heisei');
        $reiwa = $this->Era('Reiwa');
        $garo = $this->Franchise('Garo');

        $data = collect([
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Garo',
                'name' => 'Garo',
                'slug' => Str::slug('Garo', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2005-10-07',
                'last_aired' => '2006-03-31',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Garo: Makai Senki',
                'name' => 'Makai Senki',
                'slug' => Str::slug('Makai Senki', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2011-10-06',
                'last_aired' => '2012-03-22',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Garo: Yami o Terasu Mono',
                'name' => 'Yami o Terasu Mono',
                'slug' => Str::slug('Yami o Terasu Mono', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2013-04-05',
                'last_aired' => '2013-09-20',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Zero: Black Blood',
                'name' => 'Zero: Black Blood',
                'slug' => Str::slug('Zero: Black Blood', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2014-03-05',
                'last_aired' => '2014-03-07',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Garo: Makai no Hana',
                'name' => 'Makai no Hana',
                'slug' => Str::slug('Makai no Hana', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2014-04-04',
                'last_aired' => '2014-09-26',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Garo: Gold Storm Sho',
                'name' => 'Gold Storm Sho',
                'slug' => Str::slug('Gold Storm Sho', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2015-04-03',
                'last_aired' => '2015-09-18',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Garo: Makai Retsuden',
                'name' => 'Makai Retsuden',
                'slug' => Str::slug('Makai Retsuden', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2016-04-08',
                'last_aired' => '2016-07-24',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Zero: Dragon Blood',
                'name' => 'Zero: Dragon Blood',
                'slug' => Str::slug('Zero: Dragon Blood', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2017-01-17',
                'last_aired' => '2017-04-01',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $garo,
                'fullname' => 'Kami no Kiba: Jinga',
                'name' => 'Kami no Kiba: Jinga',
                'slug' => Str::slug('Kami no Kiba: Jinga', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2018-10-04',
                'last_aired' => '2018-12-27',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $garo,
                'fullname' => 'Garo: Versus Road',
                'name' => 'Versus Road',
                'slug' => Str::slug('Versus Road', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2020-04-02',
                'last_aired' => '2020-06-25',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $garo,
                'fullname' => 'Garo: Hagane o Tsugu Mono',
                'name' => 'Hagane o Tsugu Mono',
                'slug' => Str::slug('Hagane o Tsugu Mono', '-'),
                'description' => null,
                'img' => 'franchise/garo-logo.jpg',
                'first_aired' => '2024-01-11',
                'last_aired' => '2024-03-28',
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
