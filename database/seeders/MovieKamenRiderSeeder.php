<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MovieKamenRiderSeeder extends Seeder
{
    public function run(): void
    {
        $timestamp = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $data = collect([
            // KAMEN RIDER
            // Movie
            ['title' => "Kamen Rider vs Shocker", 'category_id' => $this->Category('kamen-rider'), 'type' => 'movie', 'number' => 2, 'airdate' => '1972-03-18'],
            ['title' => "Kamen Rider vs Ambassador Hell", 'category_id' => $this->Category('kamen-rider'), 'type' => 'movie', 'number' => 3, 'airdate' => '1972-07-16'],
            ['title' => "Kamen Rider V3 vs Destron Mutants", 'category_id' => $this->Category('v3'), 'type' => 'movie', 'number' => 2, 'airdate' => '1973-07-18'],
            ['title' => "Kamen Rider X: Five Riders vs King Dark", 'category_id' => $this->Category('rider-x'), 'type' => 'movie', 'number' => 2, 'airdate' => '1974-07-25'],
            ['title' => "Kamen Rider Stronger: All Together! Seven Kamen Riders!!", 'category_id' => $this->Category('stronger'), 'type' => 'special', 'number' => 1, 'airdate' => '1976-01-03'],
            ['title' => "Kamen Rider: 8 Riders vs Galaxy King", 'category_id' => $this->Category('skyrider'), 'type' => 'movie', 'number' => 1, 'airdate' => '1980-03-15'],
            ['title' => "Kamen Rider Super-1: The Movie", 'category_id' => $this->Category('super-1'), 'type' => 'movie', 'number' => 1, 'airdate' => '1981-03-14'],
            ['title' => "Kamen Rider Black: Hurry to Onigashima", 'category_id' => $this->Category('black'), 'type' => 'movie', 'number' => 1, 'airdate' => '1988-03-12'],
            ['title' => "Kamen Rider Black: Terrifying! The Phantom House of Devil Pass", 'category_id' => $this->Category('black'), 'type' => 'movie', 'number' => 2, 'airdate' => '1988-07-09'],
            ['title' => "Kamen Rider Black RX: Run All Over the World", 'category_id' => $this->Category('black-rx'), 'type' => 'movie', 'number' => 1, 'airdate' => '1989-04-29'],
            ['title' => "Kamen Rider World", 'category_id' => $this->Category('j'), 'type' => 'special', 'number' => 1, 'airdate' => '1994-08-06'],

            // Hyper Battle DVD
            ['title' => "Kamen Rider Kuuga vs the Strong Monster Go-Jiino-Da", 'category_id' => $this->Category('kuuga'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2000-08-27'],
            ['title' => "Kamen Rider Agito: Three Great Riders", 'category_id' => $this->Category('agito'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2001-08-01'],
            ['title' => "Kamen Rider Ryuki: Ryuki vs Kamen Rider Agito", 'category_id' => $this->Category('ryuki'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2002-09-01'],
            ['title' => "Kamen Rider 555: Hyper Battle Video", 'category_id' => $this->Category('555'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2003-09-01'],
            ['title' => "Kamen Rider Blade: Blade vs Blade", 'category_id' => $this->Category('blade'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2004-09-01'],
            ['title' => "Kamen Rider Hibiki: Asumu Henshin!", 'category_id' => $this->Category('hibiki'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2005-09-01'],
            ['title' => "Kamen Rider Kabuto: Birth! Gatack Hyper Form!!", 'category_id' => $this->Category('kabuto'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2006-09-01'],
            ['title' => "Kamen Rider Den-O: Singing, Dancing, Great Training!!", 'category_id' => $this->Category('den-o'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2007-09-01'],
            ['title' => "Kamen Rider Kiva: You Can Also Be Kiva", 'category_id' => $this->Category('kiva'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2008-09-01'],
            ['title' => "Kamen Rider Decade: Protect! The World of Televikun", 'category_id' => $this->Category('decade'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2009-08-01'],
            ['title' => "Kamen Rider W Hyper Battle DVD", 'category_id' => $this->Category('w'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2010-08-01'],
            ['title' => "Kamen Rider OOO Hyper Battle DVD", 'category_id' => $this->Category('ooo'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2011-07-01'],
            ['title' => "Kamen Rider Fourze Hyper Battle DVD", 'category_id' => $this->Category('fourze'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2012-07-01'],
            ['title' => "Kamen Rider Wizard Hyper Battle DVD", 'category_id' => $this->Category('wizard'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2013-05-20'],
            ['title' => "Kamen Rider Gaim Hyper Battle DVD", 'category_id' => $this->Category('gaim'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2014-03-01'],
            ['title' => "Kamen Rider Drive: Type TV-Kun - Hunter & Monster!", 'category_id' => $this->Category('drive'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2014-11-29'],
            ['title' => "Kamen Rider Drive: Type High Speed!", 'category_id' => $this->Category('drive'), 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2015-03-02'],
            ['title' => "Kamen Rider Drive: Type Lupin!", 'category_id' => $this->Category('drive'), 'type' => 'hyper-battle-dvd', 'number' => 3, 'airdate' => '2015-11-02'],
            ['title' => "Kamen Rider Ghost: Ikkyu Eyecon Contention! Quick Wit Battle!!", 'category_id' => $this->Category('ghost'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2015-11-28'],
            ['title' => "Kamen Rider Ghost: Ikkyu Intimacy! Awaken, My Quick Wit Power!!", 'category_id' => $this->Category('ghost'), 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ghost: Ikkyu Intimacy! Awaken, My Quick Wit Power!! - Ending A", 'category_id' => $this->Category('ghost'), 'type' => 'hyper-battle-dvd', 'number' => 3, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ghost: Ikkyu Intimacy! Awaken, My Quick Wit Power!! - Ending B", 'category_id' => $this->Category('ghost'), 'type' => 'hyper-battle-dvd', 'number' => 4, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ghost: Truth! The Secret of the Heroic Eyecons!", 'category_id' => $this->Category('ghost'), 'type' => 'hyper-battle-dvd', 'number' => 5, 'airdate' => '2015-12-26'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Kamen Rider Lazer", 'category_id' => $this->Category('ex-aid'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2017-06-06'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Kamen Rider Para-DX", 'category_id' => $this->Category('ex-aid'), 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2017-08-01'],
            ['title' => "Kamen Rider Build: Birth! KumaTelevi!! vs Kamen Rider Grease", 'category_id' => $this->Category('build'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2018-03-14'],
            ['title' => "Kamen Rider Build: Kamen Rider Prime Rogue", 'category_id' => $this->Category('build'), 'type' => 'hyper-battle-dvd', 'number' => 2, 'airdate' => '2018-12-03'],
            ['title' => "Kamen Rider Zi-O Hyper Battle DVD: Kamen Rider BiBiBi no Bibill Geiz", 'category_id' => $this->Category('zi-o'), 'type' => 'hyper-battle-dvd', 'number' => 1, 'airdate' => '2019-09-01'],

            // Movie
            ['title' => "Kamen Rider Kuuga: Special Chapter", 'category_id' => $this->Category('kuuga'), 'type' => 'movie', 'number' => 1, 'airdate' => '2001-10-21'],
            ['title' => "Kamen Rider Agito: Project G4", 'category_id' => $this->Category('agito'), 'type' => 'movie', 'number' => 1, 'airdate' => '2001-09-22'],
            ['title' => "Kamen Rider Ryuki: Episode Final", 'category_id' => $this->Category('ryuki'), 'type' => 'movie', 'number' => 1, 'airdate' => '2002-08-17'],
            ['title' => "Kamen Rider 555: Paradise Lost", 'category_id' => $this->Category('555'), 'type' => 'movie', 'number' => 1, 'airdate' => '2003-08-16'],
            ['title' => "Kamen Rider Blade: Missing Ace", 'category_id' => $this->Category('blade'), 'type' => 'movie', 'number' => 1, 'airdate' => '2004-09-11'],
            ['title' => "Kamen Rider Hibiki & The Seven Senki", 'category_id' => $this->Category('hibiki'), 'type' => 'movie', 'number' => 1, 'airdate' => '2005-09-03'],
            ['title' => "Kamen Rider Kabuto: God Speed Love", 'category_id' => $this->Category('kabuto'), 'type' => 'movie', 'number' => 1, 'airdate' => '2006-08-05'],
            ['title' => "Kamen Rider Den-O: I’m Born!", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 1, 'airdate' => '2007-08-04'],
            ['title' => "Kamen Rider Kiva: King of the Castle in the Demon World", 'category_id' => $this->Category('kiva'), 'type' => 'movie', 'number' => 1, 'airdate' => '2008-08-09'],
            ['title' => "Kamen Rider Decade: All Riders vs Dai-Shocker", 'category_id' => $this->Category('decade'), 'type' => 'movie', 'number' => 1, 'airdate' => '2009-08-08'],
            ['title' => "Kamen Rider W: A to Z/The Gaia Memories of Fate", 'category_id' => $this->Category('w'), 'type' => 'movie', 'number' => 1, 'airdate' => '2010-08-07'],
            ['title' => "Kamen Rider OOO: Wonderful Shogun and the 21 Core Medals", 'category_id' => $this->Category('ooo'), 'type' => 'movie', 'number' => 1, 'airdate' => '2011-08-06'],
            ['title' => "Kamen Rider Fourze: Space, Here We Come!", 'category_id' => $this->Category('fourze'), 'type' => 'movie', 'number' => 1, 'airdate' => '2012-08-04'],
            ['title' => "Kamen Rider Wizard: In Magic Land", 'category_id' => $this->Category('wizard'), 'type' => 'movie', 'number' => 1, 'airdate' => '2013-08-03'],
            ['title' => "Kamen Rider Gaim: Great Soccer Battle! Golden Fruits Cup!", 'category_id' => $this->Category('gaim'), 'type' => 'movie', 'number' => 1, 'airdate' => '2014-07-19'],
            ['title' => "Kamen Rider Drive: Surprise Future", 'category_id' => $this->Category('drive'), 'type' => 'movie', 'number' => 1, 'airdate' => '2015-08-08'],
            ['title' => "Kamen Rider Ghost: The 100 Eyecons and Ghost’s Fateful Moment", 'category_id' => $this->Category('ghost'), 'type' => 'movie', 'number' => 1, 'airdate' => '2016-08-06'],
            ['title' => "Kamen Rider Ex-Aid: True Ending", 'category_id' => $this->Category('ex-aid'), 'type' => 'movie', 'number' => 1, 'airdate' => '2017-08-05'],
            ['title' => "Kamen Rider Build: Be the One", 'category_id' => $this->Category('build'), 'type' => 'movie', 'number' => 1, 'airdate' => '2018-08-04'],
            ['title' => "Kamen Rider Zi-O: Over Quartzer", 'category_id' => $this->Category('zi-o'), 'type' => 'movie', 'number' => 1, 'airdate' => '2019-07-26'],

            // Special
            ['title' => "Kamen Rider Kuuga Special: First Dream of the New Year", 'category_id' => $this->Category('kuuga'), 'type' => 'special', 'number' => 1, 'airdate' => '2001-01-02'],
            ['title' => "Kamen Rider Agito Special: A New Transformation", 'category_id' => $this->Category('agito'), 'type' => 'special', 'number' => 1, 'airdate' => '2001-10-01'],
            ['title' => "Kamen Rider Ryuki Special: 13 Riders", 'category_id' => $this->Category('ryuki'), 'type' => 'special', 'number' => 1, 'airdate' => '2002-09-19'],
            ['title' => "Kamen Rider Blade: New Generation - Part 1", 'category_id' => $this->Category('blade'), 'type' => 'special', 'number' => 1, 'airdate' => '2004-08-18'],
            ['title' => "Kamen Rider Blade: New Generation - Part 2", 'category_id' => $this->Category('blade'), 'type' => 'special', 'number' => 2, 'airdate' => '2004-08-18'],
            ['title' => "Kamen Rider Blade: New Generation - Part 3", 'category_id' => $this->Category('blade'), 'type' => 'special', 'number' => 3, 'airdate' => '2004-08-18'],
            ['title' => "Kamen Rider Blade: New Generation - Part 4", 'category_id' => $this->Category('blade'), 'type' => 'special', 'number' => 4, 'airdate' => '2004-08-18'],

            // V-Cinema
            ['title' => "Kamen Rider W Returns: Kamen Rider Accel", 'category_id' => $this->Category('w'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2011-04-21'],
            ['title' => "Kamen Rider W Returns: Kamen Rider Eternal", 'category_id' => $this->Category('w'), 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2011-07-21'],
            ['title' => "Kamen Rider Gaim Gaiden: Zangetsu and Baron", 'category_id' => $this->Category('gaim'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2015-04-22'],
            ['title' => "Kamen Rider Gaim Gaiden: Duke and Knuckle", 'category_id' => $this->Category('gaim'), 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2015-11-11'],
            ['title' => "Kamen Rider Gaim Gaiden: Gridon vs Bravo - Part 1", 'category_id' => $this->Category('gaim'), 'type' => 'v-cinema', 'number' => 3, 'airdate' => '2020-10-25'],
            ['title' => "Kamen Rider Gaim Gaiden: Gridon vs Bravo - Part 2", 'category_id' => $this->Category('gaim'), 'type' => 'v-cinema', 'number' => 4, 'airdate' => '2020-11-01'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Chaser", 'category_id' => $this->Category('drive'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2016-04-20'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Mach And Heart", 'category_id' => $this->Category('drive'), 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2016-11-16'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Brain", 'category_id' => $this->Category('drive'), 'type' => 'v-cinema', 'number' => 3, 'airdate' => '2019-04-28'],
            ['title' => "Kamen Rider Drive Saga: Kamen Rider Brain", 'category_id' => $this->Category('drive'), 'type' => 'v-cinema', 'number' => 4, 'airdate' => '2019-05-05'],
            ['title' => "Kamen Rider Ghost RE:BIRTH: Kamen Rider Specter", 'category_id' => $this->Category('ghost'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2017-04-19'],
            ['title' => "Kamen Rider Ex-Aid Trilogy: Another Ending Kamen Rider Brave & Snipe", 'category_id' => $this->Category('ex-aid'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2018-02-03'],
            ['title' => "Kamen Rider Ex-Aid Trilogy: Another Ending Kamen Rider Para-DX With Poppy", 'category_id' => $this->Category('ex-aid'), 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2018-02-17'],
            ['title' => "Kamen Rider Ex-Aid Trilogy: Another Ending Kamen Rider Genm Vs Lazer", 'category_id' => $this->Category('ex-aid'), 'type' => 'v-cinema', 'number' => 3, 'airdate' => '2018-03-03'],
            ['title' => "Kamen Rider Build New World: Kamen Rider Cross-Z", 'category_id' => $this->Category('build'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2019-01-25'],
            ['title' => "Kamen Rider Build New World: Kamen Rider Grease", 'category_id' => $this->Category('build'), 'type' => 'v-cinema', 'number' => 2, 'airdate' => '2019-09-06'],
            ['title' => "Kamen Rider Zi-O Next Time: Geiz Majesty", 'category_id' => $this->Category('zi-o'), 'type' => 'v-cinema', 'number' => 1, 'airdate' => '2020-02-28'],

            // Spin-Off
            ['title' => "Kamen Rider Drive: Kamen Rider 4 - Part 1", 'category_id' => $this->Category('drive'), 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Drive: Kamen Rider 4 - Part 2", 'category_id' => $this->Category('drive'), 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Drive: Kamen Rider 4 - Part 3", 'category_id' => $this->Category('drive'), 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 1", 'category_id' => $this->Category('ghost'), 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 2", 'category_id' => $this->Category('ghost'), 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 3", 'category_id' => $this->Category('ghost'), 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ghost: The Legend of Hero Alain - Part 4", 'category_id' => $this->Category('ghost'), 'type' => 'spin-off', 'number' => 4, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Sentai Gorider - Part 1", 'category_id' => $this->Category('ex-aid'), 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Sentai Gorider - Part 2", 'category_id' => $this->Category('ex-aid'), 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Sentai Gorider - Part 3", 'category_id' => $this->Category('ex-aid'), 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Build: ROGUE - Part 1", 'category_id' => $this->Category('build'), 'type' => 'spin-off', 'number' => 1, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Build: ROGUE - Part 2", 'category_id' => $this->Category('build'), 'type' => 'spin-off', 'number' => 2, 'airdate' => '2015-03-28'],
            ['title' => "Kamen Rider Build: ROGUE - Part 3", 'category_id' => $this->Category('build'), 'type' => 'spin-off', 'number' => 3, 'airdate' => '2015-03-28'],
            ['title' => "Rider Time Rider Time Kamen Rider Shinobi Episode 1", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 1, 'airdate' => '2019-03-31'],
            ['title' => "Rider Time Rider Time Kamen Rider Shinobi Episode 2", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 2, 'airdate' => '2019-04-07'],
            ['title' => "Rider Time Rider Time Kamen Rider Shinobi Episode 3", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 3, 'airdate' => '2019-04-14'],
            ['title' => "Rider Time Kamen Rider Ryuki Episode 1", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 4, 'airdate' => '2019-03-31'],
            ['title' => "Rider Time Kamen Rider Ryuki Episode 2", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 5, 'airdate' => '2019-04-07'],
            ['title' => "Rider Time Kamen Rider Ryuki Episode 3", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 6, 'airdate' => '2019-04-14'],
            ['title' => "Rider Time Kamen Rider Decade vs Zi-O Episode 1", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 7, 'airdate' => '2021-02-09'],
            ['title' => "Rider Time Kamen Rider Decade vs Zi-O Episode 2", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 8, 'airdate' => '2021-02-14'],
            ['title' => "Rider Time Kamen Rider Decade vs Zi-O Episode 3", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 9, 'airdate' => '2021-02-21'],
            ['title' => "Rider Time Kamen Rider Zi-O vs Decade Episode 1", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 10, 'airdate' => '2021-02-09'],
            ['title' => "Rider Time Kamen Rider Zi-O vs Decade Episode 2", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 11, 'airdate' => '2021-02-14'],
            ['title' => "Rider Time Kamen Rider Zi-O vs Decade Episode 3", 'category_id' => $this->Category('zi-o'), 'type' => 'spin-off', 'number' => 12, 'airdate' => '2021-02-21'],

            // Mini Series
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 1", 'category_id' => $this->Category('ghost'), 'type' => 'mini-series', 'number' => 1, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 2", 'category_id' => $this->Category('ghost'), 'type' => 'mini-series', 'number' => 2, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 3", 'category_id' => $this->Category('ghost'), 'type' => 'mini-series', 'number' => 3, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 4", 'category_id' => $this->Category('ghost'), 'type' => 'mini-series', 'number' => 4, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 5", 'category_id' => $this->Category('ghost'), 'type' => 'mini-series', 'number' => 5, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 6", 'category_id' => $this->Category('ghost'), 'type' => 'mini-series', 'number' => 6, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ghost: Legendary! Riders Souls! - Episode 7", 'category_id' => $this->Category('ghost'), 'type' => 'mini-series', 'number' => 7, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 1", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 1, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 2", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 2, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 3", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 3, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 4", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 4, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid \"Tricks\": Virtual Operations - Chapter 5", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 5, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 1", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 6, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 2", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 7, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 3", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 8, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Ex-Aid: Kamen Rider Snipe - Episode Zero - Part 4", 'category_id' => $this->Category('ex-aid'), 'type' => 'mini-series', 'number' => 9, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Build: Raising the Hazard Level - Chapter 1", 'category_id' => $this->Category('build'), 'type' => 'mini-series', 'number' => 1, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Build: Raising the Hazard Level - Chapter 2", 'category_id' => $this->Category('build'), 'type' => 'mini-series', 'number' => 2, 'airdate' => '2021-02-21'],
            ['title' => "Kamen Rider Build: Raising the Hazard Level - Chapter 3", 'category_id' => $this->Category('build'), 'type' => 'mini-series', 'number' => 3, 'airdate' => '2021-02-21'],

            // Movie Den-O
            ['title' => "Kamen Rider Den-O & Kiva: Climax Deka", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 2, 'airdate' => '2008-04-12'],
            ['title' => "Saraba Kamen Rider Den-O: Final Countdown", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 3, 'airdate' => '2008-10-04'],
            ['title' => "Cho Kamen Rider Den-O & Decade: Neo Generations – The Onigashima Warship", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 4, 'airdate' => '2009-05-01'],
            ['title' => "Cho-Den-O Trilogy: Episode Red – Zero no Star Twinkle", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 5, 'airdate' => '2010-05-22'],
            ['title' => "Cho-Den-O Trilogy: Episode Blue – The Dispatched Imagin Is Newtral", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 6, 'airdate' => '2010-06-05'],
            ['title' => "Cho-Den-O Trilogy: Episode Yellow – Treasure de End Pirates", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 7, 'airdate' => '2010-06-19'],
            ['title' => "Kamen Rider Den-O: Pretty Den-O Appears!", 'category_id' => $this->Category('den-o'), 'type' => 'movie', 'number' => 8, 'airdate' => '2020-08-14'],

            // Kamen Rider × Kamen Rider
            ['title' => "Kamen Rider × Kamen Rider W & Decade: Movie War 2010", 'category_id' => $this->Category('w'), 'type' => 'movie', 'number' => 2, 'airdate' => '2009-12-12'],
            ['title' => "Kamen Rider × Kamen Rider OOO & W Featuring Skull: Movie War Core", 'category_id' => $this->Category('ooo'), 'type' => 'movie', 'number' => 2, 'airdate' => '2010-12-18'],
            ['title' => "Kamen Rider × Kamen Rider Fourze & OOO: Movie War Mega Max", 'category_id' => $this->Category('fourze'), 'type' => 'movie', 'number' => 2, 'airdate' => '2011-12-10'],
            ['title' => "Kamen Rider × Kamen Rider Wizard & Fourze: Movie War Ultimatum", 'category_id' => $this->Category('wizard'), 'type' => 'movie', 'number' => 2, 'airdate' => '2012-12-08'],
            ['title' => "Kamen Rider × Kamen Rider Gaim & Wizard: The Fateful Sengoku Movie Battle", 'category_id' => $this->Category('gaim'), 'type' => 'movie', 'number' => 2, 'airdate' => '2013-12-14'],
            ['title' => "Kamen Rider × Kamen Rider Drive & Gaim: Movie War Full Throttle", 'category_id' => $this->Category('drive'), 'type' => 'movie', 'number' => 2, 'airdate' => '2014-12-13'],
            ['title' => "Kamen Rider × Kamen Rider Ghost & Drive: Super Movie Wars Genesis", 'category_id' => $this->Category('ghost'), 'type' => 'movie', 'number' => 2, 'airdate' => '2015-12-12'],
            ['title' => "Kamen Rider Heisei Generations: Dr. Pac-Man vs. Ex-Aid & Ghost with Legend Riders", 'category_id' => $this->Category('ex-aid'), 'type' => 'movie', 'number' => 2, 'airdate' => '2016-12-10'],
            ['title' => "Kamen Rider Heisei Generations Final: Build & Ex-Aid with Legend Riders", 'category_id' => $this->Category('build'), 'type' => 'movie', 'number' => 2, 'airdate' => '2017-12-09'],
            ['title' => "Kamen Rider Heisei Generations Forever", 'category_id' => $this->Category('zi-o'), 'type' => 'movie', 'number' => 2, 'airdate' => '2018-12-22'],

            // Super Hero Taisen
            ['title' => "OOO, Den-O, All Riders: Let's Go Kamen Riders", 'category_id' => $this->Category('ooo'), 'type' => 'movie', 'number' => 3, 'airdate' => '2011-04-01'],
            ['title' => "Kamen Rider × Super Sentai: Super Hero Taisen", 'category_id' => $this->Category('fourze'), 'type' => 'movie', 'number' => 3, 'airdate' => '2012-04-21'],
            ['title' => "Kamen Rider × Super Sentai × Space Sheriff: Super Hero Taisen Z", 'category_id' => $this->Category('wizard'), 'type' => 'movie', 'number' => 3, 'airdate' => '2013-04-27'],
            ['title' => "Heisei Rider vs. Showa Rider: Kamen Rider Taisen feat. Super Sentai", 'category_id' => $this->Category('gaim'), 'type' => 'movie', 'number' => 3, 'airdate' => '2014-03-29'],
            ['title' => "Super Hero Taisen GP: Kamen Rider 3", 'category_id' => $this->Category('drive'), 'type' => 'movie', 'number' => 3, 'airdate' => '2015-03-21'],
            ['title' => "Kamen Rider 1", 'category_id' => $this->Category('ghost'), 'type' => 'movie', 'number' => 3, 'airdate' => '2016-03-26'],
            ['title' => "Kamen Rider × Super Sentai: Chou Super Hero Taisen", 'category_id' => $this->Category('ex-aid'), 'type' => 'movie', 'number' => 3, 'airdate' => '2017-03-25'],

            // Extra
            ['title' => "Kamen Rider: The First", 'category_id' => $this->Category('kamen-rider'), 'type' => 'movie', 'number' => 4, 'airdate' => '2005-12-05'],
            ['title' => "Kamen Rider: The Next", 'category_id' => $this->Category('kamen-rider'), 'type' => 'movie', 'number' => 5, 'airdate' => '2007-08-27'],
            ['title' => "Kamen Rider Amazons The Movie: The Last Judgement", 'category_id' => $this->Category('amazon'), 'type' => 'movie', 'number' => 1, 'airdate' => '2019-05-19'],


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
