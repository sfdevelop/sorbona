<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
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

            'description:en' => fake()->text(50),
            'description:uk' => fake()->text(50),
            'description:lt' => fake()->text(50),

            'url' => fake()->url,
        ];
    }
}
