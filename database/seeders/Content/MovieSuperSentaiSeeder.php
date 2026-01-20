<?php

namespace Database\Seeders\Content;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class MovieSuperSentaiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // SUPER SENTAI
            // Movie
            ['title' => 'Himitsu Sentai Gorenger: The Bomb Hurricane', 'category' => 'gorenger', 'type' => 'movie', 'number' => 1, 'airdate' => '1976-07-22'],
            ['title' => 'J.A.K.Q. Dengekitai vs Gorenger', 'category' => 'jakq', 'type' => 'movie', 'number' => 1, 'airdate' => '1978-03-18'],
            ['title' => 'Battle Fever J: The Movie', 'category' => 'fever-j', 'type' => 'movie', 'number' => 1, 'airdate' => '1979-07-29'],
            ['title' => 'Denshi Sentai Denjiman: The Movie', 'category' => 'denjiman', 'type' => 'movie', 'number' => 1, 'airdate' => '1980-07-12'],
            ['title' => 'Taiyo Sentai Sun Vulcan: The Movie', 'category' => 'sun-vulcan', 'type' => 'movie', 'number' => 1, 'airdate' => '1981-07-18'],
            ['title' => 'Dai Sentai Goggle-V: The Movie', 'category' => 'goggle-v', 'type' => 'movie', 'number' => 1, 'airdate' => '1982-03-13'],
            ['title' => 'Kagaku Sentai Dynaman: The Movie', 'category' => 'dynaman', 'type' => 'movie', 'number' => 1, 'airdate' => '1983-03-12'],
            ['title' => 'Dengeki Sentai Changeman: The Movie', 'category' => 'changeman', 'type' => 'movie', 'number' => 1, 'airdate' => '1985-03-16'],
            ['title' => 'Dengeki Sentai Changeman: Shuttle Base! The Critical Moment!', 'category' => 'changeman', 'type' => 'movie', 'number' => 2, 'airdate' => '1985-07-13'],
            ['title' => 'Choushinsei Flashman: The Movie', 'category' => 'flashman', 'type' => 'movie', 'number' => 1, 'airdate' => '1986-03-15'],
            ['title' => 'Hikari Sentai Maskman: The Movie', 'category' => 'maskman', 'type' => 'movie', 'number' => 1, 'airdate' => '1987-07-18'],
            ['title' => 'Kousoku Sentai Turboranger: The Movie', 'category' => 'turboranger', 'type' => 'movie', 'number' => 1, 'airdate' => '1989-03-18'],
            ['title' => 'Gosei Sentai Dairanger: The Movie', 'category' => 'dairanger', 'type' => 'movie', 'number' => 1, 'airdate' => '1993-04-17'],
            ['title' => 'Ninja Sentai Kakuranger: The Movie', 'category' => 'kakuranger', 'type' => 'movie', 'number' => 1, 'airdate' => '1994-04-04'],
            ['title' => 'Super Sentai World', 'category' => 'kakuranger', 'type' => 'movie', 'number' => 2, 'airdate' => '1994-08-06'],
            ['title' => 'Chouriki Sentai Ohranger: The Movie', 'category' => 'ohranger', 'type' => 'movie', 'number' => 1, 'airdate' => '1995-04-15'],
            ['title' => 'Chouriki Sentai Ohranger: Ole vs Kakuranger', 'category' => 'ohranger', 'type' => 'movie', 'number' => 2, 'airdate' => '1996-03-08'],
            ['title' => 'Gekisou Sentai Carranger vs Ohranger', 'category' => 'carranger', 'type' => 'movie', 'number' => 1, 'airdate' => '1997-03-14'],
            ['title' => 'Denji Sentai Megaranger vs Carranger', 'category' => 'megaranger', 'type' => 'movie', 'number' => 1, 'airdate' => '1998-03-13'],
            ['title' => 'Seijuu Sentai Gingaman vs Megaranger', 'category' => 'gingaman', 'type' => 'movie', 'number' => 1, 'airdate' => '1999-03-12'],
            ['title' => 'Kyuukyuu Sentai GoGoFive: Sudden Shock! A New Warrior!', 'category' => 'gogofive', 'type' => 'movie', 'number' => 1, 'airdate' => '1999-07-09'],
            ['title' => 'Kyuukyuu Sentai GoGoFive vs Gingaman', 'category' => 'gogofive', 'type' => 'movie', 'number' => 2, 'airdate' => '2000-03-10'],
            ['title' => 'Mirai Sentai Timeranger vs GoGoFive', 'category' => 'timeranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2001-03-09'],
            ['title' => 'Hyakujuu Sentai Gaoranger: The Fire Mountain Roars', 'category' => 'gaoranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2001-08-10'],
            ['title' => 'Hyakujuu Sentai Gaoranger vs Super Sentai', 'category' => 'gaoranger', 'type' => 'movie', 'number' => 2, 'airdate' => '2001-09-22'],
            ['title' => 'Ninpuu Sentai Hurricaneger Shushuuto: The Movie', 'category' => 'hurricaneger', 'type' => 'movie', 'number' => 1, 'airdate' => '2002-08-17'],
            ['title' => 'Ninpuu Sentai Hurricaneger vs Gaoranger', 'category' => 'hurricaneger', 'type' => 'movie', 'number' => 2, 'airdate' => '2003-03-14'],
            ['title' => 'Ninpuu Sentai Hurricaneger: 10 Years After', 'category' => 'hurricaneger', 'type' => 'movie', 'number' => 3, 'airdate' => '2003-08-09'],
            ['title' => 'Bakuryu Sentai Abaranger Deluxe: Abare Summer is Freezing Cold', 'category' => 'abaranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2003-08-16'],
            ['title' => 'Bakuryuu Sentai Abaranger vs Hurricaneger', 'category' => 'abaranger', 'type' => 'movie', 'number' => 2, 'airdate' => '2004-03-12'],
            ['title' => 'Tokusou Sentai Dekaranger The Movie: Full Blast Action', 'category' => 'dekaranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2004-09-11'],
            ['title' => 'Tokusou Sentai Dekaranger vs Abaranger', 'category' => 'dekaranger', 'type' => 'movie', 'number' => 2, 'airdate' => '2005-03-11'],
            ['title' => 'Tokusou Sentai Dekaranger: 10 Years After', 'category' => 'dekaranger', 'type' => 'movie', 'number' => 3, 'airdate' => '2015-11-07'],
            ['title' => 'Mahou Sentai Magiranger The Movie: Bride of Infershia', 'category' => 'magiranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2005-09-03'],
            ['title' => 'Mahou Sentai Magiranger vs Dekaranger', 'category' => 'magiranger', 'type' => 'movie', 'number' => 2, 'airdate' => '2006-03-10'],
            ['title' => 'GoGo Sentai Boukenger The Movie: The Greatest Precious', 'category' => 'boukenger', 'type' => 'movie', 'number' => 1, 'airdate' => '2006-08-05'],
            ['title' => 'GoGo Sentai Boukenger vs Super Sentai', 'category' => 'boukenger', 'type' => 'movie', 'number' => 2, 'airdate' => '2007-03-31'],
            ['title' => 'Juken Sentai Gekiranger: Hong Kong Decisive Battle', 'category' => 'gekiranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2007-08-04'],
            ['title' => 'Juken Sentai Gekiranger vs Boukenger', 'category' => 'gekiranger', 'type' => 'movie', 'number' => 2, 'airdate' => '2008-03-14'],
            ['title' => 'Engine Sentai Go-onger: Boom Boom! Bang Bang!', 'category' => 'go-onger', 'type' => 'movie', 'number' => 1, 'airdate' => '2008-08-09'],
            ['title' => 'Engine Sentai Go-onger vs Gekiranger', 'category' => 'go-onger', 'type' => 'movie', 'number' => 2, 'airdate' => '2009-03-21'],
            ['title' => 'Engine Sentai Go-onger: 10 Years Grand Prix', 'category' => 'go-onger', 'type' => 'movie', 'number' => 3, 'airdate' => '2018-09-26'],
            ['title' => 'Samurai Sentai Shinkenger The Movie: The Fateful War', 'category' => 'shinkenger', 'type' => 'movie', 'number' => 1, 'airdate' => '2009-08-08'],
            ['title' => 'Samurai Sentai Shinkenger vs Go-onger: GinmakuBang!', 'category' => 'shinkenger', 'type' => 'movie', 'number' => 2, 'airdate' => '2010-01-30'],
            ['title' => 'Samurai Sentai Shinkenger Returns: Special Act', 'category' => 'shinkenger', 'type' => 'movie', 'number' => 3, 'airdate' => '2010-06-21'],
            ['title' => 'Tensou Sentai Goseiger: Epic on the Movie', 'category' => 'goseiger', 'type' => 'movie', 'number' => 1, 'airdate' => '2010-08-07'],
            ['title' => 'Tensou Sentai Goseiger vs Shinkenger: Epic on Ginmaku', 'category' => 'goseiger', 'type' => 'movie', 'number' => 2, 'airdate' => '2011-01-22'],
            ['title' => 'Tensou Sentai Goseiger Returns: Last Epic', 'category' => 'goseiger', 'type' => 'movie', 'number' => 3, 'airdate' => '2011-07-21'],
            ['title' => 'Gokaiger Goseiger Super Sentai 199 Hero Great Battle', 'category' => 'gokaiger', 'type' => 'movie', 'number' => 1, 'airdate' => '2011-05-21'],
            ['title' => 'Kaizoku Sentai Gokaiger The Movie: The Flying Ghost Ship', 'category' => 'gokaiger', 'type' => 'movie', 'number' => 2, 'airdate' => '2011-08-06'],
            ['title' => 'Kaizoku Sentai Gokaiger vs Space Sheriff Gavan: The Movie', 'category' => 'gokaiger', 'type' => 'movie', 'number' => 3, 'airdate' => '2012-01-21'],
            ['title' => 'Tokumei Sentai Go-Busters The Movie: Protect the Tokyo Enetower!', 'category' => 'go-busters', 'type' => 'movie', 'number' => 1, 'airdate' => '2012-08-04'],
            ['title' => 'Tokumei Sentai Go-Busters vs Kaizoku Sentai Gokaiger: The Movie', 'category' => 'go-busters', 'type' => 'movie', 'number' => 2, 'airdate' => '2013-01-19'],
            ['title' => 'Tokumei Sentai Go-Busters Returns vs Doubutsu Sentai Go-Busters', 'category' => 'go-busters', 'type' => 'movie', 'number' => 3, 'airdate' => '2013-06-21'],
            ['title' => 'Zyuden Sentai Kyoryuger The Movie: Gaburincho of Music', 'category' => 'kyoryuger', 'type' => 'movie', 'number' => 1, 'airdate' => '2013-08-03'],
            ['title' => 'Zyuden Sentai Kyoryuger vs Go-Busters: The Great Dinosaur War', 'category' => 'kyoryuger', 'type' => 'movie', 'number' => 2, 'airdate' => '2014-01-18'],
            ['title' => 'Zyuden Sentai Kyoryuger Returns: 100 Years After', 'category' => 'kyoryuger', 'type' => 'movie', 'number' => 3, 'airdate' => '2014-06-20'],
            ['title' => 'Ressha Sentai ToQger vs Kamen Rider Gaim: Spring Break Combined Special', 'category' => 'toqger', 'type' => 'movie', 'number' => 1, 'airdate' => '2014-03-30'],
            ['title' => 'Ressha Sentai ToQger The Movie: Galaxy Line S.O.S.', 'category' => 'toqger', 'type' => 'movie', 'number' => 2, 'airdate' => '2014-07-19'],
            ['title' => 'Ressha Sentai ToQger vs Kyoryuger: The Movie', 'category' => 'toqger', 'type' => 'movie', 'number' => 3, 'airdate' => '2015-01-17'],
            ['title' => 'Ressha Sentai ToQger Returns: Super ToQ 7Gou of Dreams', 'category' => 'toqger', 'type' => 'movie', 'number' => 4, 'airdate' => '2015-06-24'],
            ['title' => 'Shuriken Sentai Ninninger vs Kamen Rider Drive: Spring Vacation', 'category' => 'ninninger', 'type' => 'movie', 'number' => 1, 'airdate' => '2015-03-29'],
            ['title' => 'Shuriken Sentai Ninninger The Movie: The Dinosaur Lord\'s Splendid Ninja Scroll!', 'category' => 'ninninger', 'type' => 'movie', 'number' => 2, 'airdate' => '2015-08-08'],
            ['title' => 'Shuriken Sentai Ninninger vs ToQger The Movie: Ninjas in Wonderland', 'category' => 'ninninger', 'type' => 'movie', 'number' => 3, 'airdate' => '2016-01-23'],
            ['title' => 'Shuriken Sentai Ninninger Returns: Ninnin Girls vs Boys Final Wars', 'category' => 'ninninger', 'type' => 'movie', 'number' => 4, 'airdate' => '2016-06-22'],
            ['title' => 'Doubutsu Sentai Zyuohger The Movie: The Exciting Circus Panic!', 'category' => 'zyuohger', 'type' => 'movie', 'number' => 1, 'airdate' => '2016-08-06'],
            ['title' => 'Doubutsu Sentai Zyuohger vs Ninninger The Movie: Super Sentai\'s Message from the Future', 'category' => 'zyuohger', 'type' => 'movie', 'number' => 2, 'airdate' => '2017-01-14'],
            ['title' => 'Doubutsu Sentai Zyuohger Returns: Give Me Your Life! Earth Champion Tournament', 'category' => 'zyuohger', 'type' => 'movie', 'number' => 3, 'airdate' => '2017-06-28'],
            ['title' => 'Girls in Trouble: Space Squad Episode Zero', 'category' => 'dekaranger', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2017-06-17'],
            ['title' => 'Space Squad: Space Sheriff Gavan vs Tokusou Sentai Dekaranger', 'category' => 'dekaranger', 'type' => 'movie', 'number' => 4, 'airdate' => '2017-06-17'],
            ['title' => 'Uchuu Sentai Kyuuranger The Movie: Geth Indaver Strikes Back', 'category' => 'kyuuranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2017-08-05'],
            ['title' => 'Uchuu Sentai Kyuuranger: Episode of Stinger', 'category' => 'kyuuranger', 'type' => 'movie', 'number' => 2, 'airdate' => '2017-10-25'],
            ['title' => 'Uchuu Sentai Kyuuranger vs Space Squad', 'category' => 'kyuuranger', 'type' => 'movie', 'number' => 3, 'airdate' => '2018-06-30'],
            ['title' => 'Kaitou Sentai Lupinranger VS Keisatsu Sentai Patranger en Film', 'category' => 'lupinranger-vs-patranger', 'type' => 'movie', 'number' => 1, 'airdate' => '2018-08-04'],
            ['title' => 'Lupinranger VS Patranger VS Kyuuranger', 'category' => 'lupinranger-vs-patranger', 'type' => 'movie', 'number' => 2, 'airdate' => '2019-08-21'],
            ['title' => 'Kishiryu Sentai Ryusoulger The Movie: Time Slip! Dinosaur Panic!!', 'category' => 'ryusoulger', 'type' => 'movie', 'number' => 1, 'airdate' => '2019-12-04'],
            ['title' => 'Kishiryu Sentai Ryusoulger VS Lupinranger VS Patranger', 'category' => 'ryusoulger', 'type' => 'movie', 'number' => 2, 'airdate' => '2020-02-08'],
            ['title' => 'Kishiryu Sentai Ryusoulger Special Chapter: Memory of Soulmates', 'category' => 'ryusoulger', 'type' => 'movie', 'number' => 3, 'airdate' => '2021-02-20'],
            ['title' => 'Mashin Sentai Kiramager The Movie: Bee-Bop Dream', 'category' => 'kiramager', 'type' => 'movie', 'number' => 1, 'airdate' => '2021-02-20'],
            ['title' => 'Mashin Sentai Kiramager vs Ryusoulger', 'category' => 'kiramager', 'type' => 'movie', 'number' => 2, 'airdate' => '2021-04-29'],
            ['title' => 'Kikai Sentai Zenkaiger The Movie: Red Battle! All Sentai Rally!!', 'category' => 'zenkaiger', 'type' => 'movie', 'number' => 1, 'airdate' => '2021-02-20'],
            ['title' => 'Saber + Zenkaiger: Superhero Senki', 'category' => 'zenkaiger', 'type' => 'movie', 'number' => 2, 'airdate' => '2021-07-22'],
            ['title' => 'Kikai Sentai Zenkaiger vs Kiramager vs Senpaiger', 'category' => 'zenkaiger', 'type' => 'movie', 'number' => 3, 'airdate' => '2022-04-29'],
            ['title' => 'Kaizoku Sentai: Ten Gokaiger', 'category' => 'gokaiger', 'type' => 'movie', 'number' => 4, 'airdate' => '2021-11-12'],
            ['title' => 'Avataro Sentai Donbrothers The Movie: New First Love Hero', 'category' => 'donbrothers', 'type' => 'movie', 'number' => 1, 'airdate' => '2022-07-22'],
            ['title' => 'Avataro Sentai Donbrothers vs Zenkaiger', 'category' => 'donbrothers', 'type' => 'movie', 'number' => 2, 'airdate' => '2023-05-03'],
            ['title' => 'Ohsama Sentai King-Ohger: The Secrets of King Racules - Episode 1', 'category' => 'king-ohger', 'type' => 'movie', 'number' => 1, 'airdate' => '2023-04-23'],
            ['title' => 'Ohsama Sentai King-Ohger: The Secrets of King Racules - Episode 2', 'category' => 'king-ohger', 'type' => 'movie', 'number' => 2, 'airdate' => '2023-04-23'],
            ['title' => 'Ohsama Sentai King-Ohger: The Secrets of King Racules - Episode 3', 'category' => 'king-ohger', 'type' => 'movie', 'number' => 3, 'airdate' => '2023-04-23'],
            ['title' => 'Ohsama Sentai King-Ohger: Adventure Heaven', 'category' => 'king-ohger', 'type' => 'movie', 'number' => 4, 'airdate' => '2023-07-28'],
            ['title' => 'Ohsama Sentai King-Ohger vs Donbrothers', 'category' => 'king-ohger', 'type' => 'movie', 'number' => 5, 'airdate' => '2024-04-26'],
            ['title' => 'Ohsama Sentai King-Ohger vs Kyoryuger', 'category' => 'king-ohger', 'type' => 'movie', 'number' => 6, 'airdate' => '2024-04-26'],
            ['title' => 'Ohsama Sentai King-Ohger in Space', 'category' => 'king-ohger', 'type' => 'movie', 'number' => 7, 'airdate' => '2024-11-10'],
            ['title' => 'Ninpuu Sentai Hurricaneger Degozaru! Shushuuto 20th Anniversary', 'category' => 'hurricaneger', 'type' => 'movie', 'number' => 4, 'airdate' => '2023-06-16'],
            ['title' => 'Bakuryuu Sentai Abaranger 20th: The Unforgivable Abare', 'category' => 'abaranger', 'type' => 'movie', 'number' => 3, 'airdate' => '2023-09-01'],
            ['title' => 'Tokusou Sentai Dekaranger 20th: Fireball Booster', 'category' => 'dekaranger', 'type' => 'movie', 'number' => 5, 'airdate' => '2024-06-07'],
            ['title' => 'Tokusou Sentai Dekaranger with Tonbo Ohger', 'category' => 'dekaranger', 'type' => 'movie', 'number' => 6, 'airdate' => '2024-06-16'],
            ['title' => 'Ninja Sentai Kakuranger: Act Three - Middle-Aged Struggles', 'category' => 'kakuranger', 'type' => 'movie', 'number' => 3, 'airdate' => '2024-08-04'],
            ['title' => 'Bakuage Sentai Boonboomger GekijoBoon! Promise the Circuit', 'category' => 'boonboomger', 'type' => 'movie', 'number' => 1, 'airdate' => '2024-07-26'],
            ['title' => 'Bakuage Sentai Boonboomger vs King-Ohger', 'category' => 'boonboomger', 'type' => 'movie', 'number' => 2, 'airdate' => '2025-05-01'],
            ['title' => 'Bakuage Sentai Boonboomger Formation Lap: Shimatsuya of the Galaxy', 'category' => 'boonboomger', 'type' => 'movie', 'number' => 3, 'airdate' => '2025-07-13'],
            ['title' => 'No.1 Sentai Gozyuger: TegaSword of Resurrection', 'category' => 'gozyuger', 'type' => 'movie', 'number' => 1, 'airdate' => '2025-07-25'],

        ];

        foreach ($data as $item) {

            $category = Category::where('slug', $item['category'])->firstOrFail();

            $slug = Str::slug(
                "{$category->fullname} {$item['type']} {$item['number']}"
            );

            $video = Video::firstOrNew([
                'slug' => $slug,
            ]);

            $video->fill([
                'title' => $item['title'],
                'category_id' => $category->id,
                'type' => $item['type'],
                'number' => $item['number'],
                'airdate' => $item['airdate'],
                'slug' => $slug,
            ]);

            if ($video->isDirty()) {
                $video->save();
            }
        }
    }
}
