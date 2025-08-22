<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Era;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Era>
 */
class EraFactory extends Factory
{
    protected $model = Era::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word;

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(),
            'img' => $this->faker->imageUrl(200, 200, 'eras', true, 'Era'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
