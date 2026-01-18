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
        $this->call(\Database\Seeders\auth\RoleAndPermissionSeeder::class);
        $this->call(\Database\Seeders\auth\UserSeeder::class);

        // Era &Franchise
        $this->call(\Database\Seeders\content\EraSeeder::class);
        $this->call(\Database\Seeders\content\FranchiseSeeder::class);

        // Category
        $this->call(\Database\Seeders\content\CategoryKamenRiderSeeder::class);
        $this->call(\Database\Seeders\content\CategorySuperSentaiSeeder::class);
        $this->call(\Database\Seeders\content\CategoryUltramanSeeder::class);
        $this->call(\Database\Seeders\content\CategoryPowerRangersSeeder::class);
        $this->call(\Database\Seeders\content\CategoryGaroSeeder::class);
        $this->call(\Database\Seeders\content\CategoryMetalHeroSeeder::class);

        // Data & Tag
        $this->call(\Database\Seeders\content\TagSeeder::class);
        $this->call(\Database\Seeders\content\DataSeeder::class);

        // Video Series
        $this->call(\Database\Seeders\content\VideoKamenRiderSeeder::class);
        $this->call(\Database\Seeders\content\VideoSuperSentaiSeeder::class);
        $this->call(\Database\Seeders\content\VideoUltramanSeeder::class);
        $this->call(\Database\Seeders\content\VideoPowerRangersSeeder::class);
        $this->call(\Database\Seeders\content\VideoGaroSeeder::class);
        $this->call(\Database\Seeders\content\VideoMetalHeroSeeder::class);

        // Video Movie
        $this->call(\Database\Seeders\content\MovieKamenRiderSeeder::class);
        $this->call(\Database\Seeders\content\MovieSuperSentaiSeeder::class);
        $this->call(\Database\Seeders\content\MovieUltramanSeeder::class);
    }
}
