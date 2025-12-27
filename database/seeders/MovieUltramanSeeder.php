<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MovieUltramanSeeder extends Seeder
{
    public function run(): void
    {
        $timestamp = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $data = collect([
            // ULTRAMAN
            // Movie
            ['title' => 'Ultra Q The Movie: Legend of the Stars', 'category_id' => $this->Category('ultraman'), 'type' => 'movie', 'number' => 1, 'airdate' => '1990-04-14'],
            ['title' => 'Ultraman Tiga & Ultraman Dyna: Warriors of the Star of Light', 'category_id' => $this->Category('tiga'), 'type' => 'movie', 'number' => 1, 'airdate' => '1998-03-14'],
            ['title' => 'Ultraman Tiga, Ultraman Dyna, & Ultraman Gaia: The Battle in Hyperspace', 'category_id' => $this->Category('tiga'), 'type' => 'movie', 'number' => 2, 'airdate' => '1999-03-06'],
            ['title' => 'Ultraman Tiga: The Final Odyssey', 'category_id' => $this->Category('tiga'), 'type' => 'movie', 'number' => 3, 'airdate' => '2000-03-08'],
            ['title' => 'Ultraman Tiga Side Story: Revival of the Ancient Giant', 'category_id' => $this->Category('tiga'), 'type' => 'movie', 'number' => 4, 'airdate' => '2001-01-25'],
            ['title' => 'Ultraman Dyna: The Return of Hanejiro', 'category_id' => $this->Category('dyna'), 'type' => 'movie', 'number' => 1, 'airdate' => '2001-02-25'],
            ['title' => 'Ultraman Gaia: Once Again Gaia', 'category_id' => $this->Category('gaia'), 'type' => 'movie', 'number' => 1, 'airdate' => '2001-03-25'],
            ['title' => 'Ultraman Cosmos: The First Contact', 'category_id' => $this->Category('cosmos'), 'type' => 'movie', 'number' => 1, 'airdate' => '2001-08-03'],
            ['title' => 'Ultraman Cosmos 2: The Blue Planet', 'category_id' => $this->Category('cosmos'), 'type' => 'movie', 'number' => 2, 'airdate' => '2002-08-03'],
            ['title' => 'Ultraman Cosmos VS Ultraman Justice: The Final Battle', 'category_id' => $this->Category('cosmos'), 'type' => 'movie', 'number' => 3, 'airdate' => '2003-08-02'],
            ['title' => 'Ultraman: The Next', 'category_id' => $this->Category('nexus'), 'type' => 'movie', 'number' => 1, 'airdate' => '2004-12-18'],
            ['title' => 'Ultraman Mebius Side Story: Hikari Saga - Stage 1', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 1, 'airdate' => '2006-06-30'],
            ['title' => 'Ultraman Mebius Side Story: Hikari Saga - Stage 2', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 2, 'airdate' => '2006-06-30'],
            ['title' => 'Ultraman Mebius Side Story: Hikari Saga - Stage 3', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 3, 'airdate' => '2006-06-30'],
            ['title' => 'Ultraman Mebius & Ultraman Brothers', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 4, 'airdate' => '2006-09-16'],
            ['title' => 'Ultraman Mebius Side Story: Armored Darkness - Stage 1', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 5, 'airdate' => '2008-07-25'],
            ['title' => 'Ultraman Mebius Side Story: Armored Darkness - Stage 2', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 6, 'airdate' => '2008-07-25'],
            ['title' => 'Superior Ultraman 8 Brothers', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 7, 'airdate' => '2008-09-13'],
            ['title' => 'Ultraman Mebius Side Story: Ghost Reverse - Stage 1', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 8, 'airdate' => '2009-11-25'],
            ['title' => 'Ultraman Mebius Side Story: Ghost Reverse - Stage 2', 'category_id' => $this->Category('mebius'), 'type' => 'movie', 'number' => 9, 'airdate' => '2009-11-25'],
            ['title' => 'Mega Monster Battle: Ultra Galaxy Legends', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 1, 'airdate' => '2009-12-12'],
            ['title' => 'Ultraman Zero: The Revenge of Belial', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 2, 'airdate' => '2010-12-23'],
            ['title' => 'Ultra Galaxy Legend Side Story: Ultraman Zero VS Darklops Zero - Stage 1', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 3, 'airdate' => '2010-11-26'],
            ['title' => 'Ultra Galaxy Legend Side Story: Ultraman Zero VS Darklops Zero - Stage 2', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 4, 'airdate' => '2010-11-26'],
            ['title' => 'Ultraman Zero Side Story: Killer the Beatstar - Stage 1', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 5, 'airdate' => '2011-11-25'],
            ['title' => 'Ultraman Zero Side Story: Killer the Beatstar - Stage 2', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 6, 'airdate' => '2011-11-25'],
            ['title' => 'Ultraman Saga', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 7, 'airdate' => '2012-03-24'],
            ['title' => 'Ultra Zero Fight: A New Power', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 8, 'airdate' => '2012-08-01'],
            ['title' => 'Ultra Zero Fight: Shining Zero', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 9, 'airdate' => '2012-12-12'],
            ['title' => 'Ultraman Ginga S the Movie: Showdown! Ultra 10 Warriors!', 'category_id' => $this->Category('ginga-s'), 'type' => 'movie', 'number' => 1, 'airdate' => '2015-03-14'],
            ['title' => 'Ultraman X The Movie: Here It Comes! Our Ultraman', 'category_id' => $this->Category('x'), 'type' => 'movie', 'number' => 1, 'airdate' => '2016-03-12'],
            ['title' => "Ultraman Orb The Movie: I'm Borrowing the Power of Your Bonds!", 'category_id' => $this->Category('orb'), 'type' => 'movie', 'number' => 1, 'airdate' => '2017-03-11'],
            ['title' => "Ultraman Geed The Movie: I'll Connect With the Wish!", 'category_id' => $this->Category('geed'), 'type' => 'movie', 'number' => 1, 'airdate' => '2018-03-10'],
            ['title' => 'Ultraman R/B The Movie: Select! The Crystal of Bond!', 'category_id' => $this->Category('rb'), 'type' => 'movie', 'number' => 1, 'airdate' => '2019-03-08'],
            ['title' => 'Ultra Galaxy Fight: New Generation Heroes', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 10, 'airdate' => '2019-09-29'],
            ['title' => 'Ultraman Taiga The Movie: New Generation Climax', 'category_id' => $this->Category('taiga'), 'type' => 'movie', 'number' => 1, 'airdate' => '2020-08-07'],
            ['title' => 'Ultra Galaxy Fight: The Absolute Conspiracy', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 11, 'airdate' => '2020-11-22'],
            ['title' => 'Ultraman Trigger: Episode Z', 'category_id' => $this->Category('trigger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2022-03-18'],
            ['title' => 'Ultra Galaxy Fight: The Destined Crossroad', 'category_id' => $this->Category('zero'), 'type' => 'movie', 'number' => 12, 'airdate' => '2022-04-29'],
            ['title' => 'Ultraman Decker Finale: Journey to Beyond', 'category_id' => $this->Category('decker'), 'type' => 'movie', 'number' => 1, 'airdate' => '2023-02-23'],
            ['title' => 'Ultraman Blazar The Movie: Tokyo Kaiju Showdown', 'category_id' => $this->Category('blazar'), 'type' => 'movie', 'number' => 1, 'airdate' => '2024-02-07'],

            // Mini Series
            ['title' => "Neos Is Born (ネオス誕生, Neosu Tanjō)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 1, 'airdate' => null],
            ['title' => "The Mysterious Dark Matter (謎のダークマター, Nāzo no Dāku Matā)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 2, 'airdate' => null],
            ['title' => "S.O.S from the Sea (海からのS.O.S, Umi kara no S.O.S)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 3, 'airdate' => null],
            ['title' => "The Red Giant! Seven 21 (赤い巨人! セブン21, Akai Kyojin! Sebun 21)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 4, 'airdate' => null],
            ['title' => "Invisible Bonds (見えない絆, Mienai Kizuna)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 5, 'airdate' => null],
            ['title' => "Revenge of Alien Zamu (ザム星人の復讐, Zamu Seijin no Fukushū)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 6, 'airdate' => null],
            ['title' => "King of the Biosphere (生態系の王, Seitaikei no Ō)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 7, 'airdate' => null],
            ['title' => "Revive the Earth - HEART To The South (蘇る地球 HEART南へ!, Yomigaeru Chikyū - HEART Minami e)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 8, 'airdate' => null],
            ['title' => "Our Dino-Coaster (僕らの恐竜コースター, Bokura no Kyōryū Kōsutā)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 9, 'airdate' => null],
            ['title' => "Decide! SX Rescue Operation (決断せよ! SX救出作戦, Ketsudan Seyo! SX Kyūshutsu Sakusen)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 10, 'airdate' => null],
            ['title' => "The Assassin-Beast from Space (宇宙からの暗殺獣, Uchū Kara no Ansatsu-jū)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 11, 'airdate' => null],
            ['title' => "Warriors of Light, Forever (光の戦士よ永遠に, Hikari no Senshi yo Towa ni)", 'category_id' => $this->Category('neos'), 'type' => 'mini-series', 'number' => 12, 'airdate' => null],

        ])->map(function ($item) use ($timestamp) {

            $category = Category::find($item['category_id']);

            $item['slug'] = \Illuminate\Support\Str::slug(
                "{$category->fullname} {$item['type']} {$item['number']}"
            );

            return array_merge($item, $timestamp);
        });

        DB::table('videos')->insert($data->toArray());
    }

    private function Category(string $slug): string
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            $category = Category::create([
                'slug' => $slug,
            ]);
        }
        return $category->id;
    }
}
