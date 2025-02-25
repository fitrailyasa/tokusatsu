<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Data;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    protected $model = Data::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word;

        return [
            'name' => ucfirst($name),
            'img' => $this->faker->imageUrl(200, 200, 'datas', true, 'Data'),
            'category_id' => Category::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
