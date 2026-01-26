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
                'description' => 'Ultraman (ウルトラマン, Urutoraman) is a Japanese tokusatsu television series that first aired in 1966 and is a follow-up to the television series Ultra Q, though technically it is not a sequel to it or a spin-off of it. The show was produced by the Tsuburaya Productions, and was broadcast on Tokyo Broadcasting System (TBS) from July 17, 1966 to April 9, 1967, with a total of 39 episodes (40, counting the pre-premiere special that aired on July 10, 1966).',
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
                'description' => 'Ultraseven (ウルトラセブン, Urutorasebun) is the third entry of the Ultraman Series, created by Tsuburaya Productions. Contrasting Ultraman before it with its various monsters, Ultraseven expands much more on the concepts of alien invasions and militarism. Ultraseven was originally conceived to be a separate entry to Ultraman until Return of Ultraman later retconned the two continuities into one.',
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
                'description' => 'Return of Ultraman (帰ってきたウルトラマン, Kaettekita Urutoraman) is a tokusatsu SF/Kaiju/superhero TV series, and is the fourth entry in the Ultraman Series. The series can be watched on Shout! TV, Roku, Tubi, Pluto, and Prime Video.',
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
                'description' => 'Ultraman Ace (ウルトラマンAエース, Urutoraman Ēsu) is the fifth show in the Ultraman Series, and it contains 52 episodes. It was aired on the Tokyo Broadcasting System from April 7, 1972 to March 30, 1973.',
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
                'description' => 'Ultraman Taro (ウルトラマンタロウ, Urutoraman Tarō) is the sixth entry of the Ultraman Series. It aired on Tokyo Broadcasting System from April 6, 1973 to April 5, 1974.',
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
                'description' => 'Ultraman Leo (ウルトラマンレオ, Urutoraman Reo) is the seventh entry in the Ultraman Series, airing from 1974 to 1975. It had a much darker theme than the preceding Ultraman Taro.',
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
                'description' => 'Ultraman 80 (ウルトラマン80エイティ, Urutoraman Eiti) is the 9th entry of the Ultraman Series, created by Tsuburaya Productions. The series aired from April 2, 1980, to March 25, 1981, following The☆Ultraman, and marked the franchise\'s return to its original live-action format.',
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
                'description' => 'Zoffy (ゾフィー, Zofī) is the commander of the Inter Galactic Defense Force, as well as the second member and leader of the Ultra Brothers. He first appeared in the final episode of the original Ultraman TV series, thus becoming the very second Ultra-being from Nebula M78 to go to Earth. Zoffy reappeared many times later, helping the other Ultra Brothers through various difficult situations.',
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
                'description' => 'Ultraman Tiga (ウルトラマンティガ, Urutoraman Tiga) is the 12th entry in the Ultraman Series, airing from September 7, 1996 to August 30, 1997. It was the first Ultraman Series broadcast in Japan since 1980\'s Ultraman 80. The series is notable for revolutionizing and revitalizing the franchise, not to mention the great effect it had on the tokusatsu genre as a whole outside of Tsuburaya.',
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
                'description' => 'Ultraman Dyna (ウルトラマンダイナ, Urutoraman Daina) is the 13th entry in the Ultraman Series which aired between September 6, 1997 until August 29, 1998. The series is a direct sequel to the previous Ultraman series, Ultraman Tiga.',
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
                'description' => 'Ultraman Gaia (ウルトラマンガイア, Urutoraman Gaia) is a Japanese tokusatsu TV show and is the 14th show in the Ultraman Series. It was created by Chiaki J. Konaka and produced by Tsuburaya Productions and Mainichi Broadcasting System.',
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
                'description' => 'Ultraman Neos (ウルトラマンネオス, Urutoraman Neosu) is a Japanese tokusatsu show, being the 15th show in the Ultraman Series produced by Tsuburaya Productions. Neos was initially intended as a TV series, having a pilot episode, stage shows, and merchandise, but the project was shelved. Years later, Tsuburaya turned the concept into a 12-episode direct-to-video series. In spite of the appearance of similar designs and cameos by Zoffy, the series is set in an alternate universe.',
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
                'description' => 'Ultraman Cosmos (ウルトラマンコスモス, Urutoraman Kosumosu) is a Japanese tokusatsu TV show and the 16th show in the Ultraman Series. Produced by Tsuburaya Productions, the series aired from July 7, 2001 to September 28, 2002, with a total of 65 episodes, which currently makes it the longest running Ultra show to date. Ultraman Cosmos was also produced coinciding with the 35th anniversary of the franchise.',
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
                'description' => 'Ultraman Nexus (ウルトラマンネクサス, Urutoraman Nekusasu) ran from October 2nd, 2004, to June 25th, 2005, as the 17th entry in the Ultraman Series, and the third and final product of the Ultra N Project. Although known for featuring a more serious, adult, and atmospheric story than its predecessor, Ultraman Cosmos, it was also intended as a re-imagining or reboot of the original Ultraman.',
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
                'description' => 'Ultraman Max (ウルトラマンマックス, Urutoraman Makkusu) is the 18th entry in the Ultraman Series, and aired from July 2, 2005 to March 25, 2006. After the darker series Ultraman Nexus, Tsuburaya Productions opted for a more traditional formula with weekly monsters and a lighter theme.',
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
                'description' => 'Ultraman Mebius (ウルトラマンメビウス, Urutoraman Mebiusu) is the 19th entry of the Ultraman Series, created by Tsuburaya Productions and Chubu-Nippon Broadcasting. It premiered on the Tokyo Broadcasting System on April 8, 2006 and ended on March 31, 2007.',
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
                'description' => 'Ultraman Ginga (ウルトラマンギンガ, Urutoraman Ginga) is a Japanese television series produced by Tsuburaya Productions, which celebrates the 50th anniversary of the company and was part of the New Ultraman Retsuden (新ウルトラマン列伝, Shin Urutoraman Retsuden) programming block on TV Tokyo.',
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
                'description' => 'Ultraman Ginga S (ウルトラマンギンガSエス, Urutoraman Ginga Esu) is a Japanese television series produced by Tsuburaya Productions which continues the previous series timeline. It aired during the New Ultraman Retsuden programming block on TV Tokyo, with its first half airing from July 15, 2014 to September 2 and its second half airing from November 4 to December 23.',
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
                'description' => 'Ultraman X (ウルトラマンＸエックス, Urutoraman Ekkusu) is the 25th entry in the Ultraman Series. It aired in mid-July as part of New Ultraman Retsuden. This was the final show to be featured on the New Ultraman Retsuden block before it came to an end on July 2016.',
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
                'description' => 'Ultraman Orb (ウルトラマンオーブ, Urutoraman Ōbu) is the 26th entry in the Ultraman Series, and was created to celebrate the 50th anniversary of Ultraman and the 20th anniversary of Ultraman Tiga.[1] It aired from July 9, 2016 to December 24, 2016. This series is not part of New Ultraman Retsuden and therefore aired on Saturdays instead of Tuesdays. It is the first show since Ultraman Mebius to air on Saturdays. It is Chapter 6 of the Ultraman Orb Chronicle.',
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
                'description' => 'Ultraman Geed (ウルトラマンジード, Ultraman Jīdo) is the 27th entry of Tsuburaya Productions Ultraman Series.',
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
                'description' => 'Ultraman R/BRuebe (ウルトラマンＲ／Ｂルーブ, Urutoraman Rūbu)[1] is the 28th entry of the Ultraman Series, created by Tsuburaya Productions.',
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
                'description' => 'Ultraman Taiga (ウルトラマンタイガ, Urutoraman Taiga) is the 29th entry of the Ultraman Series, created by Tsuburaya Productions. It is the first Ultraman series to be broadcast in the Reiwa era.',
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
                'description' => 'Ultraman Z (Zett) (ウルトラマンＺゼット, Urutoraman Zetto) is the 30th entry of the Ultraman Series, created by Tsuburaya Productions. In addition to airing on TV networks, the series was aired with English subtitles on Tsuburaya Productions official YouTube channel.',
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
                'description' => 'Ultraman Trigger: New Generation Tiga (ウルトラマントリガー NEW GENERATION TIGAニュージェネレーションティガ, Urutoraman Torigā Nyū Jenerēshon Tiga) is the 31st entry of the Ultraman Series, created by Tsuburaya Productions in commemoration of Ultraman Tiga\'s 25th anniversary.',
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
                'description' => 'Ultraman Decker (ウルトラマンデッカー, Urutoraman Dekkā) is the 32nd entry of the Ultraman Series, created by Tsuburaya Productions in commemoration of Ultraman Dyna\'s 25th anniversary. It is a sequel to Ultraman Trigger: New Generation Tiga.',
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
                'description' => 'Ultraman Blazar (ウルトラマンブレーザー, Urutoraman Burēzā) is the 33rd entry of the Ultraman Series, created by Tsuburaya Productions.[3][4] It is the first in the franchise for each episode to be released with English, Mandarin Chinese, Cantonese, Taiwanese Mandarin, Thai, Indonesian, Malay and Hindi dubs within a week of their original airing in Japan.',
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
                'description' => 'Ultraman Arc (ウルトラマンアーク, Urutoraman Āku) is the 34th entry of the Ultraman Series, created by Tsuburaya Productions. It was first announced through a teaser trailer uploaded on April 5, 2024.',
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
                'description' => 'Ultraman Omega (ウルトラマンオメガ, Urutoraman Omega) is the 35th entry of the Ultraman Series, created by Tsuburaya Productions. It was first teased on March 21, 2025 and fully unveiled through a trailer uploaded on April 24.',
                'img' => 'category/reiwa-7-ultraman-logo.webp',
                'first_aired' => '2025-07-05',
                'last_aired' => '2026-01-17',
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
