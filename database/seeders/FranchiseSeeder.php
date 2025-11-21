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
                'img' => "ultraman/showa/1.ultraman/ultraman-1.jpg",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kamen Rider',
                'slug' => Str::slug('Kamen Rider', '-'),
                'description' => 'Kamen Rider (仮面ライダー, Kamen Raidā, "Masked Rider"), is a Japanese tokusatsu drama and the first installment in what would be known as the Kamen Rider Series. It is the first entry of the Showa Era and aired from April 3, 1971 to February 10, 1973 on the Mainichi Broadcasting System and NET TV (now TV Asahi). With 98 episodes, it is the longest entry of the franchise to date.',
                'img' => "kamen-rider/showa/0.1-ichigo-nigo-riders-1.jpg",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Super Sentai',
                'slug' => Str::slug('Super Sentai', '-'),
                'description' => 'The Super Sentai Series (スーパー戦隊シリーズ Sūpā Sentai Shirīzu) is the name given to the long-running Japanese "superhero team" genre of shows produced by Toei and Bandai and aired by TV Asahi (formerly known as NET), that is used as the basis for Power Rangers. ("Super" refers to their use of mecha, and "Sentai" is the Japanese word for "task force" or, literally, "fighting squadron" and was also a term used for Japanese squadrons in World War II.)',
                'img' => "super-sentai/showa/1-himitsu-sentai-goranger-five-rangers-1.jpg",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        foreach ($data as $item) {
            Franchise::create($item);
        }
    }
}
