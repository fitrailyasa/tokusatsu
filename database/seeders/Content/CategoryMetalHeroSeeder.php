<?php

namespace Database\Seeders\Content;

use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryMetalHeroSeeder extends Seeder
{
    public function run(): void
    {
        $showa = $this->Era('Showa');
        $heisei = $this->Era('Heisei');
        $metalhero = $this->Franchise('Metal Hero');

        $data = collect([
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Uchuu Keiji Gavan',
                'name' => 'Gavan',
                'slug' => Str::slug('Gavan', '-'),
                'description' => 'Space Sheriff Gavan (宇宙刑事ギャバン Uchū Keiji Gyaban?): This series aired in 1982. This series is also known as X-Or in France, Sky Ranger Gavan in the Philippines, and Space Cop Gaban in Brazil, Malaysia, Thailand, and Indonesia. This series began the Space Sheriff Series (宇宙刑事シリーズ Uchū Keiji Shirīzu?) and featured a police hero sent to Earth to battle a rampaging force of aliens. This series is visually influenced by Star Wars.',
                'img' => 'category/metal-hero-1.webp',
                'first_aired' => '1982-03-05',
                'last_aired' => '1983-02-25',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Uchuu Keiji Sharivan',
                'name' => 'Sharivan',
                'slug' => Str::slug('Sharivan', '-'),
                'description' => 'Space Sheriff Sharivan (宇宙刑事シャリバン Uchū Keiji Shariban?): This series aired in 1983. This direct sequel to Gavan features Gavan\'s protege taking over the role of Earth\'s protector when Gavan gets promoted in rank (from sergeant to captain) in the Space Sheriff organization. Sharivan was played by Hiroshi Watari.',
                'img' => 'category/metal-hero-2.webp',
                'first_aired' => '1983-03-04',
                'last_aired' => '1984-02-24',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Uchuu Keiji Shaider',
                'name' => 'Shaider',
                'slug' => Str::slug('Shaider', '-'),
                'description' => 'Space Sheriff Shaider (宇宙刑事シャイダー Uchū Keiji Shaidā?): This series aired in 1984. The third and last of the Space Sheriff trilogy, this series featured an Earth-born, galactic police force-trained officer taking over Sharivan\'s job alongside a female deputy. Footage from Shaider was used for Ryan Steele\'s action scenes in the second season of Saban Entertainment\'s VR Troopers. Shaider was played by the late Hiroshi Tsuburaya. The series received a "sequel" in the Philippines in the show Zaido.',
                'img' => 'category/metal-hero-3.webp',
                'first_aired' => '1984-03-02',
                'last_aired' => '1985-03-01',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Kyojuu Tokusou Juspion',
                'name' => 'Juspion',
                'slug' => Str::slug('Juspion', '-'),
                'description' => 'MegaBeast Investigator Juspion (巨獣特捜ジャスピオン Kyojū Tokusō Jasupion?): This series aired in 1985. Similar in filming, tone, and style of the Space Sheriff shows, this series features a warrior sent to stop Satan Gorth and his diabolical son Madgallan from destroying the Earth with giant monsters. Juspion had his own giant robot, Daileon, to combat the evil creatures.',
                'img' => 'category/metal-hero-4.webp',
                'first_aired' => '1985-03-15',
                'last_aired' => '1986-03-24',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Jikuu Senshi Spielvan',
                'name' => 'Spielvan',
                'slug' => Str::slug('Spielvan', '-'),
                'description' => 'Zikusensi Spielban (時空戦士スピルバン Jikū Senshi Supiruban?, "Dimensional Warrior Spielban"): This series aired in 1986. Along with his sidekick, Diana, this program dealt with a hero who crosses through dimensions to combat an alien force that took his father\'s life and corrupted his sister into the evil Hellbyra, who later joined her brother as Lady Helen. Footage from Spielban was used for JB and Kaitlin\'s action scenes in VR Troopers.',
                'img' => 'category/metal-hero-5.webp',
                'first_aired' => '1986-04-07',
                'last_aired' => '1987-03-09',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Choujinki Metalder',
                'name' => 'Metalder',
                'slug' => Str::slug('Metalder', '-'),
                'description' => 'Choujinki Metalder (超人機メタルダー Chōjinki Metarudā?, "Superhuman Machine Metalder"): This series aired in 1987. Inspired by the classic tokusatsu hero KikaiderIcon-crosswiki, this show dealt with an android given human memories, yet programmed to fight an insidious group that his creator once belonged to. Footage from Metalder was used for Ryan Steele\'s action scenes in the first season of VR Troopers.',
                'img' => 'category/metal-hero-6.webp',
                'first_aired' => '1987-03-16',
                'last_aired' => '1988-01-17',
            ],
            [
                'era_id' => $showa,
                'franchise_id' => $metalhero,
                'fullname' => 'Sekai Ninja Sen Jiraiya',
                'name' => 'Jiraiya',
                'slug' => Str::slug('Jiraiya', '-'),
                'description' => 'Sekaininjasen Jiraiya (世界忍者戦ジライヤ Sekaininjasen Jiraiya?, "World Ninja War Jiraiya"): This series aired in 1988. This program features an actual ninja master from a historically known ninja clan preparing his son, daughter, and youngest child, along with a family relative and a police officer with ninja roots to combat the re-emergence of a centuries-old demon samurai, his evil offspring, and a host of international ninja warriors from around the world hoping to tip the scales of justice. ',
                'img' => 'category/metal-hero-7.webp',
                'first_aired' => '1988-01-24',
                'last_aired' => '1989-01-22',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Kidou Keiji Jiban',
                'name' => 'Jiban',
                'slug' => Str::slug('Jiban', '-'),
                'description' => 'The Mobile Cop Jiban (機動刑事ジバン Kidō Keiji Jiban?): This series aired in 1989. Having a similar premise to the 1980s American film RoboCop and the 1970s tokusatsu Robot DetectiveIcon-crosswiki, Jiban is a rookie cop gunned down and reborn as a fighting machine against the Criminal Syndicate Bioron, a group of bio-genetic freaks. Jiban is the first Metal Hero to actually bear the emblem of the Japanese National Police, although his "badge" shows a regular American-style sheriff star.',
                'img' => 'category/metal-hero-8.webp',
                'first_aired' => '1989-01-29',
                'last_aired' => '1990-01-28',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokkei Winspector',
                'name' => 'Winspector',
                'slug' => Str::slug('Winspector', '-'),
                'description' => 'Special Rescue Police Winspector (特警ウインスペクター Tokkei Uinsupekutā?, "Special Police Winspector"): This series aired in 1990. The first of the Rescue Police Series (レスキューポリスシリーズ Resukyū Porisu Shirīzu?), this team of two robots and their human armored field commander dealt with real-life crime, mad scientists, rogue cyborgs, and dangerous rescue situations. The mix of fantasy and realistic action proved to be immensely popular with viewers, spawning two sequels.',
                'img' => 'category/metal-hero-9.webp',
                'first_aired' => '1990-02-04',
                'last_aired' => '1991-01-13',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokkyuu Shirei Solbrain',
                'name' => 'Solbrain',
                'slug' => Str::slug('Solbrain', '-'),
                'description' => 'Super Rescue Solbrain (特救指令ソルブレイン Tokkyū Shirei Soruburein?, "Special Rescue Command Solbrain"): This series aired in 1991. A direct sequel to Special Rescue Police Winspector, the former base captain of Winspector opens an additional police branch, this time with two humans (a male and a female) and a construction-vehicle styled transforming robot to continue the fight against everyday villains, gangsters with high-tech weapons of destruction, and the occasional robot gone mad.',
                'img' => 'category/metal-hero-10.webp',
                'first_aired' => '1991-01-20',
                'last_aired' => '1992-01-26',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokusou Exceedraft',
                'name' => 'Exceedraft',
                'slug' => Str::slug('Exceedraft', '-'),
                'description' => 'Special Rescue Exceedraft (特捜エクシードラフト Tokusō Ekushīdorafuto?): This series aired in 1992. The last of the Rescue Police Series, this program featured a trio of male human armored police officers doing what the previous two teams were doing without the help of any super-powered robots. By this time, the series had stepped away from realistic villains and swerved back towards more sci-fi oriented opponents.',
                'img' => 'category/metal-hero-11.webp',
                'first_aired' => '1992-02-02',
                'last_aired' => '1993-01-24',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tokusou Robo Janperson',
                'name' => 'Janperson',
                'slug' => Str::slug('Janperson', '-'),
                'description' => 'Tokusou Robo Janperson (特捜ロボ ジャンパーソン Tokusou Robo Janpāson?, "Special Investigation Robo Janperson"): This series aired in 1993. Another series similar to Robotto Keiji. An abandoned police experiment robot is revived by its creator to combat three different organizations of crime in Japan. With a gruff, rougish, gun-totting robot partner named Gungibson, Janperson patrols the streets of Tokyo alongside his creator in shutting down the hidden crime lords that use super science to subjugate the masses. Janperson and Gungibson made a cameo in Big Bad Beetleborgs.',
                'img' => 'category/metal-hero-12.webp',
                'first_aired' => '1993-01-31',
                'last_aired' => '1994-01-23',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Blue SWAT',
                'name' => 'Blue SWAT',
                'slug' => Str::slug('Blue SWAT', '-'),
                'description' => 'Blueswat (ブルースワット Burūsuwatto?): This series aired in 1994. Hidden to the general public, a police organization has been combating alien menaces for years until a sneak attack destroys all but three officers, who alongside some civilian helpers who are aware of the alien infestation, must continue the fight. The show was one of the more "realistic" Metal Hero shows despite the alien theme.',
                'img' => 'category/metal-hero-13.webp',
                'first_aired' => '1994-01-30',
                'last_aired' => '1995-01-29',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Juuko Bettle Fighter',
                'name' => 'Juuko B-Fighter',
                'slug' => Str::slug('Juuko B-Fighter', '-'),
                'description' => 'Jyuko Beetle Fighter (重甲ビーファイター Jūkō Bī Faitā?, "Heavy Shell Beetle Fighter"): This series aired in 1995. An alien attack is repelled by a combination of true heroism, super technology, and insect magic housed within three suits of armor. Action footage from Beetle Fighter was used in Saban Entertainment Big Bad Beetleborgs.',
                'img' => 'category/metal-hero-14.webp',
                'first_aired' => '1995-02-05',
                'last_aired' => '1996-02-25',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Bettle Fighter Kabuto',
                'name' => 'B-Fighter Kabuto',
                'slug' => Str::slug('B-Fighter Kabuto', '-'),
                'description' => 'Beetle Fighter Kabuto (ビーファイターカブト Bī Faitā Kabuto?): This series aired in 1996. A direct sequel to Jyuko Beetle Fighter, this program features seven new heroes who utilize technology of the previous Beetle Fighters and insect magic to fend off a horde of monsters from under the Earth. Action footage from Beetle Fighter Kabuto was used in the second season of Big Bad Beetleborgs: Beetleborgs Metallix.',
                'img' => 'category/metal-hero-15.webp',
                'first_aired' => '1996-03-03',
                'last_aired' => '1997-02-16',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Bettle Robo Kabutack',
                'name' => 'B-Robo Kabutack',
                'slug' => Str::slug('B-Robo Kabutack', '-'),
                'description' => 'Beetle Robot Kabutack (ビーロボカブタック Bī Robo Kabutakku?): This series aired in 1997. It is the first of the Metal Heroes shows to be geared towards younger children. The characters in Kabutack met several characters from Jyuko Beetle Fighter and Beetle Fighter Kabuto.',
                'img' => 'category/metal-hero-16.webp',
                'first_aired' => '1997-02-23',
                'last_aired' => '1998-03-01',
            ],
            [
                'era_id' => $heisei,
                'franchise_id' => $metalhero,
                'fullname' => 'Tetsuwan Tantei Robotack',
                'name' => 'Robotack',
                'slug' => Str::slug('Robotack', '-'),
                'description' => 'Tetsuwan Tantei Robotack (テツワン探偵ロボタック Tetsuwan Tantei Robotakku?, "Iron Bark Detective Robotack"): This series aired in 1998. It was similar to Kabutack, but featured a dog robot who was also a detective.',
                'img' => 'category/metal-hero-17.webp',
                'first_aired' => '1998-03-08',
                'last_aired' => '1999-01-24',
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
