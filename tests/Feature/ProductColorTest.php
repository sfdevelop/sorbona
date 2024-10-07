<?php

namespace Tests\Feature;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductColorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_colors_to_product()
    {
        $data = [
            'title:en' => fake()->text(50),
            'title:uk' => fake()->text(50),
            'description:en' => fake()->text(50),
            'description:uk' => fake()->text(50),
            'price' => 1200,
            'sku' => rand(100, 700),
            'newPrice' => 1000,
        ];

        $product = Product::create($data);
        $color = Color::factory()->create();

        $product->productColors()->attach($color->id);

        $this->assertTrue($product->productColors->contains($color));
    }

    /** @test */
    public function it_can_remove_colors_from_product()
    {
        $data = [
            'title:en' => fake()->text(50),
            'title:uk' => fake()->text(50),
            'description:en' => fake()->text(50),
            'description:uk' => fake()->text(50),
            'price' => 1200,
            'sku' => rand(100, 700),
            'newPrice' => 1000,
        ];

        $product = Product::create($data);
        $color = Color::factory()->create();

        $product->productColors()->attach($color->id);
        $product->productColors()->detach($color->id);

        $this->assertFalse($product->productColors->contains($color));
    }
}
