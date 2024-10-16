<?php

namespace Database\Factories;

use App\Models\Category;
use FakeParagraph;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends Factory<Category>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title:ru' => fake()->text(50),
            'title:uk' => Fake::text(50),

            'description:ru' => FakeParagraph::countParagraph(4, 12),
            'description:uk' => FakeParagraph::countParagraph(4, 12),

            //            'salePercent' => rand(0, 100) <= 30 ? rand(1, 100) : null,
        ];
    }
}
