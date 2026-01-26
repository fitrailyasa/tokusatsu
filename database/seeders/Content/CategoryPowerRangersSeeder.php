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
                'description' => 'The first season of Mighty Morphin Power Rangers is the 1st overall season of Power Rangers, serving as an adaptation of the Super Sentai series Kyoryu Sentai Zyuranger. The season follows a group of "teenagers with atittude" recruited by Zordon to fight the awakening Rita Repulsa and her goons.',
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
                'description' => 'The second season of Mighty Morphin Power Rangers is the 2nd overall season of Power Rangers, serving as an adaptation of Kyoryu Sentai Zyuranger while borrowing elements of Gosei Sentai Dairanger. The season follows the arrival of Lord Zedd on Earth, requiring the Rangers to grow stronger in order to fight him.',
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
                'description' => 'The third and final season of Mighty Morphin Power Rangers is the 3rd season of Power Rangers, serving as an adaptation of Kyoryu Sentai Zyuranger while borrowing elements from Ninja Sentai Kakuranger. The series follows the Rangers as they prepare for Lord Zedd and Rita\'s final assault on Earth.',
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
                'description' => 'Mighty Morphin Alien Rangers is an American superhero drama serving as an adaptation of the 18th Super Sentai series, Ninja Sentai Kakuranger. It is a mini-series that serves as a bridge between Mighty Morphin Power Rangers and Power Rangers Zeo, and directly continues the narrative established in the 3rd Season of MMPR. As the now-child Rangers are now unable to fight, it forces Zordon to recruit the Alien Rangers of Aquitar to assist the team until they can regain their adult selves.',
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
                'description' => 'Power Rangers Zeo is an American superhero drama serving as an adaptation of the 19th Super Sentai series Choriki Sentai Ohranger, and is the fourth installment of the Power Rangers franchise. Set directly following the finale of Mighty Morphin Alien Rangers which saw the destruction of the Rangers Command Center, the Rangers scramble to recover by discovering the Zeo Crystal, which grants them new powers needed to fight the impending Machine Empire.',
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
                'description' => 'Power Rangers Turbo is an American superhero drama serving as an adaptation of the 20th Super Sentai series Gekiso Sentai Carranger and is the fifth installment of the Power Rangers franchise. Premiering with the prologue film Turbo: A Power Rangers Movie, Zordon and Alpha 5 grant the now-former Zeo Rangers new powers to fight against the barbaric space pirate Divatox and stop her from unleashing havoc across the universe. Unlike other series, it is the only series to have five Rangers on the team from start to finish.',
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
                'description' => 'Power Rangers in Space is an American superhero drama serving as an adaptation of the 21th Super Sentai series Denji Sentai Megaranger and is the sixth installment of the Power Rangers franchise. The season picks up directly following the end of Power Rangers Turbo and concludes the six-year long Zordon Era, ending the practice of a continuous serial-style show with a regular cast that carried over from one season to the next. In the season, the former Turbo Rangers leave Earth behind to chase after Divatox into space, where they meet Andros and come into conflict with the United Alliance of Evil.',
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
                'description' => 'Power Rangers Lost Galaxy is an American superhero drama serving as an adaptation of the 22nd Super Sentai series Seiju Sentai Gingaman, and is the seventh installment of Power Rangers. The season follows a group of Earth immigrants aboard Terra Venture who become Power Rangers on the planet Mirinoi and protect the galaxy from the intergalactic terrorist Trakeena.',
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
                'description' => 'Power Rangers Lightspeed Rescue is an American superhero drama serving as an adaptation of the 23rd Super Sentai series Kyukyu Sentai GoGoFive and is the eighth installment of Power Rangers. The season follows a group of Rangers chosen by Lightspeed Aquabase Captain Mitchell to defend Mariner Bay from demons.',
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
                'description' => 'Power Rangers Time Force is an American superhero drama serving as an adaptation of the 24th Super Sentai series Mirai Sentai Timeranger, and is the ninth installment of Power Rangers. The series follows a group of Rangers from the far future who defend the timeline from the criminal Ransik.',
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
                'description' => 'Power Rangers Wild Force is an American superhero drama serving as an adaptation of the 25th Super Sentai series Hyakuju Sentai Gaoranger and is the 10th installment of Power Rangers. The series follows a group of Rangers who defend the world mutant Orgs who threaten to pollute the world.',
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
                'description' => 'Power Rangers Ninja Storm is an American superhero drama serving as an adaptation of the 26th Super Sentai series, and is the 11th installment of Power Rangers. It is the first season to be fully produced by Disney following its acquisition of the franchise mid-season into Wild Force, and aired exclusively on ABC Kids from beginning to end.',
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
                'description' => 'Power Rangers Dino Thunder is an American superhero drama serving as an adaptation of the 27th Super Sentai season Bakuryu Sentai Abaranger, and is the 12th season of Power Rangers. The show aired simultaneously on ABC Kids and Toon Disney and ABC Family\'s Jetix block.',
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
                'description' => 'Power Rangers S.P.D. is an American superhero drama serving as an adaptation of the 28th Super Sentai series Tokuso Sentai Dekaranger, and is the 13th season of Power Rangers. The show began airing on ABC Family before moving exclusively to Toon Disney\'s Jetix block for the show\'s second half.',
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
                'description' => 'Power Rangers Mystic Force is an American superhero drama serving as an adaptation of the 29th Super Sentai series, Mahou Sentai Magiranger, and is the 14th installment of Power Rangers. The show follows a group of young men and women chosen to defend Briarwood and Root Core from the Morlocks as Power Rangers.',
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
                'description' => 'Power Rangers Operation Overdrive is an American superhero drama serving as an adaptation of the 30th Super Sentai series GoGo Sentai Boukenger, and is the 15th installment of Power Rangers. The series follows a group of talented individuals chosen by Andrew Hartford to recover the Corona Aurora and defend the world from several villainous organizations as Power Rangers.',
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
                'description' => 'Power Rangers Jungle Fury is an American superhero drama serving as an adaptation of the 31st Super Sentai series Juken Sentai Gekiranger, and is the 16th installment of Power Rangers. The series follows a group of young martial artists chosen to defend the world as Power Rangers from Dai Shi, an evil spirit who was accidentally unleashed upon the world.',
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
                'description' => 'Power Rangers RPM is an American superhero drama serving as an adaptation of the 32nd Super Sentai series Engine Sentai Go-Onger, and is the 17th installment of Power Rangers. The series takes place in an alternate world enslaved by the Venjix Virus worldwide. As part of humanity is forced to live in the domed city of Corinth, Doctor K assembles the Ranger Operators to defend their last home while fighting against Venjix in the hopes of one day liberating their world. Plot elements of the series are carried over into its sequel Power Rangers Beast Morphers.',
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
                'description' => 'Power Rangers Samurai is an American superhero drama and the 18th season of Power Rangers, adapting the first half of the 33rd Super Sentai season, Samurai Sentai Shinkenger.',
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
                'description' => 'Power Rangers Super Samurai is an American superhero drama and the 19th installment of Power Rangers. It is the sequel season to Power Rangers Samurai and adapts the second half of the 33rd Super Sentai series, Samurai Sentai Shinkenger.',
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
                'description' => 'Power Rangers Megaforce is an American superhero drama and the 20th installment of Power Rangers, serving to commemorate the franchise\'s 20th anniversary. It adapts footage, props, and elements from the 34th Super Sentai series, Tensou Sentai Goseiger.',
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
                'description' => 'Power Rangers Super Megaforce is an American superhero drama and the 21st season of Power Rangers, serving to commemorate the franchise\'s 20th anniversary. It is the sequel season to Power Rangers Megaforce and adapts both the 34th and 35th Super Sentai series, Tensou Sentai Goseiger and Kaizoku Sentai Gokaiger.',
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
                'description' => 'Power Rangers Dino Charge is an American superhero drama and the 22nd installment of Power Rangers, adapting the first half of the 37th Super Sentai series Zyuden Sentai Kyoryuger. A second season covering the second half of Kyoryuger premiered in the following year.',
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
                'description' => 'Power Rangers Dino Super Charge is an American superhero drama and the 23rd installment of Power Rangers. It is the sequel season to Power Rangers Dino Charge and adapts the second half of the 37th Super Sentai series Zyuden Sentai Kyoryuger.',
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
                'description' => 'Power Rangers Ninja Steel is an American superhero drama and the 24th installment of Power Rangers, adapting the first half of the 39th Super Sentai series Shuriken Sentai Ninninger. A second season covering the second half premiered the following year.',
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
                'description' => 'Power Rangers Super Ninja Steel is an American superhero drama and the 25th installment of Power Rangers, serving to commemorate the franchise\'s 25th Anniversary. It is a sequel season to Power Rangers Ninja Steel and adapts the second half of the 39th Super Sentai series Shuriken Sentai Ninninger. This is the final season produced by Saban Brands before the franchise\'s acquisition by Hasbro.',
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
                'description' => 'Power Rangers Beast Morphers is an American superhero drama serving as an adaptation of the 36th Super Sentai series Tokumei Sentai Go-Busters, and is both the 26th and 27th installments of Power Rangers. This is the first season produced by Hasbro under their Allspark Pictures division, who acquired the franchise from Saban Brands following the finale of Power Rangers Super Ninja Steel.',
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
                'description' => 'Power Rangers Beast Morphers is an American superhero drama serving as an adaptation of the 36th Super Sentai series Tokumei Sentai Go-Busters, and is both the 26th and 27th installments of Power Rangers. This is the first season produced by Hasbro under their Allspark Pictures division, who acquired the franchise from Saban Brands following the finale of Power Rangers Super Ninja Steel.',
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
                'description' => 'Power Rangers Dino Fury is an American superhero drama serving as an adaptation of the 43rd Super Sentai series Kishiryu Sentai Ryusoulger, and is both the 28th and 29th installments of the Power Rangers franchise. The series is Hasbro\'s second production under their film division Allspark Pictures & Entertainment One following their acquisition of the franchise and the final to air on Nickelodeon while transitioning to Netflix.',
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
                'description' => 'Power Rangers Dino Fury is an American superhero drama serving as an adaptation of the 43rd Super Sentai series Kishiryu Sentai Ryusoulger, and is both the 28th and 29th installments of the Power Rangers franchise. The series is Hasbro\'s second production under their film division Allspark Pictures & Entertainment One following their acquisition of the franchise and the final to air on Nickelodeon while transitioning to Netflix.',
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
                'description' => 'Power Rangers Cosmic Fury is an American superhero drama serving as an adaptation of the 41st Super Sentai series Uchu Sentai Kyuranger, and is the 30th installment of the Power Rangers franchise. Commemorating the franchise\'s 30th anniversary, it picks up directly following the end of the final episode of Dino Fury where the Rangers are tasked by the Morphin Masters to re-capture Lord Zedd and fight his new forces throughout outer space.',
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
