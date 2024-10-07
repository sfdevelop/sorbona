<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutFrontTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Додаємо middleware для локалізації
        $this->withoutMiddleware([
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        ]);
    }

    /**
     * A basic feature test example.
     */
    public function test_home_page(): void
    {
        app()->setLocale('en');

        $response = $this->followingRedirects()->get(route('home'));

        // Перевіряємо статус
        $response->assertStatus(200);

        $response->assertSee(__('front.menu.home'));
        $response->assertSee(__('front.menu.bestsellers'));
        $response->assertSee(__('front.more_offers'));
        $response->assertSee(__('front.new_products'));
    }

    public function test_catalog_page(): void
    {
        app()->setLocale('en');

        Category::factory()->count(1)->create();

        $response = $this->followingRedirects()->get(route('catalog'));

        // Перевіряємо статус
        $response->assertStatus(200);
        $response->assertSee(Category::query()->first()->title);
    }

    public function test_subcategory_page(): void
    {
        app()->setLocale('en');

        Category::factory()->count(1)->create();

        Category::all()->each(function ($category) {
            Category::factory(2)
                ->create(['category_id' => $category->id]);
        });

        $parent = Category::query()->first();

        $response = $this->followingRedirects()->get(route('subcategory',
            $parent->slug));

        // Перевіряємо статус
        $response->assertStatus(200);
        $response->assertSee($parent->childrenCategories->first()->title);
    }

    public function test_sale_page(): void
    {
        app()->setLocale('en');

        $product = Product::factory()->count(1)->create(['newPrice' => 125]);

        $response = $this->followingRedirects()->get(route('sale'));

        // Перевіряємо статус
        $response->assertStatus(200);
    }

    public function test_bestseller_page(): void
    {
        app()->setLocale('en');

        Product::factory()->count(1)->create(['is_bestseller' => true]);

        $response = $this->followingRedirects()->get(route('bestseller'));

        // Перевіряємо статус
        $response->assertStatus(200);
    }

    public function test_subcategory_filters_page(): void
    {
        app()->setLocale('en');

        $category = Category::factory()->count(1)->create();

        $product = Product::factory()->count(5)->create();

        $product->first()->categories()->sync($category->first()->id);

        $response = $this->followingRedirects()->get(route('filter',
            $category->first()->slug));

        // Перевіряємо статус
        $response->assertStatus(200);
        $response->assertSeeText($category->first()->title);
    }
}
