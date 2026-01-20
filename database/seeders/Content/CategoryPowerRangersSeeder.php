<?php

namespace Database\Seeders\Content;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryPowerRangersSeeder extends Seeder
{
    public function run(): void
    {
        $heisei = $this->Era('Heisei');
        $powerranger = $this->Franchise('Power Rangers');

        $data = collect([
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Mighty Morphin Season 1',
                'name' => 'Mighty Morphin Season 1',
                'slug' => Str::slug('Mighty Morphin Season 1', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-1.webp',
                'first_aired' => '1993-08-28',
                'last_aired' => '1994-05-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Mighty Morphin Season 2',
                'name' => 'Mighty Morphin Season 2',
                'slug' => Str::slug('Mighty Morphin Season 2', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-2.webp',
                'first_aired' => '1994-07-21',
                'last_aired' => '1995-05-20',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Mighty Morphin Season 3',
                'name' => 'Mighty Morphin Season 3',
                'slug' => Str::slug('Mighty Morphin Season 3', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-3.webp',
                'first_aired' => '1995-09-02',
                'last_aired' => '1995-11-27',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger: Alien Rangers',
                'name' => 'Alien Rangers',
                'slug' => Str::slug('Alien Rangers', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-4.webp',
                'first_aired' => '1996-02-05',
                'last_aired' => '1996-02-17',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Zeo',
                'name' => 'Zeo',
                'slug' => Str::slug('Zeo', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-5.webp',
                'first_aired' => '1996-04-20',
                'last_aired' => '1996-11-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Turbo',
                'name' => 'Turbo',
                'slug' => Str::slug('Turbo', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-6.webp',
                'first_aired' => '1997-04-19',
                'last_aired' => '1997-11-24',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger In Space',
                'name' => 'In Space',
                'slug' => Str::slug('In Space', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-7.webp',
                'first_aired' => '1998-02-06',
                'last_aired' => '1998-11-21',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Lost Galaxy',
                'name' => 'Lost Galaxy',
                'slug' => Str::slug('Lost Galaxy', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-8.webp',
                'first_aired' => '1999-02-06',
                'last_aired' => '1999-12-18',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Lightspeed Rescue',
                'name' => 'Lightspeed Rescue',
                'slug' => Str::slug('Lightspeed Rescue', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-9.webp',
                'first_aired' => '2000-02-12',
                'last_aired' => '2000-11-18',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Time Force',
                'name' => 'Time Force',
                'slug' => Str::slug('Time Force', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-10.webp',
                'first_aired' => '2001-02-03',
                'last_aired' => '2001-11-17',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Wild Force',
                'name' => 'Wild Force',
                'slug' => Str::slug('Wild Force', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-11.webp',
                'first_aired' => '2002-02-09',
                'last_aired' => '2002-11-16',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Ninja Storm',
                'name' => 'Ninja Storm',
                'slug' => Str::slug('Ninja Storm', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-12.webp',
                'first_aired' => '2003-02-15',
                'last_aired' => '2003-11-15',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Dino Thunder',
                'name' => 'Dino Thunder',
                'slug' => Str::slug('Dino Thunder', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-13.webp',
                'first_aired' => '2004-02-14',
                'last_aired' => '2004-11-20',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger SPD',
                'name' => 'SPD',
                'slug' => Str::slug('SPD', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-14.webp',
                'first_aired' => '2005-02-05',
                'last_aired' => '2005-11-14',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Mystic Force',
                'name' => 'Mystic Force',
                'slug' => Str::slug('Mystic Force', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-15.webp',
                'first_aired' => '2006-02-20',
                'last_aired' => '2006-11-13',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Operation Overdrive',
                'name' => 'Operation Overdrive',
                'slug' => Str::slug('Operation Overdrive', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-16.webp',
                'first_aired' => '2007-02-26',
                'last_aired' => '2007-11-12',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Jungle Fury',
                'name' => 'Jungle Fury',
                'slug' => Str::slug('Jungle Fury', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-17.webp',
                'first_aired' => '2008-02-18',
                'last_aired' => '2008-11-03',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger RPM',
                'name' => 'RPM',
                'slug' => Str::slug('RPM', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-18.webp',
                'first_aired' => '2009-03-07',
                'last_aired' => '2009-12-26',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Samurai',
                'name' => 'Samurai',
                'slug' => Str::slug('Samurai', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-19.webp',
                'first_aired' => '2011-02-07',
                'last_aired' => '2011-12-10',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Super Samurai',
                'name' => 'Super Samurai',
                'slug' => Str::slug('Super Samurai', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-20.webp',
                'first_aired' => '2012-02-18',
                'last_aired' => '2012-12-08',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Megaforce',
                'name' => 'Megaforce',
                'slug' => Str::slug('Megaforce', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-21.webp',
                'first_aired' => '2013-02-02',
                'last_aired' => '2013-12-07',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Super Megaforce',
                'name' => 'Super Megaforce',
                'slug' => Str::slug('Super Megaforce', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-22.webp',
                'first_aired' => '2014-02-15',
                'last_aired' => '2014-11-22',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Dino Charge',
                'name' => 'Dino Charge',
                'slug' => Str::slug('Dino Charge', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-23.webp',
                'first_aired' => '2015-02-07',
                'last_aired' => '2015-12-12',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Dino Super Charge',
                'name' => 'Dino Super Charge',
                'slug' => Str::slug('Dino Super Charge', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-24.webp',
                'first_aired' => '2016-01-30',
                'last_aired' => '2016-12-10',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Ninja Steel',
                'name' => 'Ninja Steel',
                'slug' => Str::slug('Ninja Steel', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-25.webp',
                'first_aired' => '2017-01-21',
                'last_aired' => '2017-12-02',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Super Ninja Steel',
                'name' => 'Super Ninja Steel',
                'slug' => Str::slug('Super Ninja Steel', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-26.webp',
                'first_aired' => '2018-01-27',
                'last_aired' => '2018-12-01',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Beast Morphers Season 1',
                'name' => 'Beast Morphers Season 1',
                'slug' => Str::slug('Beast Morphers Season 1', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-27.webp',
                'first_aired' => '2019-03-02',
                'last_aired' => '2019-12-14',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Beast Morphers Season 2',
                'name' => 'Beast Morphers Season 2',
                'slug' => Str::slug('Beast Morphers Season 2', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-28.webp',
                'first_aired' => '2020-02-22',
                'last_aired' => '2020-12-12',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Dino Fury Season 1',
                'name' => 'Dino Fury Season 1',
                'slug' => Str::slug('Dino Fury Season 1', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-29.webp',
                'first_aired' => '2021-02-20',
                'last_aired' => '2021-10-15',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Dino Fury Season 2',
                'name' => 'Dino Fury Season 2',
                'slug' => Str::slug('Dino Fury Season 2', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-30.webp',
                'first_aired' => '2022-03-03',
                'last_aired' => '2022-09-29',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $powerranger,
                'fullname' => 'Power Ranger Cosmic Fury',
                'name' => 'Cosmic Fury',
                'slug' => Str::slug('Cosmic Fury', '-'),
                'description' => null,
                'img' => 'category/power-rangers-logo-31.webp',
                'first_aired' => '2023-09-29',
                'last_aired' => '2023-09-29',
            ],
        ]);

        foreach ($data as $item) {

            $category = Category::firstOrNew([
                'slug' => $item['slug'],
            ]);

            $category->fill($item);

            if ($category->isDirty()) {
                $category->save();
            }
        }
    }

    private function era(string $name): int
    {
        $era = Era::firstOrNew([
            'name' => $name,
        ]);

        $era->slug = Str::slug($name);

        if ($era->isDirty()) {
            $era->save();
        }

        return $era->id;
    }

    private function franchise(string $name): int
    {
        $franchise = Franchise::firstOrNew([
            'name' => $name,
        ]);

        $franchise->slug = Str::slug($name);

        if ($franchise->isDirty()) {
            $franchise->save();
        }

        return $franchise->id;
    }
}
