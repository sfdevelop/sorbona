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
            'title:en' => fake()->text(50),
            'title:uk' => fake()->text(50),

            'description:en' => \FakeParagraph::countParagraph(4, 12),
            'description:uk' => \FakeParagraph::countParagraph(4, 12),

            'price' => rand(5000, 7000),
            'sku' => rand(100, 700),
            'newPrice' => fake()->randomElement([fake()->randomFloat(2, 2000, 3000), null]),
        ];
    }
}
