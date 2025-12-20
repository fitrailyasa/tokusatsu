<?php

namespace Database\Seeders;

use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class FranchiseSeeder extends Seeder
{
    public function run(): void
    {
        $data = collect([
            [
                'name' => 'Ultraman',
                'slug' => Str::slug('Ultraman', '-'),
                'description' => 'Ultraman (ウルトラマン, Urutoraman) is an alien from a place called the Land of Light in Nebula M78, who chased the monster Bemular to Planet Earth, and merged with Shin Hayata during his tenure there. He is the first Ultra to visit Earth and defended the planet against Kaiju until he was recalled after his battle with Zetton. Ultraman was given his title by his human host.',
                'img' => "franchise/ultraman-logo.jpg",
            ],
            [
                'name' => 'Kamen Rider',
                'slug' => Str::slug('Kamen Rider', '-'),
                'description' => 'Kamen Rider (仮面ライダー, Kamen Raidā, "Masked Rider"), is a Japanese tokusatsu drama and the first installment in what would be known as the Kamen Rider Series. It is the first entry of the Showa Era and aired from April 3, 1971 to February 10, 1973 on the Mainichi Broadcasting System and NET TV (now TV Asahi). With 98 episodes, it is the longest entry of the franchise to date.',
                'img' => "franchise/kamen-rider-logo.jpg",
            ],
            [
                'name' => 'Super Sentai',
                'slug' => Str::slug('Super Sentai', '-'),
                'description' => 'The Super Sentai Series (スーパー戦隊シリーズ Sūpā Sentai Shirīzu) is the name given to the long-running Japanese "superhero team" genre of shows produced by Toei and Bandai and aired by TV Asahi (formerly known as NET), that is used as the basis for Power Rangers. ("Super" refers to their use of mecha, and "Sentai" is the Japanese word for "task force" or, literally, "fighting squadron" and was also a term used for Japanese squadrons in World War II.)',
                'img' => "franchise/super-sentai-logo.jpg",
            ],
            [
                'name' => 'Metal Hero',
                'slug' => Str::slug('Metal Hero', '-'),
                'description' => 'The Metal Hero Series (メタルヒーローシリーズ, Metaru Hīrō Shirīzu) is a metaseries of tokusatsu superhero TV series produced by Toei. The protagonists of the Metal Hero Series are mainly space, military and police-based characters who are typically either androids, cyborgs, or humans wearing metallic armored suits.',
                'img' => "franchise/metal-hero-logo.jpg",
            ],
            [
                'name' => 'Garo',
                'slug' => Str::slug('Garo', '-'),
                'description' => 'Garo (牙狼〈GARO〉; lit. "Fanged Wolf", stylized as GARO), sometimes referred to as Golden Knight Garo (黄金騎士ガロ, Ōgon Kishi Garo), is a Japanese tokusatsu television series broadcast on TV Tokyo and its affiliates from October 7, 2005, to March 31, 2006, lasting 25 episodes (with one additional "Overview" special, summarizing the events of episodes 1 through 12, aired before episode 14).',
                'img' => "franchise/garo-logo.jpg",
            ],
            [
                'name' => 'Power Rangers',
                'slug' => Str::slug('Power Rangers', '-'),
                'description' => 'Power Rangers is an American media franchise, built around a superhero television series. The first Power Rangers entry, Mighty Morphin Power Rangers, produced by Saban Entertainment, debuted on August 28, 1993. It became a hit in ratings and toy sales, establishing the franchise into pop culture.',
                'img' => "franchise/power-rangers-logo.jpg",
            ],
        ]);

        foreach ($data as $item) {
            Franchise::create($item);
        }
    }
}
