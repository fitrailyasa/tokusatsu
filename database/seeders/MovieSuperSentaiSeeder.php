<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MovieSuperSentaiSeeder extends Seeder
{
    public function run(): void
    {
        $timestamp = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $data = collect([
            // SUPER SENTAI
            // Movie
            ['title' => 'Himitsu Sentai Gorenger: The Bomb Hurricane', 'category_id' => $this->Category('gorenger'), 'type' => 'movie', 'number' => 1, 'airdate' => '1976-07-22'],
            ['title' => 'J.A.K.Q. Dengekitai vs Gorenger', 'category_id' => $this->Category('jakq'), 'type' => 'movie', 'number' => 1, 'airdate' => '1978-03-18'],
            ['title' => 'Battle Fever J: The Movie', 'category_id' => $this->Category('fever-j'), 'type' => 'movie', 'number' => 1, 'airdate' => '1979-07-29'],
            ['title' => 'Denshi Sentai Denjiman: The Movie', 'category_id' => $this->Category('denjiman'), 'type' => 'movie', 'number' => 1, 'airdate' => '1980-07-12'],
            ['title' => 'Taiyo Sentai Sun Vulcan: The Movie', 'category_id' => $this->Category('sun-vulcan'), 'type' => 'movie', 'number' => 1, 'airdate' => '1981-07-18'],
            ['title' => 'Dai Sentai Goggle-V: The Movie', 'category_id' => $this->Category('goggle-v'), 'type' => 'movie', 'number' => 1, 'airdate' => '1982-03-13'],
            ['title' => 'Kagaku Sentai Dynaman: The Movie', 'category_id' => $this->Category('dynaman'), 'type' => 'movie', 'number' => 1, 'airdate' => '1983-03-12'],
            ['title' => 'Dengeki Sentai Changeman: The Movie', 'category_id' => $this->Category('changeman'), 'type' => 'movie', 'number' => 1, 'airdate' => '1985-03-16'],
            ['title' => 'Dengeki Sentai Changeman: Shuttle Base! The Critical Moment!', 'category_id' => $this->Category('changeman'), 'type' => 'movie', 'number' => 2, 'airdate' => '1985-07-13'],
            ['title' => 'Choushinsei Flashman: The Movie', 'category_id' => $this->Category('flashman'), 'type' => 'movie', 'number' => 1, 'airdate' => '1986-03-15'],
            ['title' => 'Hikari Sentai Maskman: The Movie', 'category_id' => $this->Category('maskman'), 'type' => 'movie', 'number' => 1, 'airdate' => '1987-07-18'],
            ['title' => 'Kousoku Sentai Turboranger: The Movie', 'category_id' => $this->Category('turboranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '1989-03-18'],
            ['title' => 'Gosei Sentai Dairanger: The Movie', 'category_id' => $this->Category('dairanger'), 'type' => 'movie', 'number' => 1, 'airdate' => '1993-04-17'],
            ['title' => 'Ninja Sentai Kakuranger: The Movie', 'category_id' => $this->Category('kakuranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '1994-04-04'],
            ['title' => 'Super Sentai World', 'category_id' => $this->Category('kakuranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '1994-08-06'],
            ['title' => 'Chouriki Sentai Ohranger: The Movie', 'category_id' => $this->Category('ohranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '1995-04-15'],
            ['title' => 'Chouriki Sentai Ohranger: Ole vs Kakuranger', 'category_id' => $this->Category('ohranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '1996-03-08'],
            ['title' => 'Gekisou Sentai Carranger vs Ohranger', 'category_id' => $this->Category('carranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '1997-03-14'],
            ['title' => 'Denji Sentai Megaranger vs Carranger', 'category_id' => $this->Category('megaranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '1998-03-13'],
            ['title' => 'Seijuu Sentai Gingaman vs Megaranger', 'category_id' => $this->Category('gingaman'), 'type' => 'movie', 'number' => 1, 'airdate' => '1999-03-12'],
            ['title' => 'Kyuukyuu Sentai GoGoFive: Sudden Shock! A New Warrior!', 'category_id' => $this->Category('gogofive'), 'type' => 'movie', 'number' => 1, 'airdate' => '1999-07-09'],
            ['title' => 'Kyuukyuu Sentai GoGoFive vs Gingaman', 'category_id' => $this->Category('gogofive'), 'type' => 'movie', 'number' => 2, 'airdate' => '2000-03-10'],
            ['title' => 'Mirai Sentai Timeranger vs GoGoFive', 'category_id' => $this->Category('timeranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2001-03-09'],
            ['title' => 'Hyakujuu Sentai Gaoranger: The Fire Mountain Roars', 'category_id' => $this->Category('gaoranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2001-08-10'],
            ['title' => 'Hyakujuu Sentai Gaoranger vs Super Sentai', 'category_id' => $this->Category('gaoranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2001-09-22'],
            ['title' => 'Ninpuu Sentai Hurricaneger Shushuuto: The Movie', 'category_id' => $this->Category('hurricaneger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2002-08-17'],
            ['title' => 'Ninpuu Sentai Hurricaneger vs Gaoranger', 'category_id' => $this->Category('hurricaneger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2003-03-14'],
            ['title' => 'Ninpuu Sentai Hurricaneger: 10 Years After', 'category_id' => $this->Category('hurricaneger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2003-08-09'],
            ['title' => 'Bakuryu Sentai Abaranger Deluxe: Abare Summer is Freezing Cold', 'category_id' => $this->Category('abaranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2003-08-16'],
            ['title' => 'Bakuryuu Sentai Abaranger vs Hurricaneger', 'category_id' => $this->Category('abaranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2004-03-12'],
            ['title' => 'Tokusou Sentai Dekaranger The Movie: Full Blast Action', 'category_id' => $this->Category('dekaranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2004-09-11'],
            ['title' => 'Tokusou Sentai Dekaranger vs Abaranger', 'category_id' => $this->Category('dekaranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2005-03-11'],
            ['title' => 'Tokusou Sentai Dekaranger: 10 Years After', 'category_id' => $this->Category('dekaranger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2015-11-07'],
            ['title' => 'Mahou Sentai Magiranger The Movie: Bride of Infershia', 'category_id' => $this->Category('magiranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2005-09-03'],
            ['title' => 'Mahou Sentai Magiranger vs Dekaranger', 'category_id' => $this->Category('magiranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2006-03-10'],
            ['title' => 'GoGo Sentai Boukenger The Movie: The Greatest Precious', 'category_id' => $this->Category('boukenger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2006-08-05'],
            ['title' => 'GoGo Sentai Boukenger vs Super Sentai', 'category_id' => $this->Category('boukenger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2007-03-31'],
            ['title' => 'Juken Sentai Gekiranger: Hong Kong Decisive Battle', 'category_id' => $this->Category('gekiranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2007-08-04'],
            ['title' => 'Juken Sentai Gekiranger vs Boukenger', 'category_id' => $this->Category('gekiranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2008-03-14'],
            ['title' => 'Engine Sentai Go-onger: Boom Boom! Bang Bang!', 'category_id' => $this->Category('go-onger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2008-08-09'],
            ['title' => 'Engine Sentai Go-onger vs Gekiranger', 'category_id' => $this->Category('go-onger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2009-03-21'],
            ['title' => 'Engine Sentai Go-onger: 10 Years Grand Prix', 'category_id' => $this->Category('go-onger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2018-09-26'],
            ['title' => 'Samurai Sentai Shinkenger The Movie: The Fateful War', 'category_id' => $this->Category('shinkenger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2009-08-08'],
            ['title' => 'Samurai Sentai Shinkenger vs Go-onger: GinmakuBang!', 'category_id' => $this->Category('shinkenger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2010-01-30'],
            ['title' => 'Samurai Sentai Shinkenger Returns: Special Act', 'category_id' => $this->Category('shinkenger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2010-06-21'],
            ['title' => 'Tensou Sentai Goseiger: Epic on the Movie', 'category_id' => $this->Category('goseiger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2010-08-07'],
            ['title' => 'Tensou Sentai Goseiger vs Shinkenger: Epic on Ginmaku', 'category_id' => $this->Category('goseiger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2011-01-22'],
            ['title' => 'Tensou Sentai Goseiger Returns: Last Epic', 'category_id' => $this->Category('goseiger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2011-07-21'],
            ['title' => 'Gokaiger Goseiger Super Sentai 199 Hero Great Battle', 'category_id' => $this->Category('gokaiger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2011-05-21'],
            ['title' => 'Kaizoku Sentai Gokaiger The Movie: The Flying Ghost Ship', 'category_id' => $this->Category('gokaiger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2011-08-06'],
            ['title' => 'Kaizoku Sentai Gokaiger vs Space Sheriff Gavan: The Movie', 'category_id' => $this->Category('gokaiger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2012-01-21'],
            ['title' => 'Tokumei Sentai Go-Busters The Movie: Protect the Tokyo Enetower!', 'category_id' => $this->Category('go-busters'), 'type' => 'movie', 'number' => 1, 'airdate' => '2012-08-04'],
            ['title' => 'Tokumei Sentai Go-Busters vs Kaizoku Sentai Gokaiger: The Movie', 'category_id' => $this->Category('go-busters'), 'type' => 'movie', 'number' => 2, 'airdate' => '2013-01-19'],
            ['title' => 'Tokumei Sentai Go-Busters Returns vs Doubutsu Sentai Go-Busters', 'category_id' => $this->Category('go-busters'), 'type' => 'movie', 'number' => 3, 'airdate' => '2013-06-21'],
            ['title' => 'Zyuden Sentai Kyoryuger The Movie: Gaburincho of Music', 'category_id' => $this->Category('kyoryuger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2013-08-03'],
            ['title' => 'Zyuden Sentai Kyoryuger vs Go-Busters: The Great Dinosaur War', 'category_id' => $this->Category('kyoryuger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2014-01-18'],
            ['title' => 'Zyuden Sentai Kyoryuger Returns: 100 Years After', 'category_id' => $this->Category('kyoryuger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2014-06-20'],
            ['title' => 'Ressha Sentai ToQger vs Kamen Rider Gaim: Spring Break Combined Special', 'category_id' => $this->Category('toqger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2014-03-30'],
            ['title' => 'Ressha Sentai ToQger The Movie: Galaxy Line S.O.S.', 'category_id' => $this->Category('toqger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2014-07-19'],
            ['title' => 'Ressha Sentai ToQger vs Kyoryuger: The Movie', 'category_id' => $this->Category('toqger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2015-01-17'],
            ['title' => 'Ressha Sentai ToQger Returns: Super ToQ 7Gou of Dreams', 'category_id' => $this->Category('toqger'), 'type' => 'movie', 'number' => 4, 'airdate' => '2015-06-24'],
            ['title' => 'Shuriken Sentai Ninninger vs Kamen Rider Drive: Spring Vacation', 'category_id' => $this->Category('ninninger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2015-03-29'],
            ['title' => 'Shuriken Sentai Ninninger The Movie: The Dinosaur Lord\'s Splendid Ninja Scroll!', 'category_id' => $this->Category('ninninger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2015-08-08'],
            ['title' => 'Shuriken Sentai Ninninger vs ToQger The Movie: Ninjas in Wonderland', 'category_id' => $this->Category('ninninger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2016-01-23'],
            ['title' => 'Shuriken Sentai Ninninger Returns: Ninnin Girls vs Boys Final Wars', 'category_id' => $this->Category('ninninger'), 'type' => 'movie', 'number' => 4, 'airdate' => '2016-06-22'],
            ['title' => 'Doubutsu Sentai Zyuohger The Movie: The Exciting Circus Panic!', 'category_id' => $this->Category('zyuohger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2016-08-06'],
            ['title' => 'Doubutsu Sentai Zyuohger vs Ninninger The Movie: Super Sentai\'s Message from the Future', 'category_id' => $this->Category('zyuohger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2017-01-14'],
            ['title' => 'Doubutsu Sentai Zyuohger Returns: Give Me Your Life! Earth Champion Tournament', 'category_id' => $this->Category('zyuohger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2017-06-28'],
            ['title' => 'Girls in Trouble: Space Squad Episode Zero', 'category_id' => $this->Category('dekaranger'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2017-06-17'],
            ['title' => 'Space Squad: Space Sheriff Gavan vs Tokusou Sentai Dekaranger', 'category_id' => $this->Category('dekaranger'), 'type' => 'movie', 'number' => 4, 'airdate' => '2017-06-17'],
            ['title' => 'Uchuu Sentai Kyuuranger The Movie: Geth Indaver Strikes Back', 'category_id' => $this->Category('kyuuranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2017-08-05'],
            ['title' => 'Uchuu Sentai Kyuuranger: Episode of Stinger', 'category_id' => $this->Category('kyuuranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2017-10-25'],
            ['title' => 'Uchuu Sentai Kyuuranger vs Space Squad', 'category_id' => $this->Category('kyuuranger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2018-06-30'],
            ['title' => 'Kaitou Sentai Lupinranger VS Keisatsu Sentai Patranger en Film', 'category_id' => $this->Category('lupinranger-vs-patranger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2018-08-04'],
            ['title' => 'Lupinranger VS Patranger VS Kyuuranger', 'category_id' => $this->Category('lupinranger-vs-patranger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2019-08-21'],
            ['title' => 'Kishiryu Sentai Ryusoulger The Movie: Time Slip! Dinosaur Panic!!', 'category_id' => $this->Category('ryusoulger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2019-12-04'],
            ['title' => 'Kishiryu Sentai Ryusoulger VS Lupinranger VS Patranger', 'category_id' => $this->Category('ryusoulger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2020-02-08'],
            ['title' => 'Kishiryu Sentai Ryusoulger Special Chapter: Memory of Soulmates', 'category_id' => $this->Category('ryusoulger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2021-02-20'],
            ['title' => 'Mashin Sentai Kiramager The Movie: Bee-Bop Dream', 'category_id' => $this->Category('kiramager'), 'type' => 'movie', 'number' => 1, 'airdate' => '2021-02-20'],
            ['title' => 'Mashin Sentai Kiramager vs Ryusoulger', 'category_id' => $this->Category('kiramager'), 'type' => 'movie', 'number' => 2, 'airdate' => '2021-04-29'],
            ['title' => 'Kikai Sentai Zenkaiger The Movie: Red Battle! All Sentai Rally!!', 'category_id' => $this->Category('zenkaiger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2021-02-20'],
            ['title' => 'Saber + Zenkaiger: Superhero Senki', 'category_id' => $this->Category('zenkaiger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2021-07-22'],
            ['title' => 'Kikai Sentai Zenkaiger vs Kiramager vs Senpaiger', 'category_id' => $this->Category('zenkaiger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2022-04-29'],
            ['title' => 'Kaizoku Sentai: Ten Gokaiger', 'category_id' => $this->Category('gokaiger'), 'type' => 'movie', 'number' => 4, 'airdate' => '2021-11-12'],
            ['title' => 'Avataro Sentai Donbrothers The Movie: New First Love Hero', 'category_id' => $this->Category('donbrothers'), 'type' => 'movie', 'number' => 1, 'airdate' => '2022-07-22'],
            ['title' => 'Avataro Sentai Donbrothers vs Zenkaiger', 'category_id' => $this->Category('donbrothers'), 'type' => 'movie', 'number' => 2, 'airdate' => '2023-05-03'],
            ['title' => 'Ohsama Sentai King-Ohger: The Secrets of King Racules - Episode 1', 'category_id' => $this->Category('king-ohger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2023-04-23'],
            ['title' => 'Ohsama Sentai King-Ohger: The Secrets of King Racules - Episode 2', 'category_id' => $this->Category('king-ohger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2023-04-23'],
            ['title' => 'Ohsama Sentai King-Ohger: The Secrets of King Racules - Episode 3', 'category_id' => $this->Category('king-ohger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2023-04-23'],
            ['title' => 'Ohsama Sentai King-Ohger: Adventure Heaven', 'category_id' => $this->Category('king-ohger'), 'type' => 'movie', 'number' => 4, 'airdate' => '2023-07-28'],
            ['title' => 'Ohsama Sentai King-Ohger vs Donbrothers', 'category_id' => $this->Category('king-ohger'), 'type' => 'movie', 'number' => 5, 'airdate' => '2024-04-26'],
            ['title' => 'Ohsama Sentai King-Ohger vs Kyoryuger', 'category_id' => $this->Category('king-ohger'), 'type' => 'movie', 'number' => 6, 'airdate' => '2024-04-26'],
            ['title' => 'Ohsama Sentai King-Ohger in Space', 'category_id' => $this->Category('king-ohger'), 'type' => 'movie', 'number' => 7, 'airdate' => '2024-11-10'],
            ['title' => 'Ninpuu Sentai Hurricaneger Degozaru! Shushuuto 20th Anniversary', 'category_id' => $this->Category('hurricaneger'), 'type' => 'movie', 'number' => 4, 'airdate' => '2023-06-16'],
            ['title' => 'Bakuryuu Sentai Abaranger 20th: The Unforgivable Abare', 'category_id' => $this->Category('abaranger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2023-09-01'],
            ['title' => 'Tokusou Sentai Dekaranger 20th: Fireball Booster', 'category_id' => $this->Category('dekaranger'), 'type' => 'movie', 'number' => 5, 'airdate' => '2024-06-07'],
            ['title' => 'Tokusou Sentai Dekaranger with Tonbo Ohger', 'category_id' => $this->Category('dekaranger'), 'type' => 'movie', 'number' => 6, 'airdate' => '2024-06-16'],
            ['title' => 'Ninja Sentai Kakuranger: Act Three - Middle-Aged Struggles', 'category_id' => $this->Category('kakuranger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2024-08-04'],
            ['title' => 'Bakuage Sentai Boonboomger GekijoBoon! Promise the Circuit', 'category_id' => $this->Category('boonboomger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2024-07-26'],
            ['title' => 'Bakuage Sentai Boonboomger vs King-Ohger', 'category_id' => $this->Category('boonboomger'), 'type' => 'movie', 'number' => 2, 'airdate' => '2025-05-01'],
            ['title' => 'Bakuage Sentai Boonboomger Formation Lap: Shimatsuya of the Galaxy', 'category_id' => $this->Category('boonboomger'), 'type' => 'movie', 'number' => 3, 'airdate' => '2025-07-13'],
            ['title' => 'No.1 Sentai Gozyuger: TegaSword of Resurrection', 'category_id' => $this->Category('gozyuger'), 'type' => 'movie', 'number' => 1, 'airdate' => '2025-07-25'],

        ])->map(function ($item) use ($timestamp) {

            $category = Category::find($item['category_id']);

            $item['slug'] = \Illuminate\Support\Str::slug(
                "{$category->fullname} {$item['type']} {$item['number']}"
            );

            return array_merge($item, $timestamp);
        });

        Video::query()->insert($data->toArray());
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
