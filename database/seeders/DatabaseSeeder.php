<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProviderAccount;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EraSeeder::class);
        $this->call(FranchiseSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(VideoKamenRiderSeeder::class);
        $this->call(VideoSuperSentaiSeeder::class);
        $this->call(VideoUltramanSeeder::class);
        $this->call(VideoOtherSeeder::class);
        $this->call(MovieKamenRiderSeeder::class);
        $this->call(MovieSuperSentaiSeeder::class);
        $this->call(MovieUltramanSeeder::class);
        // $this->call(GeojsonSeeder::class);
        // $this->call(AddressProvinceSeeder::class);
        // $this->call(AddressRegencySeeder::class);
        // $this->call(AddressDistrictSeeder::class);
        // $this->call(AddressVillageSeeder::class);
        // $this->call(AddressDetailSeeder::class);
    }
}
