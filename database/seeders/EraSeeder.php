<?php

namespace Database\Seeders;

use App\Models\Era;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class EraSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Showa',
                'slug' => Str::slug('Showa', '-'),
                'description' => 'The Shōwa era (昭和時代, Shōwa jidai, [ɕoːwadʑidai] ⓘ) was a historical period of Japanese history corresponding to the reign of Emperor Shōwa (Hirohito) from December 25, 1926, until his death on January 7, 1989.[1] It was preceded by the Taishō era and succeeded by the Heisei era. The pre-1945 and post-war Shōwa periods are almost completely different states: the pre-1945 Shōwa era (1926–1945) concerns the Empire of Japan, and post-1945 Shōwa era (1945–1989) concerns the State of Japan.',
            ],
            [
                'name' => 'Heisei',
                'slug' => Str::slug('Heisei', '-'),
                'description' => 'The Heisei era (平成, Japanese: [heːseː] ⓘ) was the period of Japanese history corresponding to the reign of Emperor Akihito from 8 January 1989 until his abdication on 30 April 2019. The Heisei era started on 8 January 1989, the day after the death of the Emperor Hirohito, when his son, Akihito, acceded to the throne as the 125th Emperor. In accordance with Japanese customs, Hirohito was posthumously renamed "Emperor Shōwa" on 31 January 1989.',
            ],
            [
                'name' => 'Reiwa',
                'slug' => Str::slug('Reiwa', '-'),
                'description' => 'The Reiwa Era (Japanese: 令和, pronounced [ɾeːwa] ⓘ or [ɾeꜜːwa]) is the current and 232nd era of the official calendar of Japan. It began on 1 May 2019, the day on which Emperor Akihito\'s eldest son, Naruhito, ascended the throne as the 126th Emperor of Japan. The day before, Emperor Akihito abdicated the Chrysanthemum Throne, marking the end of the Heisei era. The year 2019 corresponds with Heisei 31 from 1 January to 30 April, and with Reiwa 1 (令和元年, Reiwa gannen, \'the base year of Reiwa\') from 1 May. The Ministry of Foreign Affairs of Japan explained the meaning of Reiwa to be "beautiful harmony".',
            ],
        ];

        foreach ($data as $item) {
            Era::create($item);
        }
    }
}
