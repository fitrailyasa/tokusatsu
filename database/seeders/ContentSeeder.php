<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Era &Franchise
        $this->call(\Database\Seeders\Content\EraSeeder::class);
        $this->call(\Database\Seeders\Content\FranchiseSeeder::class);

        // Category
        $this->call(\Database\Seeders\Content\CategoryKamenRiderSeeder::class);
        $this->call(\Database\Seeders\Content\CategorySuperSentaiSeeder::class);
        $this->call(\Database\Seeders\Content\CategoryUltramanSeeder::class);
        $this->call(\Database\Seeders\Content\CategoryPowerRangersSeeder::class);
        $this->call(\Database\Seeders\Content\CategoryGaroSeeder::class);
        $this->call(\Database\Seeders\Content\CategoryMetalHeroSeeder::class);

        // Data & Tag
        $this->call(\Database\Seeders\Content\TagSeeder::class);
        $this->call(\Database\Seeders\Content\DataSeeder::class);

        // Video Series
        $this->call(\Database\Seeders\Content\VideoKamenRiderSeeder::class);
        $this->call(\Database\Seeders\Content\VideoSuperSentaiSeeder::class);
        $this->call(\Database\Seeders\Content\VideoUltramanSeeder::class);
        $this->call(\Database\Seeders\Content\VideoPowerRangersSeeder::class);
        $this->call(\Database\Seeders\Content\VideoGaroSeeder::class);
        $this->call(\Database\Seeders\Content\VideoMetalHeroSeeder::class);

        // Video Movie
        $this->call(\Database\Seeders\Content\MovieKamenRiderSeeder::class);
        $this->call(\Database\Seeders\Content\MovieSuperSentaiSeeder::class);
        $this->call(\Database\Seeders\Content\MovieUltramanSeeder::class);
    }
}
