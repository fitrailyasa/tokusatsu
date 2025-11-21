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
            ['name' => "Picture Book (絵本, Ehon)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['name' => "Inga (陰我)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['name' => "Clock (時計, Tokei)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['name' => "Dinner (晩餐, Bansan)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['name' => "Moonlight (月光, Gekkô)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['name' => "Beauty (美貌, Bibyō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['name' => "Silver Fang (銀牙, Ginga)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['name' => "Ring (指輪, Yubiwa)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['name' => "Ordeal (試練, Shiren)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['name' => "Puppet (人形, Ningyō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['name' => "Game (遊戯, Yūgi)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['name' => "Taiga (大河)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['name' => "Promise (約束, Yakusoku)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['name' => "Nightmare (悪夢, Akumu)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['name' => "Statue (像, Zō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['name' => "Red Sake (赤酒, Akazake)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['name' => "Aquarium (水槽, Suisō)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['name' => "World Charm (界符, Kaifu)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['name' => "Black Flame (黒炎, Kokuen)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['name' => "Life (生命, Inochi)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['name' => "Magic Bullet (魔弾, Madan)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['name' => "Engraving (刻印, Kokuin)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['name' => "Heart Destruction (心滅, Shinmetsu)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['name' => "Girl (少女, Shōjo)", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['name' => "Heroic Spirits", 'category_id' => $this->Category('garo'), 'type' => 'episode', 'number' => 25, 'airdate' => null],
            ['name' => "Spark (火花, Hibana)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['name' => "Street Light (街灯, Gaitō)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['name' => "Wheels (車輪, Sharin)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['name' => "Trump Card / Joker (切札, Kirifuda)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['name' => "Hell / Naraka (奈落, Naraku)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['name' => "Letter (手紙, Tegami)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['name' => "Flash (閃光, Senkō)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['name' => "Demon Sword (妖刀, Yōtō)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['name' => "Makeup (化粧, Keshō)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['name' => "Secret (秘密, Himitsu)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['name' => "Howl (咆哮, Hōkō)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['name' => "Fruit (果実, Kajitsu)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['name' => "Wizard Water / Magic Water (仙水, Sen-sui)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['name' => "Reunion (再会, Saikai)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['name' => "Brothers (同胞, Dōhō)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['name' => "Mask (仮面, Kamen)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['name' => "Red Brush (赤筆, Akafude)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['name' => "Beast Herd / Beast Pack (群獣, Gunjū)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['name' => "Paradise (楽園, Rakuen)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['name' => "Train (列車, Ressha)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['name' => "Stronghold / Fortress (牙城, Gajō)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['name' => "Sworn Friends / Alliance (盟友, Meiyū)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['name' => "Golden (金色, Kin’iro)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['name' => "Era / Time (時代, Jidai)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['name' => "My Name is Garo - The History of Kouga Saejima's Battles (我が名は牙狼 - 冴島鋼牙 戦いの軌跡, Waga Na wa Garo)", 'category_id' => $this->Category('garo-makai-senki'), 'type' => 'episode', 'number' => 25, 'airdate' => null],
            ['name' => "Ryuga (流牙)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['name' => "Gold Wave (波)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['name' => "Dungeon (迷)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['name' => "Dream (夢)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['name' => "Nightmare (悪夢)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['name' => "Rock (ロック)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['name' => "Dining (食卓)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['name' => "Scoop (スクープ)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['name' => "Sonshi (尊士)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['name' => "Promise (約束)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['name' => "Desire (虜)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['name' => "Trap (罠)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['name' => "Hunting (狩り)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['name' => "Hyena (ハイエナ)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['name' => "Hint (ヒント)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['name' => "Lost (迷失)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['name' => "Tousei (礼)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['name' => "War (義)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['name' => "Hope (希望)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['name' => "Mother (母)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['name' => "Justice (正義)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['name' => "Master (盟友 / 主)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['name' => "Gold (輝)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['name' => "Future (未来)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['name' => "Beginning (道 Beginning)", 'category_id' => $this->Category('garo-yami-o-terasu-mono'), 'type' => 'episode', 'number' => 25, 'airdate' => null],

        ])->map(function ($item) use ($timestamp) {
            return array_merge($item, $timestamp);
        });

        DB::table('category_videos')->insert($data->toArray());
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
