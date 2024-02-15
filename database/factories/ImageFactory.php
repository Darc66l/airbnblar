<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => fake()->imageUrl(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'Adress' => fake()->address(),
            'price' => fake()->numberBetween(100, 1000),
            'user_id' => fake()->numberBetween(0, 100),
        ];
    }
}
