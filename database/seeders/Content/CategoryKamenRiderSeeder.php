<?php

namespace Database\Seeders\Content;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryKamenRiderSeeder extends Seeder
{
    public function run(): void
    {
        $showa = $this->Era('Showa');
        $heisei = $this->Era('Heisei');
        $reiwa = $this->Era('Reiwa');
        $kamenrider = $this->Franchise('Kamen Rider');

        $data = collect([
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider',
                'name' => 'Kamen Rider',
                'slug' => Str::slug('Kamen Rider', '-'),
                'description' => 'Kamen Rider (仮面ライダー, Kamen Raidā, "Masked Rider"), is a Japanese tokusatsu drama and the first installment in what would be known as the Kamen Rider Series. It is the first entry of the Showa Era and aired from April 3, 1971 to February 10, 1973 on the Mainichi Broadcasting System and NET TV (now TV Asahi). With 98 episodes, it is the longest entry of the franchise to date.',
                'img' => 'category/showa-rider-logo-1.webp',
                'first_aired' => '1971-04-03',
                'last_aired' => '1973-02-10',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider V3',
                'name' => 'V3',
                'slug' => Str::slug('V3', '-'),
                'description' => 'Kamen Rider V3 (仮面ライダーV3ブイスリー, Kamen Raidā Bui Surī, "Masked Rider V3" in English), is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the second series to debut in the Showa Era, serving as a direct sequel to the original Kamen Rider. A joint collaboration between Ishimori Productions and Toei, the series aired from February 17, 1973 to February 9, 1974 on the Mainichi Broadcasting System and NET TV (now TV Asahi), with a total of 52 episodes.',
                'img' => 'category/showa-rider-logo-2.webp',
                'first_aired' => '1973-02-17',
                'last_aired' => '1974-02-09',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider X',
                'name' => 'Rider X',
                'slug' => Str::slug('Rider X', '-'),
                'description' => 'Kamen Rider X (仮面ライダーＸエックス, Kamen Raidā Ekkusu, translated as "Masked Rider X") is a Japanese tokusatsu drama and the third installment of the Kamen Rider Series. It is the third series to debut during the Showa Era and aired from February 16, 1974 to October 12, 1974 for 35 episodes on NET (now known as TV Asahi).',
                'img' => 'category/showa-rider-logo-3.webp',
                'first_aired' => '1974-02-16',
                'last_aired' => '1974-10-12',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Amazon',
                'name' => 'Amazon',
                'slug' => Str::slug('Amazon', '-'),
                'description' => 'Kamen Rider Amazon (仮面ライダーアマゾン, Kamen Raidā Amazon, "Masked Rider Amazon" in English) is a Japanese tokusatsu drama and the fourth installment of the Kamen Rider Series. It is the fourth series to debut in the Showa Era and aired from October 19, 1974 to March 29, 1975 on NET and the Mainichi Broadcasting System. With 24 episodes produced and aired, it is the shortest Kamen Rider series ever.',
                'img' => 'category/showa-rider-logo-4.webp',
                'first_aired' => '1974-10-19',
                'last_aired' => '1975-03-29',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Stronger',
                'name' => 'Stronger',
                'slug' => Str::slug('Stronger', '-'),
                'description' => 'Kamen Rider Stronger (仮面ライダーストロンガー, Kamen Raidā Sutorongā, "Masked Rider Stronger" in English) is a Japanese tokusatsu drama and the fifth installment of the Kamen Rider Series. It is the fifth series to debut in the Showa Era and aired from April 5, 1975 to December 27, 1975 on TBS and MBS. Lasting 39 episodes, the series was a joint collaboration between Toei Company and Ishinomori Productions.',
                'img' => 'category/showa-rider-logo-5.webp',
                'first_aired' => '1975-04-05',
                'last_aired' => '1975-12-27',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Skyrider',
                'name' => 'Skyrider',
                'slug' => Str::slug('Skyrider', '-'),
                'description' => 'Kamen Rider (仮面ライダー, Kamen Raidā), also known as Skyrider (スカイライダー, Sukairaidā), is a Japanese tokusatsu television series created by Shotaro Ishinomori and the sixth program in the Kamen Rider Series. The series was produced by Toei Company. The series aired every Friday at 7:00 PM on MBS from October 5, 1979 to October 10, 1980.',
                'img' => 'category/showa-rider-logo-6.webp',
                'first_aired' => '1979-10-05',
                'last_aired' => '1980-10-10',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Super-1',
                'name' => 'Super-1',
                'slug' => Str::slug('Super-1', '-'),
                'description' => 'Kamen Rider Super-1 (仮面ライダースーパー１ワン, Kamen Raidā Sūpā Wan, Masked Rider Super-1 in English) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the seventh series to debut in the Showa era and aired as a joint collaboration between Toei Company and Ishinomori Productions from October 17, 1980 to October 3, 1981 for 48 episodes. The average ratings of the series was 9.9%.',
                'img' => 'category/showa-rider-logo-7.webp',
                'first_aired' => '1980-10-17',
                'last_aired' => '1981-10-03',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider ZX',
                'name' => 'ZX',
                'slug' => Str::slug('ZX', '-'),
                'description' => 'Birth of the 10th! Kamen -riders All Together!! (10号誕生！仮面ライダー全員集合！！, Jūgō Tanjō! Kamen Raidā Zen\'in Shūgō!!) is a Japanese television special in Toei Company\'s Kamen Rider Series. It is the eighth entry of the Showa-era and premiered on January 3, 1984. The special follows Ryo Murasame, the tenth person to don the Kamen Rider title, as he fights against the Badan Empire who killed his sister.',
                'img' => 'category/showa-rider-logo-8.webp',
                'first_aired' => '1984-01-03',
                'last_aired' => '1984-01-03',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Black',
                'name' => 'Black',
                'slug' => Str::slug('Black', '-'),
                'description' => 'Kamen Rider Black (仮面ライダーBLACKブラック, Kamen Raidā Burakku, translated as "Masked Rider Black"), is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the ninth series to debut in the Showa Era and aired as a joint collaboration between Ishimori Productions and Toei Company from October 4, 1987 to October 9, 1988 on MBS and the TBS for 51 episodes.',
                'img' => 'category/showa-rider-logo-9.webp',
                'first_aired' => '1987-10-04',
                'last_aired' => '1988-10-09',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Black RX',
                'name' => 'Black RX',
                'slug' => Str::slug('Black RX', '-'),
                'description' => 'Kamen Rider Black RX (仮面ライダーBLACKブラック RXアールエックス, Kamen Raidā Burakku Āru Ekkusu, Masked Rider Black RX) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the tenth and final series to debut in the Showa Era and serves as a direct sequel to Kamen Rider Black. It aired as a joint collaboration between Ishimori Productions and Toei Company from October 23, 1988 to September 24, 1989 on MBS and the TBS for 47 episodes.',
                'img' => 'category/showa-rider-logo-10.webp',
                'first_aired' => '1988-10-23',
                'last_aired' => '1989-09-24',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Shin',
                'name' => 'Shin',
                'slug' => Str::slug('Shin', '-'),
                'description' => 'Shin Kamen Rider: Prologue (真・仮面ライダー 序章プロローグ, Shin Kamen Raidā: Purorōgu, Lit. "True Masked Rider Prologue") is a Japanese superhero Tokusatsu V-Cinema film in the Kamen Rider Series, serving as the 11th production in the franchise while also commemorating the franchise\'s 20th anniversary. In the film, a young man is transformed into a mutant grasshopper while he is targeted by the mysterious Institute of Super Science.',
                'img' => 'category/showa-rider-logo-11.webp',
                'first_aired' => '1992-02-20',
                'last_aired' => '1992-02-20',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider ZO',
                'name' => 'ZO',
                'slug' => Str::slug('ZO', '-'),
                'description' => 'Kamen Rider ZO (仮面ライダーZ Oゼットオー, Kamen Raidā Zetto Ō) is a Japanese superhero Tokusatsu film serving as the 12th installment of the Kamen Rider Series, triple-billed with film versions of Gosei-sentai-Dairanger and Tokusou Robo Janperson. In the film, a young man must protect the son of the doctor who experimented on him from a monster who threatens to wipe out humanity.',
                'img' => 'category/showa-rider-logo-12.webp',
                'first_aired' => '1993-12-21',
                'last_aired' => '1993-12-21',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider J',
                'name' => 'J',
                'slug' => Str::slug('J', '-'),
                'description' => 'Kamen Rider J (仮面ライダーJ, Kamen Raidā Jei), translated as Masked Rider J, is a Japanese superhero tokusatsu film, serving as the 13th entry of the Kamen Rider series and was triple-billed with film versions of Ninja-sentai-Kakuranger and Blueswat.',
                'img' => 'category/showa-rider-logo-13.webp',
                'first_aired' => '1994-04-16',
                'last_aired' => '1994-04-16',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Kuuga',
                'name' => "Kuuga",
                'slug' => Str::slug("Kuuga", '-'),
                'description' => "Kamen Rider Kuuga (仮面ライダークウガ Kamen Raidā Kūga, Masked Rider Kuuga) is a Japanese tokusatsu drama and the 10th installment of the Kamen Rider Series. Debuting as the first entry of the Heisei Era, the series aired from January 30, 2000 to January 21, 2001 on TV Asahi as a joint collaboration between Ishimori Productions and Toei Company.",
                'img' => 'category/heisei-rider-logo-1.webp',
                'first_aired' => '2000-01-30',
                'last_aired' => '2001-01-21',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Agito',
                'name' => "Agito",
                'slug' => Str::slug("Agito", '-'),
                'description' => "Kamen Rider Agito (仮面ライダーアギト Kamen Raidā Agito, Masked Rider ΑGITΩ), is the eleventh installment in the popular Kamen Rider tokusatsu franchise. The series represented the 30th Anniversary of the Kamen Rider Series. The series was also a joint collaboration between Ishimori Productions and Toei and was shown on TV Asahi from January 28, 2001 to January 27, 2002. The catchphrase for the series is \"Awaken the soul\" (目覚めろ、その魂 Mezamero, sono tamashii).",
                'img' => 'category/heisei-rider-logo-2.webp',
                'first_aired' => '2001-01-28',
                'last_aired' => '2002-01-27',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Ryuki',
                'name' => "Ryuki",
                'slug' => Str::slug("Ryuki", '-'),
                'description' => "Kamen Rider Ryuki (仮面ライダー龍騎 Kamen Raidā Ryūki, Masked Rider Ryuki) is a Japanese tokusatsu television series. It was the twelfth installment in the Kamen Rider Series of tokusatsu shows. It was a joint collaboration between Ishimori Productions and Toei, and it was shown on TV Asahi from February 3, 2002 to January 19, 2003. The catchphrase for the series is \"Those who don't fight won't survive!!\" (戦わなければ、生き残れない!! Tatakawanakereba, ikinokorenai!!). In 2009, Ryuki was adapted into the American television series Kamen Rider Dragon Knight, the first adaptation of a Kamen Rider Series in the United States since Saban's Masked Rider in 1996.",
                'img' => 'category/heisei-rider-logo-3.webp',
                'first_aired' => '2002-02-03',
                'last_aired' => '2003-01-19',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider 555',
                'name' => "555",
                'slug' => Str::slug("555", '-'),
                'description' => "Kamen Rider 555 (仮面ライダー555（ファイズ） Kamen Raidā Faizu, Masked Rider Φ's or Faiz or Phi's) is a Japanese tokusatsu television drama. It is the 13th installment in the Kamen Rider Series. It is a joint collaboration between Ishinomori Productions and Toei, and was broadcast on TV Asahi from January 26, 2003, to January 18, 2004. This series was the first to use TV Asahi's current logo. It aired as a part of TV Asahi's 2003 Super Hero Time block, alongside Bakuryū-sentai-Abaranger.",
                'img' => 'category/heisei-rider-logo-4.webp',
                'first_aired' => '2003-01-26',
                'last_aired' => '2004-01-18',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Blade',
                'name' => "Blade",
                'slug' => Str::slug("Blade", '-'),
                'description' => "Kamen Rider Blade (仮面ライダー剣［ブレイド］ Kamen Raidā Bureido, Masked Rider ♠ or Blade), is a Japanese tokusatsu drama and the 14th installment of the Kamen Rider Series. Debuting as the 5th entry of the Heisei Era, the show premiered on January 25, 2004 alongside Tokusou-sentai-Dekaranger on TV Asahi's Super Hero Time block, and finished its 49-episode run on January 23, 2005.",
                'img' => 'category/heisei-rider-logo-5.webp',
                'first_aired' => '2004-01-25',
                'last_aired' => '2005-01-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Hibiki',
                'name' => "Hibiki",
                'slug' => Str::slug("Hibiki", '-'),
                'description' => "Kamen Rider Hibiki (仮面ライダー響鬼［ヒビキ］ Kamen Raidā Hibiki, Masked Rider Hibiki) is a Japanese tokusatsu superhero television series. It is the fifteenth installment in the popular Kamen Rider Series of tokusatsu programs. It is a joint collaboration between Ishimori Productions and Toei. Kamen Rider Hibiki first aired on January 30, 2005 and aired its final episode on January 22, 2006. It aired alongside Mahou-sentai-Magiranger for Super Hero Time 2005. This series is noted for introducing new themes and styles yet unseen in other shows. The catchphrase for the series is \"To us, there are heroes.\" (ぼくたちには、ヒーローがいる Bokutachi ni wa, hīrō ga iru).",
                'img' => 'category/heisei-rider-logo-6.webp',
                'first_aired' => '2005-01-30',
                'last_aired' => '2006-01-22',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Kabuto',
                'name' => "Kabuto",
                'slug' => Str::slug("Kabuto", '-'),
                'description' => "Kamen Rider Kabuto (仮面ライダーカブト Kamen Raidā Kabuto, Masked Rider Kabuto) is a Japanese tokusatsu superhero television series. It is the sixteenth installment in the popular Kamen Rider Series of tokusatsu programs. It is a joint collaboration between Ishimori Productions and Toei. The series was broadcast on TV Asahi. The first episode aired on January 29, 2006, and with the final episode airing on January 21, 2007, completing the series with 49 episodes. It aired alongside GoGo-sentai-Boukenger for Super Hero Time 2006. The series represents the 35th anniversary of the Masked Rider Series, as indicated by a notice at the beginning of the pilot episode reading, in Japanese, \"Kamen Rider 35th Anniversary Production.\" Kamen Rider Kabuto is the first Kamen Rider Series to be broadcast in high-definition format.",
                'img' => 'category/heisei-rider-logo-7.webp',
                'first_aired' => '2006-01-29',
                'last_aired' => '2007-01-21',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Den-O',
                'name' => "Den-O",
                'slug' => Str::slug("Den-O", '-'),
                'description' => "Kamen Rider Den-O (仮面ライダー電王［デンオウ］ Kamen Raidā Den'ō, Masked Rider Den-O) is the seventeenth installment in the popular Kamen Rider Series of tokusatsu programs. It is a joint collaboration between Ishimori Productions and Toei. It premiered January 28, 2007 on TV Asahi, and concluded airing on January 20, 2008. It aired alongside Juken-sentai-Gekiranger for Super Hero Time 2007. Its lead actor Takeru Satoh is the first Kamen Rider Series lead born in the Heisei period of Japanese history.",
                'img' => 'category/heisei-rider-logo-8.webp',
                'first_aired' => '2007-01-28',
                'last_aired' => '2008-01-20',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Kiva',
                'name' => "Kiva",
                'slug' => Str::slug("Kiva", '-'),
                'description' => "Kamen Rider Kiva (仮面ライダーキバ Kamen Raidā Kiba, Masked Rider Kiva) is the title of the 2008 Kamen Rider Japanese tokusatsu television series produced by Toei Company and Ishimori Productions. It premiered on January 27, 2008, following the finale of Kamen Rider Den-O. It aired as a part of TV Asahi's 2008 Super Hero Time block with Engine-sentai-Go-Onger. Advertisements showed a horror film theme to the series, with the motif for Kamen Rider Kiva as a vampire. The advertising slogan for the series is \"Wake up! Break the chains of destiny!!\" (覚醒（ウェイクアップ）! 運命（さだめ）の鎖を解き放て!! Weiku appu! Sadame no kusari o tokihanate!!). The first episode began with a commemoration of the series in honor of the seventieth anniversary of Shotaro Ishinomori's birthday.",
                'img' => 'category/heisei-rider-logo-9.webp',
                'first_aired' => '2008-01-27',
                'last_aired' => '2009-01-18',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Decade',
                'name' => "Decade",
                'slug' => Str::slug("Decade", '-'),
                'description' => "Kamen Rider Decade (仮面ライダーディケイド Kamen Raidā Dikeido, Masked Rider DCD, Masked Rider Decade) is a Japanese tokusatsu drama and the 19th entry of the Kamen Rider Series. The series is the 10th entry of the Heisei Era and commemorates all of the Rider series to date. It premiered on January 25, 2009 alongside Samurai-sentai-Shinkenger on TV Asahi's Super Hero Time block. After Kamen Rider Decade concluded early on August 30, 2009, Shinkenger was joined by Kamen Rider W.",
                'img' => 'category/heisei-rider-logo-10.webp',
                'first_aired' => '2009-01-25',
                'last_aired' => '2009-08-30',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider W',
                'name' => "W",
                'slug' => Str::slug("W", '-'),
                'description' => "Kamen Rider Double (仮面ライダーＷ［ダブル］ Kamen Raidā Daburu) is the main and eponymous protagonist of Kamen Rider W, a Kamen Rider who transforms from two people, Shotaro Hidari and Philip.",
                'img' => 'category/heisei-rider-logo-11.webp',
                'first_aired' => '2009-09-06',
                'last_aired' => '2010-08-29',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider OOO',
                'name' => "OOO",
                'slug' => Str::slug("OOO", '-'),
                'description' => "Kamen Rider OOO (仮面ライダーＯＯＯ［オーズ］ Kamen Raidā Ōzu) is a 2010-2011 Japanese tokusatsu drama in Toei Company's Kamen Rider Series, being the twelfth series in the Heisei period run and the twenty-first overall. It began airing on September 5, 2010, the week following the conclusion of Kamen Rider W,[1] joining Tensou-sentai-Goseiger and then Kaizoku-sentai-Gokaiger in the Super Hero Time lineup, until its conclusion on August 28, 2011. The series' titular Kamen Rider made a cameo appearance in the film Kamen Rider W Forever: A to Z/The Gaia Memories of Fate. The catchphrase for the series is \"I'll transform!!!\" (俺が変身する!!! Ore ga henshin suru!!!).",
                'img' => 'category/heisei-rider-logo-12.webp',
                'first_aired' => '2010-09-05',
                'last_aired' => '2011-08-28',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Fourze',
                'name' => "Fourze",
                'slug' => Str::slug("Fourze", '-'),
                'description' => "Kamen Rider Fourze (仮面ライダーフォーゼ Kamen Raidā Fōze) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series, being the thirteenth series in the Heisei period run and the twenty-second overall. It began airing on September 4, 2011, the week following the conclusion of Kamen Rider OOO, joining Kaizoku-sentai-GokaigerIcon, later Tokumei-sentai-Go-BustersIcon, in the Super Hero Time lineup. Trademarks on the title were filed by Toei in April 2011. The series commemorates not only the Kamen Rider Series' 40th anniversary but also the 50th anniversary of spaceflight, which began with Yuri Gagarin's Vostok 1 flight in 1961. The show's catchphrase is \"Switch on youth 'cause space is here!\" (青春スイッチオンで宇宙キター！ Seishun suitchi on de uchū kitā!), referencing the Fourze Driver transformation belt which gets its various powers from devices called Astroswitches to conjure attachments to Fourze's limbs. As with the two previous series, the protagonist of Fourze made his debut in the annual summer film of the show's direct predecessor, appearing in Kamen Rider OOO Wonderful: The Shogun and the 21 Core Medals.",
                'img' => 'category/heisei-rider-logo-13.webp',
                'first_aired' => '2011-09-04',
                'last_aired' => '2012-08-26',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Wizard',
                'name' => "Wizard",
                'slug' => Str::slug("Wizard", '-'),
                'description' => "Kamen Rider Wizard (仮面ライダーウィザード Kamen Raidā Uizādo) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series, being the fourteenth series in the Heisei period run and the twenty-third overall. Trademarks on the title were filed by Toei in June 21, 2012. It began airing on September 2, 2012, joining Tokumei-sentai-Go-Busters and then Zyuden-sentai-Kyoryuger in the Super Hero Time line-up following the finale of Kamen Rider Fourze. With Wizard finished, Kamen Rider Gaim joined Kyoryuger as part of Super Hero Time. Tsuyoshi Kida is the series' main screenwriter.",
                'img' => 'category/heisei-rider-logo-14.webp',
                'first_aired' => '2012-09-02',
                'last_aired' => '2013-08-29',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Gaim',
                'name' => "Gaim",
                'slug' => Str::slug("Gaim", '-'),
                'description' => "Kamen Rider Gaim (仮面ライダー鎧武［ガイム］ Kamen Raidā Gaimu) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series, it is the fifteenth series in the Heisei period run and the twenty-fourth series overall. Toei registered the copyright and trademark of the series, which started on October 6, 2013, joining Zyuden-sentai-Kyoryuger in the Super Hero Time line-up three weeks after the finale of Kamen Rider Wizard. After Kyoryuger concluded on February 9, 2014, Kamen Rider Gaim was joined in the Super Hero Time lineup with Ressha-sentai-ToQger. After the finale of Kamen Rider Gaim, Kamen Rider Drive joined ToQger on the Super Hero Time block. The catchphrase for the series are \"It's a Rider Warring (Sengoku) era.\" (ライダー戦国時代。 Raidā Sengoku Jidai) and \"How would you use your power?\" (キミはこの力どう使う? Kimi wa kono chikara dō tsukau).",
                'img' => 'category/heisei-rider-logo-15.webp',
                'first_aired' => '2013-10-06',
                'last_aired' => '2014-09-28',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Drive',
                'name' => "Drive",
                'slug' => Str::slug("Drive", '-'),
                'description' => "Kamen Rider Drive (仮面ライダードライブ Kamen Raidā Doraibu) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series. It is the sixteenth series in the Heisei period run and the twenty-fifth series overall. The series started on October 5, 2014, joining Ressha-sentai-ToQger in the Super Hero Time line-up after the finale of Kamen Rider Gaim. Starting on February 22, 2015, Kamen Rider Drive was joined by Shuriken-sentai-Ninninger in the Super Hero Time line-up. After the finale of Kamen Rider Drive, Kamen Rider Ghost joined Ninninger in the Super Hero Time line-up. Its series tagline is \"Start Your Engine!\"",
                'img' => 'category/heisei-rider-logo-16.webp',
                'first_aired' => '2014-10-05',
                'last_aired' => '2015-09-27',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Ghost',
                'name' => "Ghost",
                'slug' => Str::slug("Ghost", '-'),
                'description' => "Kamen Rider Ghost (仮面ライダーゴースト Kamen Raidā Gōsuto) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series. It is the seventeenth series in the Heisei period run and the twenty-sixth series overall. The series started on October 4, 2015, joining Shuriken-sentai-Ninninger in the Super Hero Time line-up after the finale of Kamen Rider Drive. After Ninninger concluded on February 7, 2016, the series was joined by Doubutsu-sentai-Zyuohger in the Super Hero Time line-up. After the finale of Kamen Rider Ghost, Kamen Rider Ex-Aid joined Zyuohger in the Super Hero Time line-up.",
                'img' => 'category/heisei-rider-logo-17.webp',
                'first_aired' => '2015-10-04',
                'last_aired' => '2016-09-25',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Ex-Aid',
                'name' => "Ex-Aid",
                'slug' => Str::slug("Ex-Aid", '-'),
                'description' => "Kamen Rider Ex-Aid (仮面ライダーエグゼイド Kamen Raidā Eguzeido) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series. It is the eighteenth series in the Heisei period run and the twenty-seventh series overall. The series started on October 2, 2016, joining Doubutsu-sentai-Zyuohger in the Super Hero Time line-up after the finale of Kamen Rider Ghost. Starting on February 12, 2017, the series was joined by Uchu-sentai-Kyuranger in the Super Hero Time line-up. After the finale of Kamen Rider Ex-Aid, Kamen Rider Build joined Kyuranger in the Super Hero Time line-up. In 2019, this became the first Kamen Rider to air in Indonesia on RTV since Kamen Rider OOO on Indosiar in 2014. This show currently airs on the North American Japanese-language channel TV Japan.",
                'img' => 'category/heisei-rider-logo-18.webp',
                'first_aired' => '2016-10-02',
                'last_aired' => '2017-08-27',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Build',
                'name' => "Build",
                'slug' => Str::slug("Build", '-'),
                'description' => "Kamen Rider Build (仮面ライダービルド Kamen Raidā Birudo) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series. It is the nineteenth and penultimate series for a full Heisei period run and the twenty-eighth series overall. The series started on September 3, 2017, joining Uchu-sentai-Kyuranger in the Super Hero Time line-up after the finale of Kamen Rider Ex-Aid. After Kyuranger concluded on February 4, 2018, the series was joined by Kaitou-sentai-Lupinranger VS Keisatsu-sentai-Patranger in the Super Hero Time line-up. After the finale of Kamen Rider Build, Kamen Rider Zi-O joined Lupinranger VS Patranger on the Super Hero Time block.",
                'img' => 'category/heisei-rider-logo-19.webp',
                'first_aired' => '2017-09-03',
                'last_aired' => '2018-08-26',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Zi-O',
                'name' => "Zi-O",
                'slug' => Str::slug("Zi-O", '-'),
                'description' => "Kamen Rider Zi-O (仮面ライダージオウ Kamen Raidā Jiō) is a Japanese tokusatsu drama in Toei Company's Kamen Rider Series. It is the twentieth and final series in the Heisei period run, the first series to be produced around the Reiwa period, and the twenty-ninth series overall. The series started on September 2, 2018, joining Kaitou-sentai-Lupinranger VS Keisatsu-sentai-Patranger in the Super Hero Time line-up after the finale of Kamen Rider Build. After Lupinranger VS Patranger’s conclusion, it was joined by 4 Week Continuous Special Super-sentai-Strongest Battle!! in February 2019 and later Kishiryu-sentai-Ryusoulger in March 2019. After the finale of Kamen Rider Zi-O, Ryusoulger would air alongside Kamen Rider Zero-One in the Super Hero Time block.",
                'img' => 'category/heisei-rider-logo-20.webp',
                'first_aired' => '2018-09-02',
                'last_aired' => '2019-08-25',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Zero-One',
                'name' => 'Zero-One',
                'slug' => Str::slug('Zero-One', '-'),
                'description' => 'Kamen Rider Zero-One (仮面ライダーゼロワン, Kamen Raidā Zerowan) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the first series to debut during the Reiwa period and the thirty-fourth overall. The series premiered on September 1, 2019 and joined Kishiryu-sentai-Ryusoulger in the Super Hero Time line-up after the finale of Kamen Rider Zi-O. After Ryusoulger concluded, the series was joined by Mashin-sentai-Kiramager on March 8, 2020. After the finale of Zero-One, Kiramager was joined by Kamen Rider Saber in the Super Hero Time block.',
                'img' => 'category/reiwa-rider-logo-1.webp',
                'first_aired' => '2019-09-01',
                'last_aired' => '2020-08-30',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Saber',
                'name' => 'Saber',
                'slug' => Str::slug('Saber', '-'),
                'description' => 'Kamen Rider Saber (仮面ライダーセイバー聖刃, Kamen Raidā Seibā) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the second series to debut during the Reiwa period and the thirty-fifth overall. The series premiered on September 6, 2020 and joined Mashin-sentai-Kiramager in the Super Hero Time line-up after the finale of Kamen Rider Zero-One. After the conclusion of Kiramager, the series was joined by Kikai-sentai-Zenkaiger on March 7, 2021. After the finale of Saber, Zenkaiger was joined by Kamen Rider Revice in the Super Hero Time block.',
                'img' => 'category/reiwa-rider-logo-2.webp',
                'first_aired' => '2020-09-06',
                'last_aired' => '2021-08-29',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Revice',
                'name' => 'Revice',
                'slug' => Str::slug('Revice', '-'),
                'description' => 'Kamen Rider Revice (仮面ライダーリバイス, Kamen Raidā Ribaisu) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the third series to debut in the Reiwa Era and the thirty-sixth overall, and serves to commemorate the 50th Anniversary of the franchise. The series premiered on September 5, 2021, joining Kikai-sentai-Zenkaiger in the Super Hero Time line-up after the finale of Kamen Rider Saber. After Zenkaiger concluded on February 27, 2022, Revice was joined in the Super Hero Time line-up by Avataro-sentai-Donbrothers. After the finale of Revice, Donbrothers was joined by Kamen Rider Geats in the Super Hero Time Block.',
                'img' => 'category/reiwa-rider-logo-3.webp',
                'first_aired' => '2021-09-05',
                'last_aired' => '2022-08-28',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Geats',
                'name' => 'Geats',
                'slug' => Str::slug('Geats', '-'),
                'description' => 'Kamen Rider Geats (仮面ライダーギーツ, Kamen Raidā Gītsu) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the fourth series to debut in the Reiwa Era and the thirty-seventh overall. The series premiered on September 4, 2022, joining Avataro-sentai-Donbrothers in the Super Hero Time lineup after the finale of Kamen Rider Revice. After Donbrothers concluded, Geats was joined in the Super Hero Time line-up by Ohsama-sentai-King-Ohger. After the finale of Geats, King-Ohger was joined by Kamen Rider Gotchard in the Super Hero Time block.',
                'img' => 'category/reiwa-rider-logo-4.webp',
                'first_aired' => '2022-09-04',
                'last_aired' => '2023-08-27',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Gotchard',
                'name' => 'Gotchard',
                'slug' => Str::slug('Gotchard', '-'),
                'description' => 'Kamen Rider Gotchard (仮面ライダーガッチャード, Kamen Raidā Gatchādo) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the fifth series to debut in the Reiwa Era and the thirty-eighth overall. The series premiered on September 3, 2023, joining Ohsama-sentai-King-Ohger in the Super Hero Time lineup after the finale of Kamen Rider Geats. After King-Ohger concluded, Gotchard was joined in the Super Hero Time line-up by Bakuage-sentai-Boonboomger on March 3, 2024. After the finale of Gotchard, Boonboomger was joined in the line-up by Kamen Rider Gavv in the Super Hero Time block.',
                'img' => 'category/reiwa-rider-logo-5.webp',
                'first_aired' => '2023-09-03',
                'last_aired' => '2024-08-25',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Gavv',
                'name' => 'Gavv',
                'slug' => Str::slug('Gavv', '-'),
                'description' => 'Kamen Rider Gavv (仮面ライダーガヴ, Kamen Raidā Gavu) is a Japanese tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the sixth series to debut in the Reiwa Era and the thirty-ninth overall. ',
                'img' => 'category/reiwa-rider-logo-6.webp',
                'first_aired' => '2024-09-01',
                'last_aired' => '2025-08-31',
            ],
            [
                'era_id' => $reiwa,
                'franchise_id' => $kamenrider,
                'fullname' => 'Kamen Rider Zeztz',
                'name' => 'Zeztz',
                'slug' => Str::slug('Zeztz', '-'),
                'description' => 'Kamen Rider Zeztz (仮面ライダーゼッツ, Kamen Raidā Zettsu), often stylized as Kamen Rider ZEZTZ is a Japanese Tokusatsu drama in Toei Company\'s Kamen Rider Series. It is the seventh series to debut in the Reiwa Era and the fortieth overall.',
                'img' => 'category/reiwa-rider-logo-7.webp',
                'first_aired' => '2025-09-07',
                'last_aired' => null,
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
