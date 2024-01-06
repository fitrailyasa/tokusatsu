<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Kamen Rider',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'V3',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'X',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Amazon',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Stronger',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Skyrider',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Super-1',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'ZX',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Black',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Black RX',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Shin',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'ZO',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'J',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kuuga',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Agito',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ryuki',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => '555',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Blade',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Hibiki',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kabuto',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Den-O',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kiva',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Decade',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'W',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'OOO',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Fourze',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Wizard',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Gaim',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Drive',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ghost',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ex-Aid',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Build',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Zi-O',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Zero-One',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Saber',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Revice',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Geats',
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Gotchard',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Himitsu Sentai Gorenger (1975-1977)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'J.A.K.Q. Dengekitai (1977)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Battle Fever J (1979-1980)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Denshi Sentai Denziman (1980-1981)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Taiyou Sentai Sun Vulcan (1981-1982)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Dai Sentai Goggle V (1982-1983)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Kagaku Sentai Dynaman (1983-1984)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Choudenshi Bioman (1984-1985)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Dengeki Sentai Changeman (1985-1986)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Choushinsei Flashman (1986-1987)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Hikari Sentai Maskman (1987-1988)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Choujuu Sentai Liveman (1988-1989)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kousoku Sentai Turboranger (1989-1990)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Chikyuu Sentai Fiveman (1990-1991)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Choujin Sentai Jetman (1991-1992)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kyouryuu Sentai Zyuranger (1992-1993)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Gosei Sentai Dairanger (1993-1994)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Ninja Sentai Kakuranger (1994-1995)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Chouriki Sentai Ohranger (1995-1996)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Gekisou Sentai Carranger (1996-1997)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Denji Sentai Megaranger (1997-1998)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Seijuu Sentai Gingaman (1998-1999)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kyuukyuu Sentai Go Go V (1999-2000)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Mirai Sentai Timeranger (2000-2001)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Hyakujuu Sentai Gaoranger (2001-2002)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Ninpuu Sentai Hurricaneger (2002-2003)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Bakuryuu Sentai Abaranger (2003-2004)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Tokusou Sentai Dekaranger (2004-2005)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Mahou Sentai Magiranger (2005-2006)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Gougou Sentai Boukenger (2006-2007)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Juuken Sentai Gekiranger (2007-2008)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Engine Sentai Go-onger (2008-2009)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Samurai Sentai Shinkenger (2009-2010)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Tensou Sentai Goseiger (2010-2011)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kaizoku Sentai Gokaiger (2011-2012)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Tokumei Sentai Go-Busters (2012-2013)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Zyuden Sentai Kyoryuger (2013-2014)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Ressha Sentai ToQger (2014-2015)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Shuriken Sentai Ninninger (2015-2016)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Doubutsu Sentai Zyuohger (2016-2017)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Uchuu Sentai Kyuuranger (2017-2018)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kaitou Sentai Lupinranger VS Keisatsu Sentai Patranger (2018-2019)',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kishiryu Sentai Ryusoulger (2019-2020)',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraseven',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Jack',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Ace',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Taro',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Leo',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman 80',
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Zoffy',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Tiga',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Dyna',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Gaia',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Cosmos',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Nexus',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Max',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Zero',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Ginga',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Ginga S',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman X',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Orb',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Geed',
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman R/B',
            ],
        ];
        Category::query()->insert($categories);
    }
}
