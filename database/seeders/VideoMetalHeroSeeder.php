<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VideoMetalHeroSeeder extends Seeder
{
    public function run(): void
    {
        $timestamp = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $data = collect([
            // METAL HERO
            ['title' => "The Strange Fortress Beneath Tokyo (東京地底の怪要塞 Tōkyō Chitei no Kai Yōsai?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['title' => "The Stolen Japanese Islands (盗まれた日本列島 Nusumareta Nihon Rettō?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['title' => "It's Major! Stop Dr. Kuroboshi's BEM Project (大変だ！黒星博士のベム計画を阻止せよ Taihen da! Kuroboshi-Hakase no Bemu Keikaku o Soshi Seyo?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['title' => "The Majin Helmet That Calls Big Time (死を呼ぶ魔人兜 Shi o Yobu Majin Kabuto?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['title' => "Mimie Cries; The Deadly Poison Cobra Bullet Hits Retsu (ミミーは泣く 猛毒コブラ弾が烈に命中 Mimī wa Naku Mōdoku Kobura Dan ga Retsu ni Meichū?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['title' => "The Geniuses of the Maque School (魔空塾の天才たち Makū juku no Tensai-tachi?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['title' => "A Monster Hides, a Girl Kissed a Petal (怪物がひそむ花びらに少女は口づけした Kaibutsu ga Hisomu Hanabira ni Shōjo wa Kuchidzuke Shita?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['title' => "Justice or Demon? The Silver-Masked Great Hero (正義か悪魔か？銀マスク大ヒーロー Seigi ka Akuma ka? Gin Masuku Dai Hīrō?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['title' => "The Beautiful Puppet Spy (美しい人形スパイ Utsukushii Ningyō Supai?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['title' => "Crush the Human Crusher Corps! (人間クラッシャー部隊を撃破せよ！ Ningen Kurasshā Butai o Gekiha Seyo!?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['title' => "Is Father Alive? The Mysterious SOS Signal (父は生きているのか？謎のSOS信号 Chichi wa Ikite Iru no ka? Nazo no SOS Shingō?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['title' => "Express to the Theme Park! UFO Boys' Big Pinch (遊園地へ急行せよ！UFO少年大ピンチ Yūenchi e Kyūkō Seyo! UFO Shōnen Dai Pinchi?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['title' => "Danger, Retsu! The Great Reversal (危うし烈！大逆転 Ayaushi Retsu! Dai Gyakuten?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['title' => "A Parting of Love And Sadness, The Final Blow (愛と悲しみの別れ とどめの一撃！！ Ai to Kanashimi no Wakare Todome no Ichigeki!!?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['title' => "Illusion? Shadow? Maque City (幻？影？魔空都市 Maboroshi? Kage? Makū Toshi?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['title' => "My First Love is a Jewel's Radiance; Goodbye, Galaxy Express (初恋は宝石の輝き さようなら銀河特急 Hatsukoi wa Hōseki no Kagayaki Sayōnara Ginga Tokkyū?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['title' => "The Running Time Bomb! The Bad Guy Who Rode a Police Bike (走る時限爆弾！白バイに乗った暗殺者 Hashiru Jigen Bakudan! Shirobai ni Notta Ansatsusha?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['title' => "Princess Contest, Nonsense Ryuuguu Castle (乙姫様コンテスト ハチャメチャ竜宮城 Otohimesama Kontesuto Hachamecha Ryūgūjō?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['title' => "Jo-Chaku at 6:00 AM! Z Beam Charge Complete (午前6時蒸着！Zビームチャージ完了 Gozen Rokuji Jōchaku! Zetto Bīmu Chāji Kanryō?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['title' => "The Mysterious? Emergency Hospital! Humanity's Great Collapse Approaches (なぞ？の救急病院！人類の大滅亡が迫る Nazo? No Kyūkyū Byōin! Jinrui no Dai Metsubō ga Semaru?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['title' => "The Dancing, Prickly Great Pinch: Operation Honey! (踊ってチクリ大ピンチ ハニー作戦よ！ Odotte Chikuri Dai Pinchi Hanī Sakusen yo!?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['title' => "Golden Mask and Younger Sister: The Yacht Running Toward the Sun (黄金仮面と妹 太陽に向って走るヨット Ōgon Kamen to Imōto Taiyō ni Mukatte Hashiru Yotto?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['title' => "The Beauty's Cries That Cut Through the Night! The Phantom Coach in the Fog (闇を裂く美女の悲鳴！霧の中の幽霊馬車 Yami o Saku Bijo no Himei! Kiri no Naka no Yūrei Basha?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['title' => "Mimie's Nightmare!? The Howling, Cut-Up Demonbeast (ミミーの悪夢か！？吠える切り裂き魔獣 Mimī no Akumu ka!? Hoeru Kirisaki Majū?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['title' => "The Suspiciously Flickering Underwater Flower; Wakaba in Danger (怪しくゆらめく水中花 わかばが危ない Ayashiku Yurameku Suichūka Wakaba ga Abunai?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 25, 'airdate' => null],
            ['title' => "I Saw The Doll! The True Identity of the Poison Gas Killer Corps (人形は見た！！毒ガス殺人部隊の正体 Ningyō wa Mita!! Dokugasu Satsujin Butai no Shōtai?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 26, 'airdate' => null],
            ['title' => "The Teachers are Weird! A School Full of Weirdness (先生たちが変だ！学校は怪奇がいっぱい Sensei-tachi ga Hen da! Gakkō wa Kaiki ga Ippai?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 27, 'airdate' => null],
            ['title' => "The Dark Sea of Space, Wandering Witch Monica (暗黒の宇宙の海 さまよえる魔女モニカ Ankoku no Uchū no Umi Samayoeru Majo Monika?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 28, 'airdate' => null],
            ['title' => "Blitzkrieg Magic Battle! A Program of Assassination (電撃マジック合戦！暗殺のプログラム Dengeki Majikku Kassen! Ansatsu no Puroguramu?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 29, 'airdate' => null],
            ['title' => "Don Horror's Son Has Returned to Maque Castle (ドンホラーの息子が魔空城に帰って来た Don Horā no Musuko ga Makūjō ni Kaettekita?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 30, 'airdate' => null],
            ['title' => "Listening to the Angel's Song, the Princess Who Became a Doll (天使の歌が聞こえる 人形にされた王女 Tenshi no Uta ga Kikoeru Ningyō ni Sareta Ōjo?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 31, 'airdate' => null],
            ['title' => "The Mysterious Underground Maze Target is WX1 (謎の地底迷路 ターゲットはWX-1 Nazo no Chitei Meiro Tāgetto wa WX-1?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 32, 'airdate' => null],
            ['title' => "A New Monster is Born: The Boy Who Picked up an Alien (新怪物誕生 エイリアンを拾った少年 Shin Kaubutsu Tanjō Eirian o Hirotta Shōnen?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 33, 'airdate' => null],
            ['title' => "Memories are Tears of Stars: a Fatherless Child, a Motherless Child (思い出は星の涙 父のない子 母のない子 Omoide wa Hoshi no Namida Chichi no Nai Ko Haha no Nai Ko?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 34, 'airdate' => null],
            ['title' => "The Young Lion of Maque, San Dorva's Opposition (マクーの若獅子 サンドルバの反抗 Makū no Waka Shishi San Doruba no Hankō?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 35, 'airdate' => null],
            ['title' => "The Roadshow of Resentment, The Film Studio is Maque Space (恨みのロードショー 撮影所は魔空空間 Urami no Rōdoshō Satsueijo wa Makū Kūkan?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 36, 'airdate' => null],
            ['title' => "The Funny Tomboy Princess' Earth Adventure Trip (おてんばひょうきん姫の地球冒険旅行 Otenba Hyōkin Hime no Chikyū Bōken Ryokō?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 37, 'airdate' => null],
            ['title' => "The Surrounded Transport Corps; the Righteous Sun Sword (包囲された輸送部隊 正義の太陽剣 Hōi Sareta Yusō Butai Seigi no Taiyō Tsurugi?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 38, 'airdate' => null],
            ['title' => "When I Returned From School, My House Become the Maque Base (学校から帰ったらぼくの家はマクー基地 Gakkō Kara Kaettara Boku no Uchi wa Makū Kichi?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 39, 'airdate' => null],
            ['title' => "The Decisive Battle of the Valley of Doom; You're a Space Sheriff Too! (死の谷の大決戦 君も宇宙刑事だ！ Shi no Tani no Dai Kessen Kimi mo Uchū Keiji da!?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 40, 'airdate' => null],
            ['title' => "Maque City is a Battlefield of Men, The Red Hourglass of Life (魔空都市は男の戦場 赤い生命（いのち）の砂時計 Makū Toshi wa Otoko no Senjō Akai Inochi no Sunadokei?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 41, 'airdate' => null],
            ['title' => "Retsu! Hurry! Dad (烈よ急げ！父よ Retsu yo Isoge! Chichi yo?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 42, 'airdate' => null],
            ['title' => "Reunion (再会 Saikai?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 43, 'airdate' => null],
            ['title' => "The Head of Don Horror (ドンホラーの首 Don Horā no Kubi?)", 'category_id' => $this->Category('gavan'), 'type' => 'episode', 'number' => 44, 'airdate' => null],
            ['title' => "Genmu (幻夢 Genmu?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['title' => "Spirit World New Town (魔界ニュータウン Makai Nyū Taun?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['title' => "A Promise With Kumiko (久美子との約束 Kumiko to no Yakusoku?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['title' => "The Microcomputer Investigation (マイコン指名手配 Maikron Shimeitehai?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['title' => "Yoko of the Harbor Doesn't Forget the Melody of Love (港のヨーコは愛のメロディを忘れない Minato no Yōko wa Ai no Merodi o Wasurenai?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['title' => "The Small Life Flying Through the Forest of the Battlefield (戦場の森をかける小さな命 Senjō no Mori o Kakeru Chiisa na Inochi?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['title' => "Who is the Me Floating in the Mirror!? (鏡の中に浮かぶ私は誰れ!? Kagami no Naka ni Ukabu Watashi wa Dare!??)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['title' => "The Comeback Salmon Revived by the Lutaceous River (泥の河は甦える カムバック サーモン Dorono Kawa wa Yomegaeru Kamubakku Sāmon?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['title' => "The Surprise House is at Genmu Town, Address 0 (ビックリハウスは幻夢町0番地 Bikkuri Hausu wa Genmu Machi Zero Banchi?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['title' => "Genmu Castle to Tokyo: Chase the Shadow of the Express (幻夢城―東京　エキスプレスの影を追え Genmujō Tōkyō Ekisupuresu no Kage o Oe?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['title' => "He Came From the Dark Nebula, the Strongest Villain, Fighter (暗黒星雲から来た 最強の悪役ファイター Ankoku Seiun Kara Kita Saikyō no Akuyaku Faitā?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['title' => "An Alien's Smile; Operation My Friend (異星人のほほえみ マイフレンド作戦 Iseijin no Hohoemi Mai Furendo Sakusen?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['title' => "Strength is Love; The Heroes Set Off (強さは愛だ 英雄たちの旅立ち Tsuyosa wa Ai da Eiyū-tachi no Tabidachi?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['title' => "The Grandmother Who's Scared of Recurring Nightmares (連続夢魔におびえる億万長者 Obachan Renzoku Muma ni Obieru Okumanchōja?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['title' => "The Device Island of the Sea's Rumbling (海鳴りの仕掛島 Uminari no Shikake Shima?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['title' => "The Dangerous Hit Song Sung by the Pretty Girl (美少女歌手が歌う危険なヒットソング Bishōjo Kashu ga Utau Kiken na Hitto Songu?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['title' => "The Wondrous Extradimensional Trip of the New Model Double-Decker Bus (新型二階だてバスのふしぎな異次元旅行 Shingata Nikai Date Basu no Fushigi na I-jigen Ryokō?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['title' => "It's Summer! It's the Sea! The Meteor Group Who Attacks Izuhantou (夏だ！海だ！伊豆半島を襲うメテオの群 Natsu da! Umi da! Izuhantō o Osō Meteo no Gun?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['title' => "The Mysterious Girl Who Stands Alone on the Cape Wicked Men Visit (魔境岬に一人立つ神秘の少女 Makyō Misaki ni Hitori Tatsu Shinpi no Shōjo?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['title' => "The Prism Desert Island That Calls the Stormy Seas (荒波が呼ぶ七色水晶の孤島 Aranami ga Yobu Shichishoku Suishō no Kotō?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['title' => "The Secret Room's Fang – Lily Likes a Mystery (密室の牙・リリィはミステリーがお好き Misshitsu no Kiba – Ririi wa Misuterī ga O-suki?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['title' => "The Temptation to Heaven That the Tennis Player Attacks (テニスプレーヤーを襲う天国への誘惑 Tenisu Purēyā o Osō Tengoku e no Yūwaku?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['title' => "Fear of the Copy Era; Big Gathering of All Humans (コピー時代の恐怖 そっくり人間大集合 Kopī Jidai no Kyōfu Sokkuri Ningen Dai Shūgō?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['title' => "The Japan Lazy Person Disease Transported by the Insect Hurricane (昆虫ハリケーンが運んだ日本なまけ者病 Konchū Harikēn ga Hakonda Nihon Namakemono Byō?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['title' => "Tears in a Demon's Eye – An Angel's Tears – Papa's Help is Coming (鬼の目に涙・天使の涙・パパ助けに来て Oni no Me ni Namida – Tenshi no Namida – Papa Tasuke ni Kite?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 25, 'airdate' => null],
            ['title' => "The Trap of Anger; The Great Makeup War (憎しみの罠 メイクアップ大戦争 Nikushimi no Wana Meikuappu Dai Sensō?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 26, 'airdate' => null],
            ['title' => "The Treacherous Skies; The Fugitive From the Dark Jail (裏切りの空 暗黒刑務所からの逃亡者 Uragiri no Sora Ankoku Keimusho Kara no Tōbōsha?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 27, 'airdate' => null],
            ['title' => "The Campus is an 80m Wind Speed Violent Storm (キャンパスは風速80Mの猛烈ストーム Kyanpasu wa Sōsoku Hachijū Mētā no Mōretsu Sutōmu?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 28, 'airdate' => null],
            ['title' => "Who is the Enemy? The Hot-Blooded Man Who Targets the Wilderness (敵は誰だ？荒野をめざす熱血児 Teki wa Dare da? Areno o Mezasu Nekketsuji?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 29, 'airdate' => null],
            ['title' => "The Abandoned Children; Transforming Mama (捨てられる子供たち 変身するママ Suterareru Kodomo-tachi Henshin Suru Mama?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 30, 'airdate' => null],
            ['title' => "Miyuki, Now? The Wandering Illusion Crystal (みゆきは今? さまよえる幻のクリスタル Miyuki wa Ima? Samayoeru Maboroshi no Kurisutaru?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 31, 'airdate' => null],
            ['title' => "A Genmu Work Orange and a Lullaby! (幻夢じかけのオレンジと子守唄！ Genmujikake no Orenji to Komoriuta!?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 32, 'airdate' => null],
            ['title' => "An Instant Trip! Inside the Genmu Castle are Bizarre Flowers in Full Bloom (瞬間旅行！幻夢城内は怪奇の花ざかり Shunkan Ryokō! Genmujōnai wa Kaiki no Hanazakari?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 33, 'airdate' => null],
            ['title' => "The Hair-Raising Spirit is the Guide to the Ghost World (総毛立つ幽鬼は死霊界への案内人 Sōkedatsu Yūki wa Shiryō Kai e no Annai Hito?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 34, 'airdate' => null],
            ['title' => "If You Fall, Stand up, Den! Love is the Radiance of Life (倒れたら立ちあがれ電！愛は生命（いのち）の輝き Taoretara Tachiagare Den! Ai wa Inochi no Kagayaki?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 35, 'airdate' => null],
            ['title' => "The Iga Warrior Team's Z Flag Rises in the Cloudy Space Sky (風雲の宇宙海にイガ戦士団のZ旗あがる Fūun no Uchū Umi ni Iga Senshi Dan no Z Hata Agaru?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 36, 'airdate' => null],
            ['title' => "The Bear-Hunting Grandpa Saw the Wondrous Poison Flower (不思議な毒花を熊狩りじいさんは見た Fushigi na Doku Hana o Kumagari Jiisan wa Mita?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 37, 'airdate' => null],
            ['title' => "Crazy Whispering Coup d'état, Genmu Castle of Dark Clouds (乱心ささやきクーデター 暗雲の幻夢城 Ranshin Sasayaki Kūdetā An'un no Genmujō?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 38, 'airdate' => null],
            ['title' => "The Doll Knows the Wounds of the Iga Warrior's Heart (人形は知っているイガ戦士の心の傷を Ningyō wa Shitte Iru Iga Senshi no Kokoro no Kizu o?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 39, 'airdate' => null],
            ['title' => "The Fiery Car Chase, the Great Promise to Tear Bonds of Love (炎のカーチェイス 愛の絆を裂く大予言 Honō no Kā Cheisu Ai no Kizuna o Saku Dai Kanegoto?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 40, 'airdate' => null],
            ['title' => "Oh Phoenix! Soar Back to the Genmukai with Reverse Thrust! (不死鳥よ！逆噴射の幻夢界へ舞いもどれ Fushichō yo! Gyakufunsha no Genmukai e Maimodore?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 41, 'airdate' => null],
            ['title' => "The Crimson Youth of the Female Warrior Who Ran Through the Battlefield (戦場を駆けぬけた女戦士の真赤な青春 Senjō o Kakenuketa Onna Senshi no Makka na Seishun?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 42, 'airdate' => null],
            ['title' => "The Tears of a Mother and Child's Love Flow Down the Road to Heaven (母と子の愛の涙が天国への道に流れる Haha to Ko no Ai no Namida ga Tengoku e no Michi ni Nagareru?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 43, 'airdate' => null],
            ['title' => "The Midnight Cinderella is Full of the Aroma of Roses (バラの香りに満ちた真夜中のシンデレラ Bara no Kaori ni Michita Mayonaka no Shinderera?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 44, 'airdate' => null],
            ['title' => "The Audition's Trap; The Big Little Child Star (オーディションの罠 ちびっ子大スター Ōdishon no Wana Chibikko Dai Sutā?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 45, 'airdate' => null],
            ['title' => "The Birthday Promise; The Sky Cloud That Draws a Dream to the Heavens (誕生日の約束 大空に夢をえがく飛行雲 Tanjōbi no Yakusoku Ōzora ni Yume o Egaku Hikō Kumo?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 46, 'airdate' => null],
            ['title' => "The Older Brother and Younger Sister Who Wish For Happiness; Sparks Fall, Holy Sword, Evil Sword (幸福（しあわせ）をねがう兄と妹 火花散る正剣邪剣 Shiawase o Negau Ani to Imōto Hibana Chiru Seiken Jaken?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 47, 'airdate' => null],
            ['title' => "Mimie (ミミー Mimī?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 48, 'airdate' => null],
            ['title' => "Gamagon (ガマゴン?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 49, 'airdate' => null],
            ['title' => "Umibozu (海坊主 Umibōzu?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 50, 'airdate' => null],
            ['title' => "Seki-Sha Jo-Chaku (赤射・蒸着 Sekisha Jōchaku?)", 'category_id' => $this->Category('sharivan'), 'type' => 'episode', 'number' => 51, 'airdate' => null],
            ['title' => "Fushigikai (不思議界 Fushigikai?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            ['title' => "Dance, Petpet (踊れペトペト! Odore, Petopeto?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 2, 'airdate' => null],
            ['title' => "Annie Doesn't Listen (アニー応答なし Anī Ōtōnashi?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 3, 'airdate' => null],
            ['title' => "The Children who became Animals (犬になった子供達 inuni natta kodomotachi?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 4, 'airdate' => null],
            ['title' => "Suddenly! Lazy People (突然! なまけもの Totsuzen! Namakemono?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 5, 'airdate' => null],
            ['title' => "Counter-attack of the Strange Cooking (不思議料理の逆襲 Fushigi Ryouri no Gyakushuu?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 6, 'airdate' => null],
            ['title' => "Do You See the Girls' Transformations? (見たかギャル変幻 Mitaka Gyaru Hengen?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 7, 'airdate' => null],
            ['title' => "Rebellious Girl from the Stars (星からの非行少女 Hoshi kara no Hikou Shōjo?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 8, 'airdate' => null],
            ['title' => "I Hate Aogaki-tai! (青ガキ隊大キライ Aogaki Tai Daikirai?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 9, 'airdate' => null],
            ['title' => "House of Twillight (トワイライトの家 Towairaito no Ie?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 10, 'airdate' => null],
            ['title' => "Leave it to Annie (アニーにおまかせ Anī ni Omakase?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 11, 'airdate' => null],
            ['title' => "Perfect-Score Genta's True Identity? (百点源太の正体? Hyakuten Genta no Shōtai??)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 12, 'airdate' => null],
            ['title' => "The Gold Medal Tricked People (金メダル仕掛け人 Kin Medaru Shikakenin?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 13, 'airdate' => null],
            ['title' => "The Mutant's Love (恋のミュータント Koi no Myūtanto?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 14, 'airdate' => null],
            ['title' => "Marine Blue of the Seashore (渚のマリンブルー Nagisa no Marin Burū?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 15, 'airdate' => null],
            ['title' => "The Surprising Alien Life Form (たまげた異星生物 Tamageta Isei Seibutsu?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 16, 'airdate' => null],
            ['title' => "The Mysterious Writings of the Space Sheriffs (銀河警察の謎文字 Ginga Keisatsu no Nazomoji?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 17, 'airdate' => null],
            ['title' => "The Pacific Ocean Where Mysteries Bring Forth Mysteries (謎が謎呼ぶ太平洋 Nazoga Nazoyobu Taiheiyō?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 18, 'airdate' => null],
            ['title' => "Annie's Close Call (アニー危機一髪 Anī Kiki Ippatsu?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 19, 'airdate' => null],
            ['title' => "The Fushigi Song (不思議ソング Fushigi Songu?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 20, 'airdate' => null],
            ['title' => "Yaada! The Beast Family (ヤーダ! 珍獣家族 Yāda! Chinjū Kazoku?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 21, 'airdate' => null],
            ['title' => "The Merman Calls the Ocean of Mysteries (人魚が呼ぶ海の怪 Ningyo ga Yobu Umi no Kai?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 22, 'airdate' => null],
            ['title' => "The Great Escape With Wounds All Over (傷だらけの大脱走 Kizudarake no Dai Dassō?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 23, 'airdate' => null],
            ['title' => "The Beautiful Poe's Mask (美しきポーの仮面 Utsukushiki Pō no Kamen?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 24, 'airdate' => null],
            ['title' => "Esper Queen (エスパークイーン Esupā Kuīn?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 25, 'airdate' => null],
            ['title' => "The Demon Zone Grand Prize (魔界ゾーン大当り Makai Zōn ōatari?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 26, 'airdate' => null],
            ['title' => "The Mashima Deathmatch (デスマッチの魔島 Desumacchi no Matou?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 27, 'airdate' => null],
            ['title' => "The Demon Palace's Backstabbing Brothers (魔宮の裏切り兄弟 Makyū no Uragiri Kyodai?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 28, 'airdate' => null],
            ['title' => "Police Woman with a Hundred Faces (百面相だよ女刑事 Hyakumensō da yo Onna Keiji?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 29, 'airdate' => null],
            ['title' => "The Message of Life Slices Through the Sky (空(くう)を裂く命の交信 Kū wo saku Inochi no Kōshin?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 30, 'airdate' => null],
            ['title' => "Canned Beast Bargain (猛獣缶詰バーゲン mōjuu Kanzume Bāgen?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 31, 'airdate' => null],
            ['title' => "Our Melody (僕と君のメロディ Boku to Kimi no Merodi?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 32, 'airdate' => null],
            ['title' => "The Walking Puppet Master (散歩する腹話術師 Sanpo Suru Hukuwajutsushi?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 33, 'airdate' => null],
            ['title' => "Kubilai's Secret (クビライの秘密 Kubirai no Himitsu?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 34, 'airdate' => null],
            ['title' => "The Golden Arrow That's Shot at a Mystery (謎を射る黄金の矢 Nazo wo iru Ōgon no Ya?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 35, 'airdate' => null],
            ['title' => "It's the Maddening Age of Yumecom (ユメコン狂時代だ Yumecon Kyou Jidaida?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 36, 'airdate' => null],
            ['title' => "Roar, Beam Gun (吼えろビームガン Hoero Beemu Gan?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 37, 'airdate' => null],
            ['title' => "Mashōjo Cinderella (魔少女シンデレラ 'Mashōjo Shinderera?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 38, 'airdate' => null],
            ['title' => "The Masked Dancing Choir (仮面が踊る聖歌隊 Kamenga Odoru Seikatai?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 39, 'airdate' => null],
            ['title' => "Vavilos S.O.S. (バビロス号SOS Babirosu-gō S.O.S.?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 40, 'airdate' => null],
            ['title' => "Direct Attack on the Female Journalist (直撃じゃじゃ馬娘 Chokugeki jaja Uma Musume?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 41, 'airdate' => null],
            ['title' => "The 6th Grade Class 0 Strangeness (6年0組の不思議 6-Nen 0-Gumi no Fushigi?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 42, 'airdate' => null],
            ['title' => "Our Fuuma (ぼくンちのフーマ Bokunchi No Fūma?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 43, 'airdate' => null],
            ['title' => "The Devastating Great Invasion (吹き荒れる大侵略 Fuki Areru Daishinryaku?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 44, 'airdate' => null],
            ['title' => "The Fire-Breathing Golden Idol (火を吐く黄金巨像 Hi o Haku Ōgon Kyozō?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 45, 'airdate' => null],
            ['title' => "Phantom Showtime (幻のショータイム Maboroshi no Shō Taimu?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 46, 'airdate' => null],
            ['title' => "12,000 Years of Darkness (一万二千年の暗黒 Ichiman Nisennen no Ankoku?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 47, 'airdate' => null],
            ['title' => "Justice, Friendship and Love (正義・友情・愛 Seigi.Yūjō.Ai.?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 48, 'airdate' => null],
            ['title' => "The Three Space Sheriffs: Gavan, Sharivan and Shaider Great Gathering! (3人の宇宙刑事 ギャバン シャリバン シャイダー大集合!! Sannin no Uchu Keiji: Gyaban, Shariban, Shaida Daishuno!?)", 'category_id' => $this->Category('shaider'), 'type' => 'episode', 'number' => 49, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('juspion'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('spielvan'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('metalder'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('jiraiya'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('jiban'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('winspector'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('solbrain'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('exceedraft'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('janperson'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('blue-swat'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('juuko-b-fighter'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('b-fighter-kabuto'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('b-robo-kabutack'), 'type' => 'episode', 'number' => 1, 'airdate' => null],
            // ['title' => "", 'category_id' => $this->Category('robotack'), 'type' => 'episode', 'number' => 1, 'airdate' => null],

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
