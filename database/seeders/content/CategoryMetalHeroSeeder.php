<?php

namespace Database\Seeders\Content;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryMetalHeroSeeder extends Seeder
{
    public function run(): void
    {
        $showa = $this->Era('Showa');
        $heisei = $this->Era('Heisei');
        $metalhero = $this->Franchise('Metal Hero');

        $data = collect([
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Uchuu Keiji Gavan',
                'name' => 'Gavan',
                'slug' => Str::slug('Gavan', '-'),
                'description' => null,
                'img' => 'category/metal-hero-1.webp',
                'first_aired' => '1982-03-05',
                'last_aired' => '1983-02-25',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Uchuu Keiji Sharivan',
                'name' => 'Sharivan',
                'slug' => Str::slug('Sharivan', '-'),
                'description' => null,
                'img' => 'category/metal-hero-2.webp',
                'first_aired' => '1983-03-04',
                'last_aired' => '1984-02-24',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Uchuu Keiji Shaider',
                'name' => 'Shaider',
                'slug' => Str::slug('Shaider', '-'),
                'description' => null,
                'img' => 'category/metal-hero-3.webp',
                'first_aired' => '1984-03-02',
                'last_aired' => '1985-03-01',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Kyojuu Tokusou Juspion',
                'name' => 'Juspion',
                'slug' => Str::slug('Juspion', '-'),
                'description' => null,
                'img' => 'category/metal-hero-4.webp',
                'first_aired' => '1985-03-15',
                'last_aired' => '1986-03-24',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Jikuu Senshi Spielvan',
                'name' => 'Spielvan',
                'slug' => Str::slug('Spielvan', '-'),
                'description' => null,
                'img' => 'category/metal-hero-5.webp',
                'first_aired' => '1986-04-07',
                'last_aired' => '1987-03-09',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Choujinki Metalder',
                'name' => 'Metalder',
                'slug' => Str::slug('Metalder', '-'),
                'description' => null,
                'img' => 'category/metal-hero-6.webp',
                'first_aired' => '1987-03-16',
                'last_aired' => '1988-01-17',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Sekai Ninja Sen Jiraiya',
                'name' => 'Jiraiya',
                'slug' => Str::slug('Jiraiya', '-'),
                'description' => null,
                'img' => 'category/metal-hero-7.webp',
                'first_aired' => '1988-01-24',
                'last_aired' => '1989-01-22',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Kidou Keiji Jiban',
                'name' => 'Jiban',
                'slug' => Str::slug('Jiban', '-'),
                'description' => null,
                'img' => 'category/metal-hero-8.webp',
                'first_aired' => '1989-01-29',
                'last_aired' => '1990-01-28',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokkei Winspector',
                'name' => 'Winspector',
                'slug' => Str::slug('Winspector', '-'),
                'description' => null,
                'img' => 'category/metal-hero-9.webp',
                'first_aired' => '1990-02-04',
                'last_aired' => '1991-01-13',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokkyuu Shirei Solbrain',
                'name' => 'Solbrain',
                'slug' => Str::slug('Solbrain', '-'),
                'description' => null,
                'img' => 'category/metal-hero-10.webp',
                'first_aired' => '1991-01-20',
                'last_aired' => '1992-01-26',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokusou Exceedraft',
                'name' => 'Exceedraft',
                'slug' => Str::slug('Exceedraft', '-'),
                'description' => null,
                'img' => 'category/metal-hero-11.webp',
                'first_aired' => '1992-02-02',
                'last_aired' => '1993-01-24',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokusou Robo Janperson',
                'name' => 'Janperson',
                'slug' => Str::slug('Janperson', '-'),
                'description' => null,
                'img' => 'category/metal-hero-12.webp',
                'first_aired' => '1993-01-31',
                'last_aired' => '1994-01-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Blue SWAT',
                'name' => 'Blue SWAT',
                'slug' => Str::slug('Blue SWAT', '-'),
                'description' => null,
                'img' => 'category/metal-hero-13.webp',
                'first_aired' => '1994-01-30',
                'last_aired' => '1995-01-29',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Juuko Bettle Fighter',
                'name' => 'Juuko B-Fighter',
                'slug' => Str::slug('Juuko B-Fighter', '-'),
                'description' => null,
                'img' => 'category/metal-hero-14.webp',
                'first_aired' => '1995-02-05',
                'last_aired' => '1996-02-25',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Bettle Fighter Kabuto',
                'name' => 'B-Fighter Kabuto',
                'slug' => Str::slug('B-Fighter Kabuto', '-'),
                'description' => null,
                'img' => 'category/metal-hero-15.webp',
                'first_aired' => '1996-03-03',
                'last_aired' => '1997-02-16',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Bettle Robo Kabutack',
                'name' => 'B-Robo Kabutack',
                'slug' => Str::slug('B-Robo Kabutack', '-'),
                'description' => null,
                'img' => 'category/metal-hero-16.webp',
                'first_aired' => '1997-02-23',
                'last_aired' => '1998-03-01',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tetsuwan Tantei Robotack',
                'name' => 'Robotack',
                'slug' => Str::slug('Robotack', '-'),
                'description' => null,
                'img' => 'category/metal-hero-17.webp',
                'first_aired' => '1998-03-08',
                'last_aired' => '1999-01-24',
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
