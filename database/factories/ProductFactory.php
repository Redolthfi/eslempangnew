<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'image' => fake()->url,
            'harga' => rand(5000, 10000),
            'description' => fake()->paragraph(),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id
        ];
    }
}
