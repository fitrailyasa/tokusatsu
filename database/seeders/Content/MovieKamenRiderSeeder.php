<?php

namespace Database\Seeders\Content;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MovieKamenRiderSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // KAMEN RIDER
            // Movie
            ['title' => "Kamen Rider vs Shocker", 'category' => 'kamen-rider', 'type' => 'movie', 'number' => 2, 'airdate' => '1972-03-18'],
            ['title' => "Kamen Rider vs Ambassador Hell", 'category' => 'kamen-rider', 'type' => 'movie', 'number' => 3, 'airdate' => '1972-07-16'],
            ['title' => "Kamen Rider V3 vs Destron Mutants", 'category' => 'v3', 'type' => 'movie', 'number' => 2, 'airdate' => '1973-07-18'],
            ['title' => "Kamen Rider X: Five Riders vs King Dark", 'category' => 'rider-x', 'type' => 'movie', 'number' => 2, 'airdate' => '1974-07-25'],
            ['title' => "Kamen Rider Stronger: All Together! Seven Kamen Riders!!", 'category' => 'stronger', 'type' => 'special', 'number' => 1, 'airdate' => '1976-01-03'],
            ['title' => "Kamen Rider: 8 Riders vs Galaxy King", 'category' => 'skyrider', 'type' => 'movie', 'number' => 1, 'airdate' => '1980-03-15'],
            ['title' => "Kamen Rider Super-1: The Movie", 'category' => 'super-1', 'type' => 'movie', 'number' => 1, 'airdate' => '1981-03-14'],
            ['title' => "Kamen Rider Black: Hurry to Onigashima", 'category' => 'black', 'type' => 'movie', 'number' => 1, 'airdate' => '1988-03-12'],
            ['title' => "Kamen Rider Black: Terrifying! The Phantom House of Devil Pass", 'category' => 'black', 'type' => 'movie', 'number' => 2, 'airdate' => '1988-07-09'],
            ['title' => "Kamen Rider Black RX: Run All Over the World", 'category' => 'black-rx', 'type' => 'movie', 'number' => 1, 'airdate' => '1989-04-29'],
            ['title' => "Kamen Rider World", 'category' => 'j', 'type' => 'special', 'number' => 1, 'airdate' => '1994-08-06'],

            // Hyper Battle DVD
            ['title' => "Kamen Rider Kuuga vs the Strong Monster Go-Jiino-Da", 'category' => 'kuuga', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2000-08-01'],
            ['title' => "Kamen Rider Agito: Three Great Riders", 'category' => 'agito', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2001-08-01'],
            ['title' => "Kamen Rider Ryuki: Ryuki vs Kamen Rider Agito", 'category' => 'ryuki', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2002-09-01'],
            ['title' => "Kamen Rider 555: Hyper Battle Video", 'category' => '555', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2003-09-01'],
            ['title' => "Kamen Rider Blade: Blade vs Blade", 'category' => 'blade', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2004-10-01'],
            ['title' => "Kamen Rider Hibiki: Asumu Henshin!", 'category' => 'hibiki', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2005-11-01'],
            ['title' => "Kamen Rider Kabuto: Birth! Gatack Hyper Form!!", 'category' => 'kabuto', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2006-11-01'],
            ['title' => "Kamen Rider Den-O: Singing, Dancing, Great Training!!", 'category' => 'den-o', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2007-11-01'],
            ['title' => "Kamen Rider Kiva: You Can Also Be Kiva", 'category' => 'kiva', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2008-11-01'],
            ['title' => "Kamen Rider Decade: Protect! The World of Televikun", 'category' => 'decade', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2009-09-01'],
            ['title' => "Kamen Rider W: Donburi's α/Farewell Beloved Recipe", 'category' => 'w', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2010-07-01'],
            ['title' => "Kamen Rider OOO: Quiz, Dance, and Takagarooba", 'category' => 'ooo', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2011-06-01'],
            ['title' => "Kamen Rider Fourze: Rocket Drill States of Friendship", 'category' => 'fourze', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2012-05-01'],
            ['title' => "Kamen Rider Wizard: Showtime with the Dance Ring!!", 'category' => 'wizard', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2013-04-01'],
            ['title' => "Kamen Rider Gaim: Fresh Orange Arms is Born! ~You Can Also Seize It! The Power of Fresh~", 'category' => 'gaim', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2014-03-01'],
            ['title' => "Kamen Rider Drive: Type TV-Kun - Hunter & Monster!", 'category' => 'drive', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2014-11-29'],
            ['title' => "Kamen Rider Drive: Type High Speed!", 'category' => 'drive', 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2015-03-02'],
            ['title' => "Kamen Rider Drive: Type Lupin!", 'category' => 'drive', 'type' => 'hyper-battle-dvd', 'number' => 3, 'airdate' => '2015-11-02'],
            ['title' => "Kamen Rider Ghost: Ikkyu Eyecon Contention! Quick Wit Battle!!", 'category' => 'ghost', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2015-11-28'],
            ['title' => "Kamen Rider Ghost: Ikkyu Intimacy! Awaken, My Quick Wit Power!!", 'category' => 'ghost', 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ghost: Ikkyu Intimacy! Awaken, My Quick Wit Power!! - Ending A", 'category' => 'ghost', 'type' => 'hyper-battle-dvd', 'number' => 3, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ghost: Ikkyu Intimacy! Awaken, My Quick Wit Power!! - Ending B", 'category' => 'ghost', 'type' => 'hyper-battle-dvd', 'number' => 4, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ghost: Truth! The Secret of the Heroic Eyecons!", 'category' => 'ghost', 'type' => 'hyper-battle-dvd', 'number' => 5, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Kamen Rider Lazer", 'category' => 'ex-aid', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2017-06-06'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Kamen Rider Para-DX", 'category' => 'ex-aid', 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2017-08-01'],
            ['title' => "Kamen Rider Build: Birth! KumaTelevi!! vs Kamen Rider Grease", 'category' => 'build', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2018-03-14'],
            ['title' => "Kamen Rider Build: Kamen Rider Prime Rogue", 'category' => 'build', 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2018-12-03'],
            ['title' => "Kamen Rider Zi-O Hyper Battle DVD: Kamen Rider BiBiBi no Bibill Geiz", 'category' => 'zi-o', 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2019-09-01'],

            // Movie
            ['title' => "Kamen Rider Kuuga: Special Chapter", 'category' => 'kuuga', 'type' => 'movie', 'number' => 1, 'airdate' => '2001-10-21'],
            ['title' => "Kamen Rider Agito: Project G4", 'category' => 'agito', 'type' => 'movie', 'number' => 1, 'airdate' => '2001-09-22'],
            ['title' => "Kamen Rider Ryuki: Episode Final", 'category' => 'ryuki', 'type' => 'movie', 'number' => 1, 'airdate' => '2002-08-17'],
            ['title' => "Kamen Rider 555: Paradise Lost", 'category' => '555', 'type' => 'movie', 'number' => 1, 'airdate' => '2003-08-16'],
            ['title' => "Kamen Rider Blade: Missing Ace", 'category' => 'blade', 'type' => 'movie', 'number' => 1, 'airdate' => '2004-09-11'],
            ['title' => "Kamen Rider Hibiki & The Seven Senki", 'category' => 'hibiki', 'type' => 'movie', 'number' => 1, 'airdate' => '2005-09-03'],
            ['title' => "Kamen Rider Kabuto: God Speed Love", 'category' => 'kabuto', 'type' => 'movie', 'number' => 1, 'airdate' => '2006-08-05'],
            ['title' => "Kamen Rider Den-O: I’m Born!", 'category' => 'den-o', 'type' => 'movie', 'number' => 1, 'airdate' => '2007-08-04'],
            ['title' => "Kamen Rider Kiva: King of the Castle in the Demon World", 'category' => 'kiva', 'type' => 'movie', 'number' => 1, 'airdate' => '2008-08-09'],
            ['title' => "Kamen Rider Decade: All Riders vs Dai-Shocker", 'category' => 'decade', 'type' => 'movie', 'number' => 1, 'airdate' => '2009-08-08'],
            ['title' => "Kamen Rider W: A to Z/The Gaia Memories of Fate", 'category' => 'w', 'type' => 'movie', 'number' => 1, 'airdate' => '2010-08-07'],
            ['title' => "Kamen Rider OOO: Wonderful Shogun and the 21 Core Medals", 'category' => 'ooo', 'type' => 'movie', 'number' => 1, 'airdate' => '2011-08-06'],
            ['title' => "Kamen Rider Fourze: Space, Here We Come!", 'category' => 'fourze', 'type' => 'movie', 'number' => 1, 'airdate' => '2012-08-04'],
            ['title' => "Kamen Rider Wizard: In Magic Land", 'category' => 'wizard', 'type' => 'movie', 'number' => 1, 'airdate' => '2013-08-03'],
            ['title' => "Kamen Rider Gaim: Great Soccer Battle! Golden Fruits Cup!", 'category' => 'gaim', 'type' => 'movie', 'number' => 1, 'airdate' => '2014-07-19'],
            ['title' => "Kamen Rider Drive: Surprise Future", 'category' => 'drive', 'type' => 'movie', 'number' => 1, 'airdate' => '2015-08-08'],
            ['title' => "Kamen Rider Ghost: The 100 Eyecons and Ghost’s Fateful Moment", 'category' => 'ghost', 'type' => 'movie', 'number' => 1, 'airdate' => '2016-08-06'],
            ['title' => "Kamen Rider Ex-Aid: True Ending", 'category' => 'ex-aid', 'type' => 'movie', 'number' => 1, 'airdate' => '2017-08-05'],
            ['title' => "Kamen Rider Build: Be the One", 'category' => 'build', 'type' => 'movie', 'number' => 1, 'airdate' => '2018-08-04'],
            ['title' => "Kamen Rider Zi-O: Over Quartzer", 'category' => 'zi-o', 'type' => 'movie', 'number' => 1, 'airdate' => '2019-07-26'],

            // Special
            ['title' => "Kamen Rider Kuuga Special: First Dream of the New Year", 'category' => 'kuuga', 'type' => 'special', 'number' => 1, 'airdate' => '2001-01-02'],
            ['title' => "Kamen Rider Agito Special: A New Transformation", 'category' => 'agito', 'type' => 'special', 'number' => 1, 'airdate' => '2001-10-01'],
            ['title' => "Kamen Rider Ryuki Special: 13 Riders", 'category' => 'ryuki', 'type' => 'special', 'number' => 1, 'airdate' => '2002-09-19'],
            ['title' => "Kamen Rider Blade: New Generation - Part 1", 'category' => 'blade', 'type' => 'special', 'number' => 1, 'airdate' => '2004-08-18'],
            ['title' => "Kamen Rider Blade: New Generation - Part 2", 'category' => 'blade', 'type' => 'special', 'number' => 2, 'airdate' => '2004-08-18'],
            ['title' => "Kamen Rider Blade: New Generation - Part 3", 'category' => 'blade', 'type' => 'special', 'number' => 3, 'airdate' => '2004-08-18'],
            ['title' => "Kamen Rider Blade: New Generation - Part 4", 'category' => 'blade', 'type' => 'special', 'number' => 4, 'airdate' => '2004-08-18'],

            // V-Cinema
            ['title' => "Kamen Rider W Returns: Kamen Rider Accel", 'category' => 'w', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2011-04-21'],
            ['title' => "Kamen Rider W Returns: Kamen Rider Eternal", 'category' => 'w', 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2011-07-21'],
            ['title' => "Kamen Rider Gaim Gaiden: Zangetsu and Baron", 'category' => 'gaim', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2015-04-22'],
            ['title' => "Kamen Rider Gaim Gaiden: Duke and Knuckle", 'category' => 'gaim', 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2015-11-11'],
            ['title' => "Kamen Rider Gaim Gaiden: Gridon vs Bravo - Part 1", 'category' => 'gaim', 'type' => 'v-cinema', 'number' => 3, 'airdate' => '2020-10-25'],
            ['title' => "Kamen Rider Gaim Gaiden: Gridon vs Bravo - Part 2", 'category' => 'gaim', 'type' => 'v-cinema', 'number' => 4, 'airdate' => '2020-11-01'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Chaser", 'category' => 'drive', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2016-04-20'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Mach And Heart", 'category' => 'drive', 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2016-11-16'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Brain", 'category' => 'drive', 'type' => 'v-cinema', 'number' => 3, 'airdate' => '2019-04-28'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Brain", 'category' => 'drive', 'type' => 'v-cinema', 'number' => 4, 'airdate' => '2019-05-05'],
            ['title' => "Kamen Rider Ghost RE:BIRTH: Kamen Rider Specter", 'category' => 'ghost', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2017-04-19'],
            ['title' => "Kamen Rider Ex-Aid Trilogy: Another Ending Kamen Rider Brave & Snipe", 'category' => 'ex-aid', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2018-02-03'],
            ['title' => "Kamen Rider Ex-Aid Trilogy: Another Ending Kamen Rider Para-DX With Poppy", 'category' => 'ex-aid', 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2018-02-17'],
            ['title' => "Kamen Rider Ex-Aid Trilogy: Another Ending Kamen Rider Genm Vs Lazer", 'category' => 'ex-aid', 'type' => 'v-cinema', 'number' => 3, 'airdate' => '2018-03-03'],
            ['title' => "Kamen Rider Build New World: Kamen Rider Cross-Z", 'category' => 'build', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2019-01-25'],
            ['title' => "Kamen Rider Build New World: Kamen Rider Grease", 'category' => 'build', 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2019-09-06'],
            ['title' => "Kamen Rider Zi-O Next Time: Geiz Majesty", 'category' => 'zi-o', 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2020-02-28'],

            // Spin-Off
            ['title' => "Kamen Rider Drive: Kamen Rider 4 - Part 1", 'category' => 'drive', 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Drive: Kamen Rider 4 - Part 2", 'category' => 'drive', 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Drive: Kamen Rider 4 - Part 3", 'category' => 'drive', 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 1", 'category' => 'ghost', 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 2", 'category' => 'ghost', 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 3", 'category' => 'ghost', 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 4", 'category' => 'ghost', 'type' => 'spin-off', 'number' => 4, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Sentai Gorider - Part 1", 'category' => 'ex-aid', 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Sentai Gorider - Part 2", 'category' => 'ex-aid', 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Sentai Gorider - Part 3", 'category' => 'ex-aid', 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Build: ROGUE - Part 1", 'category' => 'build', 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Build: ROGUE - Part 2", 'category' => 'build', 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Build: ROGUE - Part 3", 'category' => 'build', 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Rider Time Rider Time Kamen Rider Shinobi Episode 1", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 1, 'airdate' => '2019-03-31'],
            ['title' => "Rider Time Rider Time Kamen Rider Shinobi Episode 2", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 2, 'airdate' => '2019-04-07'],
            ['title' => "Rider Time Rider Time Kamen Rider Shinobi Episode 3", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 3, 'airdate' => '2019-04-14'],
            ['title' => "Rider Time Kamen Rider Ryuki Episode 1", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 4, 'airdate' => '2019-03-31'],
            ['title' => "Rider Time Kamen Rider Ryuki Episode 2", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 5, 'airdate' => '2019-04-07'],
            ['title' => "Rider Time Kamen Rider Ryuki Episode 3", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 6, 'airdate' => '2019-04-14'],
            ['title' => "Rider Time Kamen Rider Decade vs Zi-O Episode 1", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 7, 'airdate' => '2021-02-09'],
            ['title' => "Rider Time Kamen Rider Decade vs Zi-O Episode 2", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 8, 'airdate' => '2021-02-14'],
            ['title' => "Rider Time Kamen Rider Decade vs Zi-O Episode 3", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 9, 'airdate' => '2021-02-21'],
            ['title' => "Rider Time Kamen Rider Zi-O vs Decade Episode 1", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 10, 'airdate' => '2021-02-09'],
            ['title' => "Rider Time Kamen Rider Zi-O vs Decade Episode 2", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 11, 'airdate' => '2021-02-14'],
            ['title' => "Rider Time Kamen Rider Zi-O vs Decade Episode 3", 'category' => 'zi-o', 'type' => 'spin-off', 'number' => 12, 'airdate' => '2021-02-21'],

            // Mini Series
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 1", 'category' => 'ghost', 'type' => 'mini-series', 'number' => 1, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 2", 'category' => 'ghost', 'type' => 'mini-series', 'number' => 2, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 3", 'category' => 'ghost', 'type' => 'mini-series', 'number' => 3, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 4", 'category' => 'ghost', 'type' => 'mini-series', 'number' => 4, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 5", 'category' => 'ghost', 'type' => 'mini-series', 'number' => 5, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 6", 'category' => 'ghost', 'type' => 'mini-series', 'number' => 6, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 7", 'category' => 'ghost', 'type' => 'mini-series', 'number' => 7, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 1", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 1, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 2", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 2, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 3", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 3, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 4", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 4, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 5", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 5, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 1", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 6, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 2", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 7, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 3", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 8, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 4", 'category' => 'ex-aid', 'type' => 'mini-series', 'number' => 9, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Build: Raising the Hazard Level - Chapter 1", 'category' => 'build', 'type' => 'mini-series', 'number' => 1, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Build: Raising the Hazard Level - Chapter 2", 'category' => 'build', 'type' => 'mini-series', 'number' => 2, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Build: Raising the Hazard Level - Chapter 3", 'category' => 'build', 'type' => 'mini-series', 'number' => 3, 'airdate' => '2021-02-21'],

            // Movie Den-O
            ['title' => "Kamen Rider Den-O & Kiva: Climax Deka", 'category' => 'den-o', 'type' => 'movie', 'number' => 2, 'airdate' => '2008-04-12'],
            ['title' => "Saraba Kamen Rider Den-O: Final Countdown", 'category' => 'den-o', 'type' => 'movie', 'number' => 3, 'airdate' => '2008-10-04'],
            ['title' => "Cho Kamen Rider Den-O & Decade: Neo Generations – The Onigashima Warship", 'category' => 'den-o', 'type' => 'movie', 'number' => 4, 'airdate' => '2009-05-01'],
            ['title' => "Cho-Den-O Trilogy: Episode Red – Zero no Star Twinkle", 'category' => 'den-o', 'type' => 'movie', 'number' => 5, 'airdate' => '2010-05-22'],
            ['title' => "Cho-Den-O Trilogy: Episode Blue – The Dispatched Imagin Is Newtral", 'category' => 'den-o', 'type' => 'movie', 'number' => 6, 'airdate' => '2010-06-05'],
            ['title' => "Cho-Den-O Trilogy: Episode Yellow – Treasure de End Pirates", 'category' => 'den-o', 'type' => 'movie', 'number' => 7, 'airdate' => '2010-06-19'],
            ['title' => "Kamen Rider Den-O: Pretty Den-O Appears!", 'category' => 'den-o', 'type' => 'movie', 'number' => 8, 'airdate' => '2020-08-14'],

            // Kamen Rider × Kamen Rider
            ['title' => "Kamen Rider × Kamen Rider W & Decade: Movie War 2010", 'category' => 'w', 'type' => 'movie', 'number' => 2, 'airdate' => '2009-12-12'],
            ['title' => "Kamen Rider × Kamen Rider OOO & W Featuring Skull: Movie War Core", 'category' => 'ooo', 'type' => 'movie', 'number' => 2, 'airdate' => '2010-12-18'],
            ['title' => "Kamen Rider × Kamen Rider Fourze & OOO: Movie War Mega Max", 'category' => 'fourze', 'type' => 'movie', 'number' => 2, 'airdate' => '2011-12-10'],
            ['title' => "Kamen Rider × Kamen Rider Wizard & Fourze: Movie War Ultimatum", 'category' => 'wizard', 'type' => 'movie', 'number' => 2, 'airdate' => '2012-12-08'],
            ['title' => "Kamen Rider × Kamen Rider Gaim & Wizard: The Fateful Sengoku Movie Battle", 'category' => 'gaim', 'type' => 'movie', 'number' => 2, 'airdate' => '2013-12-14'],
            ['title' => "Kamen Rider × Kamen Rider Drive & Gaim: Movie War Full Throttle", 'category' => 'drive', 'type' => 'movie', 'number' => 2, 'airdate' => '2014-12-13'],
            ['title' => "Kamen Rider × Kamen Rider Ghost & Drive: Super Movie Wars Genesis", 'category' => 'ghost', 'type' => 'movie', 'number' => 2, 'airdate' => '2015-12-12'],
            ['title' => "Kamen Rider Heisei Generations: Dr. Pac-Man vs. Ex-Aid & Ghost with Legend Riders", 'category' => 'ex-aid', 'type' => 'movie', 'number' => 2, 'airdate' => '2016-12-10'],
            ['title' => "Kamen Rider Heisei Generations Final: Build & Ex-Aid with Legend Riders", 'category' => 'build', 'type' => 'movie', 'number' => 2, 'airdate' => '2017-12-09'],
            ['title' => "Kamen Rider Heisei Generations Forever", 'category' => 'zi-o', 'type' => 'movie', 'number' => 2, 'airdate' => '2018-12-22'],

            // Super Hero Taisen
            ['title' => "OOO, Den-O, All Riders: Let's Go Kamen Riders", 'category' => 'ooo', 'type' => 'movie', 'number' => 3, 'airdate' => '2011-04-01'],
            ['title' => "Kamen Rider × Super Sentai: Super Hero Taisen", 'category' => 'fourze', 'type' => 'movie', 'number' => 3, 'airdate' => '2012-04-21'],
            ['title' => "Kamen Rider × Super Sentai × Space Sheriff: Super Hero Taisen Z", 'category' => 'wizard', 'type' => 'movie', 'number' => 3, 'airdate' => '2013-04-27'],
            ['title' => "Heisei Rider vs. Showa Rider: Kamen Rider Taisen feat. Super Sentai", 'category' => 'gaim', 'type' => 'movie', 'number' => 3, 'airdate' => '2014-03-29'],
            ['title' => "Super Hero Taisen GP: Kamen Rider 3", 'category' => 'drive', 'type' => 'movie', 'number' => 3, 'airdate' => '2015-03-21'],
            ['title' => "Kamen Rider 1", 'category' => 'ghost', 'type' => 'movie', 'number' => 3, 'airdate' => '2016-03-26'],
            ['title' => "Kamen Rider × Super Sentai: Chou Super Hero Taisen", 'category' => 'ex-aid', 'type' => 'movie', 'number' => 3, 'airdate' => '2017-03-25'],

            // Extra
            ['title' => "Kamen Rider: The First", 'category' => 'kamen-rider', 'type' => 'movie', 'number' => 4, 'airdate' => '2005-12-05'],
            ['title' => "Kamen Rider: The Next", 'category' => 'kamen-rider', 'type' => 'movie', 'number' => 5, 'airdate' => '2007-08-27'],
            ['title' => "Kamen Rider Amazons The Movie: The Last Judgement", 'category' => 'amazon', 'type' => 'movie', 'number' => 1, 'airdate' => '2019-05-19'],

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
