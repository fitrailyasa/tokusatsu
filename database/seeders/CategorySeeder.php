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
                'img' => "Kamen Rider/Era Showa/0.1 IchigoNigoRiders (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'V3',
                'img' => "Kamen Rider/Era Showa/0.2 V3RidermanRiders (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'X',
                'img' => "Kamen Rider/Era Showa/0.3 XRider.jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Amazon',
                'img' => "Kamen Rider/Era Showa/0.4 AmazonRider (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Stronger',
                'img' => "Kamen Rider/Era Showa/0.5 StrongerRider (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Skyrider',
                'img' => "Kamen Rider/Era Showa/0.6 Skyrider (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Super-1',
                'img' => "Kamen Rider/Era Showa/0.7 Super1Rider (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'ZX',
                'img' => "Kamen Rider/Era Showa/0.7.Movie 10thKamenRider.jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Black',
                'img' => "Kamen Rider/Era Showa/0.8 BlackRiders (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Black RX',
                'img' => "Kamen Rider/Era Showa/0.9 BlackRXRiders (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'Shin',
                'img' => "Kamen Rider/Era Showa/0.13 ShinRider.jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'ZO',
                'img' => "Kamen Rider/Era Showa/0.14 ZORider.jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 2,
                'name' => 'J',
                'img' => "Kamen Rider/Era Showa/0.15 JRider.jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kuuga',
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1 KuugaRider (5).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Agito',
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2 AgitoRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ryuki',
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3 RyukiRiders (2).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => '555',
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4 FaizRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Blade',
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5 BladeRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Hibiki',
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6 HibikiRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kabuto',
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7 KabutoRiders (2).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Den-O',
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8 Den-ORiders (2).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Kiva',
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9 KivaRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Decade',
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10 DecadeRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'W',
                'img' => "Kamen Rider/Era Heisei/11. W/2.1 WRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'OOO',
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2 OooRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Fourze',
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3 FourzeRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Wizard',
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4 WizardRiders (2).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Gaim',
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5 GaimRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Drive',
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6 DriveRiders (2).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ghost',
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7 GhostRiders (2).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Ex-Aid',
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8 Ex-AidRiders (3).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Build',
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9 BuildRiders (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 2,
                'name' => 'Zi-O',
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10 Zi-ORiders (1).jpg"  
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Zero-One',
                'img' => "Kamen Rider/Era Reiwa/1. Zero-One/Zero-One (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Saber',
                'img' => "Kamen Rider/Era Reiwa/2. Saber/Saber (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Revice',
                'img' => "Kamen Rider/Era Reiwa/3. Revice/Revice (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Geats',
                'img' => "Kamen Rider/Era Reiwa/4. Geats/Geats (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 2,
                'name' => 'Gotchard',
                'img' => "Kamen Rider/Era Reiwa/5. Gotchard/Gotchard (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Himitsu Sentai Gorenger (1975-1977)',
                'img' => "Super Sentai/Era Showa/1. Himitsu Sentai Goranger Five Rangers (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'J.A.K.Q. Dengekitai (1977)',
                'img' => "Super Sentai/Era Showa/2. J.A.K.Q. Dengekitai JAKQ (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Battle Fever J (1979-1980)',
                'img' => "Super Sentai/Era Showa/3. Battle Fever J (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Denshi Sentai Denziman (1980-1981)',
                'img' => "Super Sentai/Era Showa/4. Denshi Sentai Denjiman (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Taiyou Sentai Sun Vulcan (1981-1982)',
                'img' => "Super Sentai/Era Showa/5. Taiyo Sentai Sun Vulcan (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Dai Sentai Goggle V (1982-1983)',
                'img' => "Super Sentai/Era Showa/6. Dai Sentai Goggle Five (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Kagaku Sentai Dynaman (1983-1984)',
                'img' => "Super Sentai/Era Showa/7. Kagaku Sentai Dynaman (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Choudenshi Bioman (1984-1985)',
                'img' => "Super Sentai/Era Showa/8. Choudenshi Bioman (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Dengeki Sentai Changeman (1985-1986)',
                'img' => "Super Sentai/Era Showa/9. Dengeki Sentai Changeman (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Choushinsei Flashman (1986-1987)',
                'img' => "Super Sentai/Era Showa/10. Choushinsei Flashman (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Hikari Sentai Maskman (1987-1988)',
                'img' => "Super Sentai/Era Showa/11. Hikari Sentai Maskman (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 3,
                'name' => 'Choujuu Sentai Liveman (1988-1989)',
                'img' => "Super Sentai/Era Showa/12. Choujuu Sentai Liveman (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kousoku Sentai Turboranger (1989-1990)',
                'img' => "Super Sentai/Era Heisei/13. Kousoku Sentai Turboranger (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Chikyuu Sentai Fiveman (1990-1991)',
                'img' => "Super Sentai/Era Heisei/14. Chikyuu Sentai Fiveman (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Choujin Sentai Jetman (1991-1992)',
                'img' => "Super Sentai/Era Heisei/15. Choujin Sentai Jetman (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kyouryuu Sentai Zyuranger (1992-1993)',
                'img' => "Super Sentai/Era Heisei/16. Kyouryuu Sentai Zyuranger (JPN) - Mighty Morphin Power Rangers (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Gosei Sentai Dairanger (1993-1994)',
                'img' => "Super Sentai/Era Heisei/17. Gosei Sentai Dairanger (JPN) - Mighty Morphin Power Rangers 2 (USA) - Star Ranger (INA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Ninja Sentai Kakuranger (1994-1995)',
                'img' => "Super Sentai/Era Heisei/18. Ninja Sentai Kakuranger (JPN) - Mighty Morphin Power Alien Rangers 3 (USA) - Ninja Ranger (INA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Chouriki Sentai Ohranger (1995-1996)',
                'img' => "Super Sentai/Era Heisei/19. Choriki Sentai Ohranger (JPN) - Power Rangers Zeo (USA) - Oh Ranger (INA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Gekisou Sentai Carranger (1996-1997)',
                'img' => "Super Sentai/Era Heisei/20. Gekisou Sentai Carranger (JPN) - Power Rangers Turbo (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Denji Sentai Megaranger (1997-1998)',
                'img' => "Super Sentai/Era Heisei/21. Denji Sentai Megaranger (JPN) - Power Rangers In Space (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Seijuu Sentai Gingaman (1998-1999)',
                'img' => "Super Sentai/Era Heisei/22. Seijuu Sentai Gingaman (JPN) - Power Rangers Lost Galaxy (USA) (6).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kyuukyuu Sentai Go Go V (1999-2000)',
                'img' => "Super Sentai/Era Heisei/23. KyuKyu Sentai GoGo V (JPN) - Power Rangers Lightspeed Rescue(USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Mirai Sentai Timeranger (2000-2001)',
                'img' => "Super Sentai/Era Heisei/24. Mirai Sentai Timeranger (JPN) - Power Rangers Time Force (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Hyakujuu Sentai Gaoranger (2001-2002)',
                'img' => "Super Sentai/Era Heisei/25. Hyaku Juu Sentai Gaoranger (JPN) - Power Rangers Wild Force (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Ninpuu Sentai Hurricaneger (2002-2003)',
                'img' => "Super Sentai/Era Heisei/26. Ninpuu Sentai Hurricanger (JPN) - Power Rangers Ninja Storm (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Bakuryuu Sentai Abaranger (2003-2004)',
                'img' => "Super Sentai/Era Heisei/27. BakuRyuu Sentai Abaranger (JPN) - Power Rangers Dino Thunder (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Tokusou Sentai Dekaranger (2004-2005)',
                'img' => "Super Sentai/Era Heisei/28. Tokusou Sentai Dekaranger (JPN) - Power Rangers S.P.D (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Mahou Sentai Magiranger (2005-2006)',
                'img' => "Super Sentai/Era Heisei/29. Mahou Sentai Magiranger (JPN) - Power Rangers Mystic Force (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Gougou Sentai Boukenger (2006-2007)',
                'img' => "Super Sentai/Era Heisei/30. Gougou Sentai Boukenger (JPN) - Power Rangers Operation Overdrive (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Juuken Sentai Gekiranger (2007-2008)',
                'img' => "Super Sentai/Era Heisei/31. Juken Sentai Gekiranger (JPN) - Power Rangers Jungle Fury (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Engine Sentai Go-onger (2008-2009)',
                'img' => "Super Sentai/Era Heisei/32. Engine Sentai Go-Onger (JPN) - Power Rangers RPM (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Samurai Sentai Shinkenger (2009-2010)',
                'img' => "Super Sentai/Era Heisei/33. Samurai Sentai Shinkenger (JPN) - Power Rangers Samurai (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Tensou Sentai Goseiger (2010-2011)',
                'img' => "Super Sentai/Era Heisei/34. Tensou Sentai Goseiger (JPN) - Power Rangers Megaforce (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kaizoku Sentai Gokaiger (2011-2012)',
                'img' => "Super Sentai/Era Heisei/35. Kaizoku Sentai Gokaiger (JPN) - Power Rangers Super Megaforce (USA) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Tokumei Sentai Go-Busters (2012-2013)',
                'img' => "Super Sentai/Era Heisei/36. Tokumei Sentai Go-Busters  (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Zyuden Sentai Kyoryuger (2013-2014)',
                'img' => "Super Sentai/Era Heisei/37. Zyuden Sentai Kyoryuger (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Ressha Sentai ToQger (2014-2015)',
                'img' => "Super Sentai/Era Heisei/38. Ressha Sentai Tokkyuger (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Shuriken Sentai Ninninger (2015-2016)',
                'img' => "Super Sentai/Era Heisei/39. Shuriken Sentai Ninninger (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Doubutsu Sentai Zyuohger (2016-2017)',
                'img' => "Super Sentai/Era Heisei/40. Doubutsu Sentai Zyouhger (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Uchuu Sentai Kyuuranger (2017-2018)',
                'img' => "Super Sentai/Era Heisei/41. Uchuu Sentai Kyuuranger (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kaitou Sentai Lupinranger VS Keisatsu Sentai Patranger (2018-2019)',
                'img' => "Super Sentai/Era Heisei/42. Kaitou Sentai Lupinranger _ Keisatsu Sentai Patranger (Lupat Rangers) (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 3,
                'name' => 'Kishiryu Sentai Ryusoulger (2019-2020)',
                'img' => "Super Sentai/Era Heisei/43. Kishiryu Sentai Ryusoulger (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman',
                'img' => "Ultraman/Era Showa/1. Ultraman/Ultraman (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultra Seven',
                'img' => "Ultraman/Era Showa/2. Ultra Seven/Ultra Seven (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Jack',
                'img' => "Ultraman/Era Showa/3. Ultraman Jack/Ultraman Jack (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Ace',
                'img' => "Ultraman/Era Showa/4. Ultraman Ace/Ultraman Ace (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Taro',
                'img' => "Ultraman/Era Showa/5. Ultraman Taro/Ultraman Taro (2).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Leo',
                'img' => "Ultraman/Era Showa/6. Ultraman Leo/Ultraman Leo (2).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman 80',
                'img' => "Ultraman/Era Showa/7. Ultraman 80/Ultraman 80 (1).jpg"
            ],
            [
                'era_id' => 1,
                'franchise_id' => 1,
                'name' => 'Ultraman Zoffy',
                'img' => "Ultraman/Era Showa/8. Ultraman Zoffy/Ultraman Zoffy (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Tiga',
                'img' => "Ultraman/Era Heisei/1. Ultraman Tiga/Ultraman Tiga (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Dyna',
                'img' => "Ultraman/Era Heisei/2. Ultraman Dyna/Ultraman Dyna (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Gaia',
                'img' => "Ultraman/Era Heisei/3. Ultraman Gaia/Ultraman Gaia (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Cosmos',
                'img' => "Ultraman/Era Heisei/4. Ultraman Cosmos/Ultraman Cosmos (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Nexus',
                'img' => "Ultraman/Era Heisei/5. Ultraman Nexus/Ultraman Nexus (3).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Max',
                'img' => "Ultraman/Era Heisei/6. Ultraman Max/Ultraman Max (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Zero',
                'img' => "Ultraman/Era Heisei/7. Ultraman Zero/Ultraman Zero (3).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Ginga',
                'img' => "Ultraman/Era Heisei/8. Ultraman Ginga/Ultraman Ginga (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Ginga S',
                'img' => "Ultraman/Era Heisei/9. Ultraman Ginga S/Ultraman Ginga S (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman X',
                'img' => "Ultraman/Era Heisei/10. Ultraman X/Ultraman X (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Orb',
                'img' => "Ultraman/Era Heisei/11. Ultraman Orb/Ultraman Orb (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman Geed',
                'img' => "Ultraman/Era Heisei/12. Ultraman Geed/Ultraman Geed (1).jpg"
            ],
            [
                'era_id' => 2,
                'franchise_id' => 1,
                'name' => 'Ultraman R/B',
                'img' => "Ultraman/Era Heisei/13. Ultraman RB/Ultraman RB (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 3,
                'name' => 'Mashin Sentai Kiramager (2020-2021)',
                'img' => "Super Sentai/Era Reiwa/1. Mashin Sentai Kiramager/Mashin Sentai Kiramager (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 3,
                'name' => 'Kikai Sentai Zenkaiger (2021-2022)',
                'img' => "Super Sentai/Era Reiwa/2. Kikai Sentai Zenkaiger/Kikai Sentai Zenkaiger (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 3,
                'name' => 'Avataro Sentai Donbrothers (2022-2023)',
                'img' => "Super Sentai/Era Reiwa/3. Avataro Sentai Donbrothers/Avataro Sentai Donbrothers (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 3,
                'name' => 'Ohsama Sentai King-Ohger (2023-2024)',
                'img' => "Super Sentai/Era Reiwa/4. Ohsama Sentai King-Ohger/Ohsama Sentai King-Ohger (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 3,
                'name' => 'Bakuage Sentai Boonboomger (2024-2025)',
                'img' => "Super Sentai/Era Reiwa/5. Bakuage Sentai Boonboomger/Bakuage Sentai Boonboomger (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 1,
                'name' => 'Ultraman Taiga',
                'img' => "Ultraman/Era Reiwa/1. Ultraman Taiga/Ultraman Taiga (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 1,
                'name' => 'Ultraman Z',
                'img' => "Ultraman/Era Reiwa/2. Ultraman Z/Ultraman Z (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 1,
                'name' => 'Ultraman Trigger',
                'img' => "Ultraman/Era Reiwa/3. Ultraman Trigger/Ultraman Trigger (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 1,
                'name' => 'Ultraman Decker',
                'img' => "Ultraman/Era Reiwa/4. Ultraman Decker/Ultraman Decker (1).jpg"
            ],
            [
                'era_id' => 3,
                'franchise_id' => 1,
                'name' => 'Ultraman Blazar',
                'img' => "Ultraman/Era Reiwa/5. Ultraman Blazar/Ultraman Blazar (1).jpg"
            ],

        ];
        Category::query()->insert($categories);
    }
}
