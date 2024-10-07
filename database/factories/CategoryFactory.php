<?php

namespace Database\Factories;

use App\Models\Category;
use FakeParagraph;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
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
            'title:lt' => fake()->text(50),

            'description:en' => FakeParagraph::countParagraph(4, 12),
            'description:uk' => FakeParagraph::countParagraph(4, 12),
            'description:lt' => FakeParagraph::countParagraph(4, 12),

            //            'salePercent' => rand(0, 100) <= 30 ? rand(1, 100) : null,
        ];
    }
}
