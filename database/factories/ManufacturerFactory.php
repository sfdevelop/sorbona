<?php

namespace Database\Factories;

use FakeParagraph;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
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
            'title:uk' => fake()->text(50),

            'description:ru' => FakeParagraph::countParagraph(4, 12),
            'description:uk' => FakeParagraph::countParagraph(4, 12),

            'all_title:ru' => fake()->word(),
            'all_title:uk' => fake()->word(),

            'specialization:ru' => fake()->word(),
            'specialization:uk' => fake()->word(),

            'flat:ru' => fake()->sentence,
            'flat:uk' => fake()->sentence,

            'year' => fake()->year,

        ];
    }
}
