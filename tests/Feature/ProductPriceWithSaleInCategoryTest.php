<?php

//
//namespace Feature;
//
//use App\Models\Category;
//use App\Models\Product;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Tests\TestCase;
//
//class ProductPriceWithSaleInCategoryTest extends TestCase
//{
//    use RefreshDatabase;
//
//    /**
//     * A basic unit test example.
//     */
//    public function testNowPriceWithNewPrice()
//    {
//        $data = [
//            'title:en' => fake()->text(50),
//            'title:uk' => fake()->text(50),
//            'description:en' => fake()->text(50),
//            'description:uk' => fake()->text(50),
//            'price' => 1200,
//            'sku' => rand(100, 700),
//            'newPrice' => 1000,
//        ];
//
//        $product = Product::create($data);
//        $this->assertSame('1 000,00 ₴', $product->nowPrice);
//    }
//
//    public function testNowPriceWithoutNewPriceAndNoDiscount()
//    {
//        $data2 = [
//            'title:en' => fake()->text(50),
//            'title:uk' => fake()->text(50),
//            'description:en' => fake()->text(50),
//            'description:uk' => fake()->text(50),
//            'price' => 1200,
//            'sku' => rand(100, 700),
//        ];
//
//        $product2 = Product::create($data2);
//
//        $product2->categories()->sync([]);
//        $this->assertEquals('1 200,00 ₴', $product2->nowPrice);
//    }
//
//    public function testNowPriceWithCategoryDiscount()
//    {
//        $data2 = [
//            'title:en' => fake()->text(50),
//            'title:uk' => fake()->text(50),
//            'description:en' => fake()->text(50),
//            'description:uk' => fake()->text(50),
//            'price' => 1200,
//            'sku' => rand(100, 700),
//        ];
//
//        $product = Product::create($data2);
//        $category = Category::factory()->create(['salePercent' => 10]);
//        $product->categories()->sync([$category->id]);
//        $this->assertEquals('1 080,00 ₴', $product->nowPrice);
//    }
//
//    public function testNowPriceWithMultipleCategoryDiscounts()
//    {
//        $data2 = [
//            'title:en' => fake()->text(50),
//            'title:uk' => fake()->text(50),
//            'description:en' => fake()->text(50),
//            'description:uk' => fake()->text(50),
//            'price' => 1200,
//            'sku' => rand(100, 700),
//        ];
//
//        $product = Product::create($data2);
//        $category1 = Category::factory()->create(['salePercent' => 10]);
//        $category2 = Category::factory()->create(['salePercent' => 20]);
//        $product->categories()->sync([$category1->id, $category2->id]);
//        $this->assertEquals('1 080,00 ₴', $product->nowPrice);
//    }
//
//    public function testNowPriceWithParentCategoryDiscount()
//    {
//        $data2 = [
//            'title:en' => fake()->text(50),
//            'title:uk' => fake()->text(50),
//            'description:en' => fake()->text(50),
//            'description:uk' => fake()->text(50),
//            'price' => 1200,
//            'sku' => rand(100, 700),
//        ];
//
//        $product = Product::create($data2);
//
//        $parentCategory = Category::factory()->create(['salePercent' => 15]);
//        $category = Category::factory()->create(['category_id' => $parentCategory->id]);
//        $product->categories()->sync([$category->id]);
//        $this->assertEquals('1 020,00 ₴', $product->nowPrice);
//    }
//
//    public function testNowPriceWithParentCategoryAndManySubcategoryDiscountWhereMinSaleInParentCategory()
//    {
//        $data2 = [
//            'title:en' => fake()->text(50),
//            'title:uk' => fake()->text(50),
//            'description:en' => fake()->text(50),
//            'description:uk' => fake()->text(50),
//            'price' => 1200,
//            'sku' => rand(100, 700),
//        ];
//
//        $product = Product::create($data2);
//
//        $parentCategory = Category::factory()->create(['salePercent' => 15]);
//        $category = Category::factory()->create(['category_id' => $parentCategory->id]);
//        $category2 = Category::factory()->create(['salePercent' => 20]);
//        $category3 = Category::factory()->create(['salePercent' => 30]);
//        $category4 = Category::factory()->create(['salePercent' => 40, 'category_id' => $parentCategory->id]);
//        $product->categories()->sync([$category->id, $category2->id, $category3->id, $category4->id]);
//        $this->assertEquals('1 020,00 ₴', $product->nowPrice);
//    }
//
//    public function testNowPriceWithParentCategoryAndManySubcategoryDiscountWhereMinSaleInSubCategory()
//    {
//        $data2 = [
//            'title:en' => fake()->text(50),
//            'title:uk' => fake()->text(50),
//            'description:en' => fake()->text(50),
//            'description:uk' => fake()->text(50),
//            'price' => 1200,
//            'sku' => rand(100, 700),
//        ];
//
//        $product = Product::create($data2);
//
//        $parentCategory = Category::factory()->create(['salePercent' => 70]);
//        $category = Category::factory()->create(['category_id' => $parentCategory->id]);
//        $category2 = Category::factory()->create(['salePercent' => 20]);
//        $category3 = Category::factory()->create(['salePercent' => 15]);
//        $category4 = Category::factory()->create(['salePercent' => 40, 'category_id' => $parentCategory->id]);
//        $product->categories()->sync([$category->id, $category2->id, $category3->id, $category4->id]);
//        $this->assertEquals('1 020,00 ₴', $product->nowPrice);
//    }
//}
