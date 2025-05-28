<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Front\Checkout\CheckoutLiveWire;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CheckoutLiveWireValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registration_rules_are_properly_validated()
    {
        // Створюємо користувача з відомими email та телефоном
        User::factory()->create([
            'email' => 'existing@example.com',
            'phone' => '+380931234567'
        ]);

        // Перевіряємо унікальність email
        Livewire::test(CheckoutLiveWire::class)
            ->set('register', true)
            ->set('email', 'existing@example.com')
            ->set('phone', '+380999999999') // унікальний телефон
            ->call('addOrder')
            ->assertHasErrors(['email' => 'unique']);

        // Перевіряємо унікальність телефону
        Livewire::test(CheckoutLiveWire::class)
            ->set('register', true)
            ->set('email', 'new@example.com') // унікальний email
            ->set('phone', '+380931234567')
            ->call('addOrder')
            ->assertHasErrors(['phone' => 'unique']);

        // Перевіряємо формат email
        Livewire::test(CheckoutLiveWire::class)
            ->set('register', true)
            ->set('email', 'not-an-email')
            ->set('phone', '+380999999999')
            ->call('addOrder')
            ->assertHasErrors(['email' => 'email']);

        // Перевіряємо обов'язковість полів
        Livewire::test(CheckoutLiveWire::class)
            ->set('register', true)
            ->set('email', '')
            ->set('phone', '')
            ->call('addOrder')
            ->assertHasErrors([
                'email' => 'required',
                'phone' => 'required'
            ]);
    }

    /** @test */
    /** @test */
    /** @test */
    public function ukrposhta_rules_are_properly_validated()
    {
        // Перевіряємо обов'язковість полів для Укрпошти
        Livewire::test(CheckoutLiveWire::class)
            ->set('name', 'Test User')
            ->set('surname', 'Test Surname')
            ->set('phone', '+380931234567')
            ->set('email', 'test@example.com')
            ->set('delivery', 'deliveryMethodUp')
            // Не встановлюємо значення для полів Укрпошти
            ->call('addOrder')
            ->assertHasErrors(['region', 'locality', 'index']);

        // Перевіряємо валідацію з правильними даними
        Livewire::test(CheckoutLiveWire::class)
            ->set('name', 'Test User')
            ->set('surname', 'Test Surname')
            ->set('phone', '+380931234567')
            ->set('email', 'test@example.com')
            ->set('delivery', 'deliveryMethodUp')
            ->set('region', 'Київська область')
            ->set('locality', 'Київ')
            ->set('index', '01001')
            ->call('addOrder')
            ->assertHasNoErrors(['region', 'locality', 'index']);
    }
    /** @test */
    /** @test */
    public function bank_payment_rules_are_properly_validated()
    {
        // Перевіряємо обов'язковість полів
        Livewire::test(CheckoutLiveWire::class)
            ->set('payment', 'paymentMethodBank')
            ->set('companyName', '')
            ->set('inn', '')
            ->set('edrpou', '')
            ->call('addOrder')
            ->assertHasErrors([
                'companyName' => 'required',
                'inn' => 'required',
                'edrpou' => 'required'
            ]);

        // Перевіряємо мінімальну довжину для companyName
        Livewire::test(CheckoutLiveWire::class)
            ->set('payment', 'paymentMethodBank')
            ->set('companyName', 'AB') // менше 3 символів
            ->set('inn', '12345')
            ->set('edrpou', '12345')
            ->call('addOrder')
            ->assertHasErrors(['companyName' => 'min']);

        // Перевіряємо мінімальну довжину для inn
        Livewire::test(CheckoutLiveWire::class)
            ->set('payment', 'paymentMethodBank')
            ->set('companyName', 'Company Name')
            ->set('inn', '12') // менше 3 символів
            ->set('edrpou', '12345')
            ->call('addOrder')
            ->assertHasErrors(['inn' => 'min']);

        // Перевіряємо, що з правильними даними помилок немає
        Livewire::test(CheckoutLiveWire::class)
            ->set('payment', 'paymentMethodBank')
            ->set('companyName', 'Company Name')
            ->set('inn', '12345')
            ->set('edrpou', '12345')
            // Заповнюємо інші обов'язкові поля
            ->set('name', 'Test User')
            ->set('surname', 'Test Surname')
            ->set('phone', '+380931234567')
            ->set('email', 'test@example.com')
            ->set('delivery', 'deliveryMethodLocal')
            ->call('addOrder')
            ->assertHasNoErrors(['companyName', 'inn', 'edrpou']);
    }

    /** @test */
    /** @test */
    public function nova_poshta_rules_are_properly_validated()
    {
        // Перевіряємо обов'язковість полів
        Livewire::test(CheckoutLiveWire::class)
            ->set('delivery', 'deliveryMethodNp')
            ->set('selectedNpCity', '')
            ->set('selectedNpDepot', '')
            ->call('addOrder')
            ->assertHasErrors([
                'selectedNpCity' => 'required',
                'selectedNpDepot' => 'required'
            ]);

        // Перевіряємо, що з правильними даними помилок немає
        Livewire::test(CheckoutLiveWire::class)
            ->set('delivery', 'deliveryMethodNp')
            ->set('selectedNpCity', 'Київ')
            ->set('selectedNpDepot', 'Відділення 1')
            // Заповнюємо інші обов'язкові поля
            ->set('name', 'Test User')
            ->set('surname', 'Test Surname')
            ->set('phone', '+380931234567')
            ->set('email', 'test@example.com')
            ->call('addOrder')
            ->assertHasNoErrors(['selectedNpCity', 'selectedNpDepot']);
    }

    /** @test */
    public function basic_fields_are_validated_regardless_of_delivery_method()
    {
        // Тестуємо для кожного методу доставки
        $deliveryMethods = ['deliveryMethodLocal', 'deliveryMethodNp', 'deliveryMethodUp'];

        foreach ($deliveryMethods as $method) {
            Livewire::test(CheckoutLiveWire::class)
                ->set('delivery', $method)
                ->set('name', '')
                ->set('phone', '')
                ->set('email', '')
                ->call('addOrder')
                ->assertHasErrors(['name', 'phone', 'email']);
        }
    }

    /** @test */
    /** @test */
    public function comment_field_is_optional()
    {
        // Перевіряємо, що поле коментаря не є обов'язковим
        Livewire::test(CheckoutLiveWire::class)
            ->set('name', 'Test User')
            ->set('surname', 'Test Surname')
            ->set('phone', '+380931234567')
            ->set('email', 'test@example.com')
            ->set('comment', '')
            ->set('delivery', 'deliveryMethodLocal')
            ->call('addOrder')
            ->assertHasNoErrors(['comment']);
    }
}