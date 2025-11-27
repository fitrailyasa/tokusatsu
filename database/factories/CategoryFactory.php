<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word;

        return [
            'fullname' => $name,
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(),
            'img' => $this->faker->imageUrl(200, 200, 'categories', true, 'category'),
            'era_id' => Era::factory(),
            'franchise_id' => Franchise::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
