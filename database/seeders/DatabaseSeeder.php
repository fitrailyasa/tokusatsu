<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Role & User
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(UserSeeder::class);

        // Era &Franchise
        $this->call(EraSeeder::class);
        $this->call(FranchiseSeeder::class);

        // Category
        $this->call(CategoryKamenRiderSeeder::class);
        $this->call(CategorySuperSentaiSeeder::class);
        $this->call(CategoryUltramanSeeder::class);
        $this->call(CategoryPowerRangersSeeder::class);
        $this->call(CategoryGaroSeeder::class);
        $this->call(CategoryMetalHeroSeeder::class);

        // Data & Tag
        $this->call(TagSeeder::class);
        $this->call(DataSeeder::class);

        // Video Series
        $this->call(VideoKamenRiderSeeder::class);
        $this->call(VideoSuperSentaiSeeder::class);
        $this->call(VideoUltramanSeeder::class);
        $this->call(VideoPowerRangersSeeder::class);
        $this->call(VideoGaroSeeder::class);
        $this->call(VideoMetalHeroSeeder::class);

        // Video Movie
        $this->call(MovieKamenRiderSeeder::class);
        $this->call(MovieSuperSentaiSeeder::class);
        $this->call(MovieUltramanSeeder::class);
    }
}
