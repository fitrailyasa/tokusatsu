<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $showa = $this->Era('Showa');
        $heisei = $this->Era('Heisei');
        $reiwa = $this->Era('Reiwa');
        $ultraman = $this->Franchise('Ultraman');
        $kamenrider = $this->Franchise('Kamen Rider');
        $supersentai = $this->Franchise('Super Sentai');

        $categories = [
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Kamen Rider (1971 - 1973)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.1 IchigoNigoRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'V3 (1973 - 1974)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.2 V3RidermanRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'X (1974)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.3 XRider.jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Amazon (1974 - 1975)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.4 AmazonRider (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Stronger (1975)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.5 StrongerRider (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Skyrider (1979 - 1980)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.6 SkyRider (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Super-1 (1980 - 1981)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.7 Super1Rider (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'ZX (1984)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.7.Movie 10thKamenRider.jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Black (1987 - 1988)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.8 BlackRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Black RX (1988 - 1989)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.9 BlackRXRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'Shin (1992)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.13 ShinRider.jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'ZO (1993)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.14 ZORider.jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'name' => 'J (1994)',
                'desc' => '',
                'img' => "Kamen Rider/Era Showa/0.15 JRider.jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Kuuga (2000 - 2001)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/1. Kuuga/1.1 kuugaRider (5).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Agito (2001 - 2002)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/2. Agito/1.2 AgitoRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Ryuki (2002 - 2003)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/3. Ryuki/1.3 RyukiRiders (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => '555 (2003 - 2004)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/4. Faiz/1.4 FaizRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Blade (2004 - 2005)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/5. Blade/1.5 BladeRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Hibiki (2005 - 2006)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/6. Hibiki/1.6 HibikiRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Kabuto (2006 - 2007)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/7. Kabuto/1.7 KabutoRiders (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Den-O (2007 - 2008)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/8. Den-O/1.8 Den-ORiders (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Kiva (2008 - 2009)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/9. Kiva/1.9 KivaRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Decade (2009)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/10. Decade/1.10 DecadeRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'W (2009 - 2010)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/11. W/2.1 WRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'OOO (2010 - 2011)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/12. Ooo/2.2 OooRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Fourze (2011 - 2012)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/13. Fourze/2.3 FourzeRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Wizard (2012 - 2013)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/14. Wizard/2.4 WizardRiders (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Gaim (2013 - 2014)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/15. Gaim/2.5 GaimRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Drive (2014 - 2015)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/16. Drive/2.6 DriveRiders (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Ghost (2015 - 2016)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/17. Ghost/2.7 GhostRiders (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Ex-Aid (2016 - 2017)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/18. Ex-Aid/2.8 Ex-AidRiders (3).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Build (2017 - 2018)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/19. Build/2.9 BuildRiders (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'name' => 'Zi-O (2018 - 2019)',
                'desc' => '',
                'img' => "Kamen Rider/Era Heisei/20. Zi-O/2.10 Zi-ORiders (2).jpg"  
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'name' => 'Zero-One (2019 - 2020)',
                'desc' => '',
                'img' => "Kamen Rider/Era Reiwa/1. Zero-One/Zero-One (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'name' => 'Saber (2020 - 2021)',
                'desc' => '',
                'img' => "Kamen Rider/Era Reiwa/2. Saber/Saber (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'name' => 'Revice (2021 - 2022)',
                'desc' => '',
                'img' => "Kamen Rider/Era Reiwa/3. Revice/Revice (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'name' => 'Geats (2022 - 2023)',
                'desc' => '',
                'img' => "Kamen Rider/Era Reiwa/4. Geats/Geats (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'name' => 'Gotchard (2023 - 2024)',
                'desc' => '',
                'img' => "Kamen Rider/Era Reiwa/5. Gotchard/Gotchard (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Himitsu Sentai Gorenger (1975-1977)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/1. Himitsu Sentai Goranger Five Rangers (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'J.A.K.Q. Dengekitai (1977)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/2. J.A.K.Q. Dengekitai JAKQ (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Battle Fever J (1979-1980)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/3. Battle Fever J (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Denshi Sentai Denziman (1980-1981)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/4. Denshi Sentai Denjiman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Taiyou Sentai Sun Vulcan (1981-1982)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/5. Taiyo Sentai Sun Vulcan (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Dai Sentai Goggle V (1982-1983)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/6. Dai Sentai Goggle Five (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Kagaku Sentai Dynaman (1983-1984)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/7. Kagaku Sentai Dynaman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Choudenshi Bioman (1984-1985)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/8. Choudenshi Bioman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Dengeki Sentai Changeman (1985-1986)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/9. Dengeki Sentai Changeman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Choushinsei Flashman (1986-1987)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/10. Choushinsei Flashman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Hikari Sentai Maskman (1987-1988)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/11. Hikari Sentai Maskman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $supersentai,
                'name' => 'Choujuu Sentai Liveman (1988-1989)',
                'desc' => '',
                'img' => "Super Sentai/Era Showa/12. Choujuu Sentai Liveman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Kousoku Sentai Turboranger (1989-1990)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/13. Kousoku Sentai Turboranger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Chikyuu Sentai Fiveman (1990-1991)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/14. Chikyuu Sentai Fiveman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Choujin Sentai Jetman (1991-1992)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/15. Choujin Sentai Jetman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Kyouryuu Sentai Zyuranger (1992-1993)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/16. Kyouryuu Sentai Zyuranger (JPN) - Mighty Morphin Power Rangers (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Gosei Sentai Dairanger (1993-1994)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/17. Gosei Sentai Dairanger (JPN) - Mighty Morphin Power Rangers 2 (USA) - Star Ranger (INA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Ninja Sentai Kakuranger (1994-1995)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/18. Ninja Sentai Kakuranger (JPN) - Mighty Morphin Power Alien Rangers 3 (USA) - Ninja Ranger (INA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Chouriki Sentai Ohranger (1995-1996)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/19. Choriki Sentai Ohranger (JPN) - Power Rangers Zeo (USA) - Oh Ranger (INA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Gekisou Sentai Carranger (1996-1997)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/20. Gekisou Sentai Carranger (JPN) - Power Rangers Turbo (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Denji Sentai Megaranger (1997-1998)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/21. Denji Sentai Megaranger (JPN) - Power Rangers In Space (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Seijuu Sentai Gingaman (1998-1999)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/22. Seijuu Sentai Gingaman (JPN) - Power Rangers Lost Galaxy (USA) (6).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Kyuukyuu Sentai Go Go V (1999-2000)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/23. KyuKyu Sentai GoGo V (JPN) - Power Rangers Lightspeed Rescue(USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Mirai Sentai Timeranger (2000-2001)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/24. Mirai Sentai Timeranger (JPN) - Power Rangers Time Force (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Hyakujuu Sentai Gaoranger (2001-2002)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/25. Hyaku Juu Sentai Gaoranger (JPN) - Power Rangers Wild Force (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Ninpuu Sentai Hurricaneger (2002-2003)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/26. Ninpuu Sentai Hurricanger (JPN) - Power Rangers Ninja Storm (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Bakuryuu Sentai Abaranger (2003-2004)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/27. BakuRyuu Sentai Abaranger (JPN) - Power Rangers Dino Thunder (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Tokusou Sentai Dekaranger (2004-2005)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/28. Tokusou Sentai Dekaranger (JPN) - Power Rangers S.P.D (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Mahou Sentai Magiranger (2005-2006)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/29. Mahou Sentai Magiranger (JPN) - Power Rangers Mystic Force (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Gougou Sentai Boukenger (2006-2007)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/30. Gougou Sentai Boukenger (JPN) - Power Rangers Operation Overdrive (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Juuken Sentai Gekiranger (2007-2008)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/31. Juken Sentai Gekiranger (JPN) - Power Rangers Jungle Fury (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Engine Sentai Go-onger (2008-2009)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/32. Engine Sentai Go-Onger (JPN) - Power Rangers RPM (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Samurai Sentai Shinkenger (2009-2010)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/33. Samurai Sentai Shinkenger (JPN) - Power Rangers Samurai (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Tensou Sentai Goseiger (2010-2011)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/34. Tensou Sentai Goseiger (JPN) - Power Rangers Megaforce (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Kaizoku Sentai Gokaiger (2011-2012)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/35. Kaizoku Sentai Gokaiger (JPN) - Power Rangers Super Megaforce (USA) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Tokumei Sentai Go-Busters (2012-2013)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/36. Tokumei Sentai Go-Busters  (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Zyuden Sentai Kyoryuger (2013-2014)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/37. Zyuden Sentai Kyoryuger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Ressha Sentai ToQger (2014-2015)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/38. Ressha Sentai Tokkyuger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Shuriken Sentai Ninninger (2015-2016)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/39. Shuriken Sentai Ninninger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Doubutsu Sentai Zyuohger (2016-2017)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/40. Doubutsu Sentai Zyouhger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Uchuu Sentai Kyuuranger (2017-2018)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/41. Uchuu Sentai Kyuuranger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Kaitou Sentai Lupinranger VS Keisatsu Sentai Patranger (2018-2019)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/42. Kaitou Sentai Lupinranger _ Keisatsu Sentai Patranger (Lupat Rangers) (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $supersentai,
                'name' => 'Kishiryu Sentai Ryusoulger (2019-2020)',
                'desc' => '',
                'img' => "Super Sentai/Era Heisei/43. Kishiryu Sentai Ryusoulger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman',
                'desc' => '',
                'img' => "Ultraman/Era Showa/1. Ultraman/Ultraman (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultra Seven',
                'desc' => '',
                'img' => "Ultraman/Era Showa/2. Ultra Seven/Ultra Seven (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Jack',
                'desc' => '',
                'img' => "Ultraman/Era Showa/3. Ultraman Jack/Ultraman Jack (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Ace',
                'desc' => '',
                'img' => "Ultraman/Era Showa/4. Ultraman Ace/Ultraman Ace (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Taro',
                'desc' => '',
                'img' => "Ultraman/Era Showa/5. Ultraman Taro/Ultraman Taro (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Leo',
                'desc' => '',
                'img' => "Ultraman/Era Showa/6. Ultraman Leo/Ultraman Leo (2).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman 80',
                'desc' => '',
                'img' => "Ultraman/Era Showa/7. Ultraman 80/Ultraman 80 (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $showa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Zoffy',
                'desc' => '',
                'img' => "Ultraman/Era Showa/8. Ultraman Zoffy/Ultraman Zoffy (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Tiga',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/1. Ultraman Tiga/Ultraman Tiga (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Dyna',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/2. Ultraman Dyna/Ultraman Dyna (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Gaia',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/3. Ultraman Gaia/Ultraman Gaia (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Cosmos',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/4. Ultraman Cosmos/Ultraman Cosmos (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Nexus',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/5. Ultraman Nexus/Ultraman Nexus (3).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Max',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/6. Ultraman Max/Ultraman Max (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Zero',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/7. Ultraman Zero/Ultraman Zero (3).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Ginga',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/8. Ultraman Ginga/Ultraman Ginga (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Ginga S',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/9. Ultraman Ginga S/Ultraman Ginga S (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman X',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/10. Ultraman X/Ultraman X (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Orb',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/11. Ultraman Orb/Ultraman Orb (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Geed',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/12. Ultraman Geed/Ultraman Geed (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $heisei,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman R/B',
                'desc' => '',
                'img' => "Ultraman/Era Heisei/13. Ultraman RB/Ultraman RB (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $supersentai,
                'name' => 'Mashin Sentai Kiramager (2020-2021)',
                'desc' => '',
                'img' => "Super Sentai/Era Reiwa/1. Mashin Sentai Kiramager/Mashin Sentai Kiramager (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $supersentai,
                'name' => 'Kikai Sentai Zenkaiger (2021-2022)',
                'desc' => '',
                'img' => "Super Sentai/Era Reiwa/2. Kikai Sentai Zenkaiger/Kikai Sentai Zenkaiger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $supersentai,
                'name' => 'Avataro Sentai Donbrothers (2022-2023)',
                'desc' => '',
                'img' => "Super Sentai/Era Reiwa/3. Avataro Sentai Donbrothers/Avataro Sentai Donbrothers (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $supersentai,
                'name' => 'Ohsama Sentai King-Ohger (2023-2024)',
                'desc' => '',
                'img' => "Super Sentai/Era Reiwa/4. Ohsama Sentai King-Ohger/Ohsama Sentai King-Ohger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $supersentai,
                'name' => 'Bakuage Sentai Boonboomger (2024-2025)',
                'desc' => '',
                'img' => "logo.png"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Taiga',
                'desc' => '',
                'img' => "Ultraman/Era Reiwa/1. Ultraman Taiga/Ultraman Taiga (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Z',
                'desc' => '',
                'img' => "Ultraman/Era Reiwa/2. Ultraman Z/Ultraman Z (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Trigger',
                'desc' => '',
                'img' => "Ultraman/Era Reiwa/3. Ultraman Trigger/Ultraman Trigger (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Decker',
                'desc' => '',
                'img' => "Ultraman/Era Reiwa/4. Ultraman Decker/Ultraman Decker (1).jpg"
            ],
            [
                'id' => Str::uuid(),
                'era_id' => $reiwa,
                'franchise_id' => $ultraman,
                'name' => 'Ultraman Blazar',
                'desc' => '',
                'img' => "logo.png"
            ],

        ];
        Category::query()->insert($categories);
    }

    private function Era(string $name): string
    {
        $era = Era::where('name', $name)->first();
        if (!$era) {
            $era = Era::create([
                'id' => Str::uuid(),
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
                'id' => Str::uuid(),
                'name' => $name,
            ]);
        }
        return $franchise->id;
    }
}
