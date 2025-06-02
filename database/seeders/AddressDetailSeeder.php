<?php

namespace Database\Seeders;

use App\Models\AddressDetail;
use Illuminate\Database\Seeder;

class AddressDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            
        ];

        foreach ($data as $address) {
            AddressDetail::create($address);
        }
    }
}
