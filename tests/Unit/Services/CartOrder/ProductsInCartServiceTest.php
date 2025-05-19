<?php

namespace Tests\Unit\Services\CartOrder;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Services\CartOrder\ProductsInCartService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Tests\TestCase;
use Mockery;
use Illuminate\Support\Collection;

class ProductsInCartServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $cartService;

    protected function setUp(): void
    {
        parent::setUp();

        // Ініціалізуємо сервіс
        $this->cartService = Mockery::mock(ProductsInCartService::class)
            ->makePartial();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * @test
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function it_returns_empty_array_when_cart_is_empty()
    {
        // Налаштовуємо мок для методу getItemsFromCart
        $this->cartService->shouldReceive('getItemsFromCart')
            ->once()
            ->andReturn(collect([]));

        $totalDiscounts = 0;
        $queryProducts = collect([]); // Порожній список продуктів
        $result = $this->cartService->getProductsInCart($totalDiscounts, $queryProducts);

        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    /**
     * @test
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function it_returns_products_array_with_correct_structure()
    {
        // Створюємо категорію
        $category = Category::factory()->create();
        $currency = Currency::factory()->create();
        $manufacturer = Manufacturer::factory()->create();

        // Створюємо реальний продукт в базі даних
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'currency_id' => $currency->id,
            'manufacturer_id' => $manufacturer->id,
            'sku' => 'TEST123',
            'title' => 'Test Product',
            'slug' => 'test-product',
        ]);

        // Створюємо мок для елемента кошика
        $cartItem = (object) [
            'id' => $product->id,
            'quantity' => 2,
            'price' => 10485.0, // Ціна з урахуванням знижки
        ];

        // Налаштовуємо мок для методу getItemsFromCart
        $this->cartService->shouldReceive('getItemsFromCart')
            ->once()
            ->andReturn(collect([$cartItem]));

        // Створюємо мок продукту з потрібними методами
        $productMock = Mockery::mock();
        $productMock->shouldReceive('getAttribute')
            ->with('id')
            ->andReturn($product->id);
        $productMock->shouldReceive('getAttribute')
            ->with('sku')
            ->andReturn('TEST123');
        $productMock->shouldReceive('getAttribute')
            ->with('slug')
            ->andReturn('test-product');
        $productMock->shouldReceive('getAttribute')
            ->with('title')
            ->andReturn('Test Product');
        $productMock->shouldReceive('getAttribute')
            ->with('img_web')
            ->andReturn('/img/product.png');
        
        // Знижка 20%
        $discount = 20.0;
        // Ціна зі знижкою
        $discountedPrice = 10485.0;
        
        $productMock->shouldReceive('getPriceWithDiscount')
            ->with(2)
            ->andReturn(0); // Повертаємо будь-яке значення
        $productMock->shouldReceive('getPriceByCount')
            ->with(2)
            ->andReturn($discountedPrice); // Ціна зі знижкою
        $productMock->shouldReceive('getDiscount')
            ->andReturn($discount);
            
        // Замість мокування статичного методу Product::find, 
        // ми мокуємо метод getProduct в нашому сервісі
        $this->cartService->shouldReceive('getProduct')
            ->with($product->id)
            ->andReturn($productMock);

        $totalDiscounts = 0;
        // Створюємо колекцію продуктів для другого аргументу
        $queryProducts = Product::query()->find(1);
        $result = $this->cartService->getProductsInCart($totalDiscounts, $queryProducts);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals($product->id, $result[0]['id']);
        $this->assertEquals('TEST123', $result[0]['sku']);
        $this->assertEquals('test-product', $result[0]['slug']);
        $this->assertEquals('Test Product', $result[0]['title']);
        $this->assertEquals('/img/product.png', $result[0]['img']);
        $this->assertEquals(2, $result[0]['quantity']);
        
        // Перевіряємо наявність полів, а не їх конкретні значення
        $this->assertArrayHasKey('withoutDiscount', $result[0]);
        $this->assertArrayHasKey('price', $result[0]);
        $this->assertEquals($cartItem, $result[0]['item']);
    }
}