<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VideoOtherSeeder extends Seeder
{
    public function run(): void
    {
        $timestamp = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $data = collect([
            // GARO
            ['title' => "Picture Book (絵本, Ehon)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['title' => "Inga (陰我)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['title' => "Clock (時計, Tokei)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['title' => "Dinner (晩餐, Bansan)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['title' => "Moonlight (月光, Gekkô)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['title' => "Beauty (美貌, Bibyō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['title' => "Silver Fang (銀牙, Ginga)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['title' => "Ring (指輪, Yubiwa)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['title' => "Ordeal (試練, Shiren)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['title' => "Puppet (人形, Ningyō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['title' => "Game (遊戯, Yūgi)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['title' => "Taiga (大河)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['title' => "Promise (約束, Yakusoku)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['title' => "Nightmare (悪夢, Akumu)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['title' => "Statue (像, Zō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['title' => "Red Sake (赤酒, Akazake)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['title' => "Aquarium (水槽, Suisō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['title' => "World Charm (界符, Kaifu)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['title' => "Black Flame (黒炎, Kokuen)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['title' => "Life (生命, Inochi)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['title' => "Magic Bullet (魔弾, Madan)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['title' => "Engraving (刻印, Kokuin)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['title' => "Heart Destruction (心滅, Shinmetsu)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['title' => "Girl (少女, Shōjo)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['title' => "Heroic Spirits", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 25, 'airdate' => null],
            ['title' => "Spark (火花, Hibana)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['title' => "Street Light (街灯, Gaitō)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['title' => "Wheels (車輪, Sharin)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['title' => "Trump Card / Joker (切札, Kirifuda)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['title' => "Hell / Naraka (奈落, Naraku)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['title' => "Letter (手紙, Tegami)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['title' => "Flash (閃光, Senkō)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['title' => "Demon Sword (妖刀, Yōtō)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['title' => "Makeup (化粧, Keshō)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['title' => "Secret (秘密, Himitsu)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['title' => "Howl (咆哮, Hōkō)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['title' => "Fruit (果実, Kajitsu)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['title' => "Wizard Water / Magic Water (仙水, Sen-sui)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['title' => "Reunion (再会, Saikai)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['title' => "Brothers (同胞, Dōhō)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['title' => "Mask (仮面, Kamen)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['title' => "Red Brush (赤筆, Akafude)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['title' => "Beast Herd / Beast Pack (群獣, Gunjū)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['title' => "Paradise (楽園, Rakuen)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['title' => "Train (列車, Ressha)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['title' => "Stronghold / Fortress (牙城, Gajō)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['title' => "Sworn Friends / Alliance (盟友, Meiyū)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['title' => "Golden (金色, Kin’iro)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['title' => "Era / Time (時代, Jidai)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['title' => "My title is Garo - The History of Kouga Saejima's Battles (我が名は牙狼 - 冴島鋼牙 戦いの軌跡, Waga Na wa Garo)", 'category_id' => $this->Category('makai-senki'), 'type' => 'episode', 'number' => 25, 'airdate' => null],
            ['title' => "Ryuga (流牙)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['title' => "Gold Wave (波)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['title' => "Dungeon (迷)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['title' => "Dream (夢)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['title' => "Nightmare (悪夢)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['title' => "Rock (ロック)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['title' => "Dining (食卓)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['title' => "Scoop (スクープ)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['title' => "Sonshi (尊士)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['title' => "Promise (約束)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['title' => "Desire (虜)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['title' => "Trap (罠)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['title' => "Hunting (狩り)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['title' => "Hyena (ハイエナ)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['title' => "Hint (ヒント)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['title' => "Lost (迷失)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['title' => "Tousei (礼)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['title' => "War (義)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['title' => "Hope (希望)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['title' => "Mother (母)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['title' => "Justice (正義)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['title' => "Master (盟友 / 主)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['title' => "Gold (輝)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['title' => "Future (未来)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['title' => "Beginning (道 Beginning)", 'category_id' => $this->Category('yami-o-terasu-mono'), 'type' => 'episode', 'number' => 25, 'airdate' => null],

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
