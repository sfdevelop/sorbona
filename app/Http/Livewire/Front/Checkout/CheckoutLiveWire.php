<?php

namespace App\Http\Livewire\Front\Checkout;

// use App\Actions\Order\GetAddressNovaPochtaAction;
// use App\Actions\Order\GetCityNovaPochtaAction;
// use App\Actions\Order\GetPaymentAction;
// use App\Actions\Order\GetRegionNovaPochtaAction;
use App\Http\Livewire\Front\Trait\CartTrait;
use App\Http\Livewire\Product\ProductBaseComponent;
use App\Http\Livewire\Traits\CreateOrderTrait;
use App\Http\Livewire\Traits\DeliveryDataFromOrderTrait;
use App\Http\Requests\LiveWier\CreateOrderRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;

class CheckoutLiveWire extends ProductBaseComponent
{
    use CartTrait;
    use CreateOrderTrait;
    use DeliveryDataFromOrderTrait;

    public array|object $productsInCart;

    public string $totalDiscounts;

    public string $name = '';

    public string $surname = '';

    public string $phone = '';

    public string $email = '';

    public string $selectedNpCity = '';

    public array|object $NpCities;

    public string $selectedRegion = '';

    public string $selectedCity = '';

    public string $selectedAddress = '';

    public string $paymentDescription = '';

    public string $textOrder = '';

    public string $UkrIndex = '';

    public string $UkrAddress = '';

    public string $MeestIndex = '';

    public string $MeestAddress = '';

    public array|object $regions;

    public array|object $cities;

    public array|object|null $address;

    public string $delivery = 'deliveryMethodNp';

    public string $payment = 'paymentMethodCard';

    public bool $seeAddress = false;

    public int|float|string $total;

    protected $listeners = ['refreshCartOrderLiveWier' => '$refresh'];

    protected function rules(): array
    {
        return (new CreateOrderRequest)->rules();
    }

    /**
     * @param  $field
     * @return void
     *
     * @throws ValidationException
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function mount()
    {
        $this->productsInCart = [];
        $this->totalDiscounts = 0;

        $productsInCart = $this->getItemsFromCart();
        foreach ($productsInCart as $productItem) {
            $productId = $productItem->id;
            $product = Product::find($productId);
            $productQuantity = $productItem->quantity;
            $withoutDiscount = $product->getPriceWithDiscount($productQuantity);

            $price = $product->getPriceByCount($productQuantity);
            $this->totalDiscounts += $withoutDiscount ?? $withoutDiscount - $price;
            //            \Log::info("Discount $withoutDiscount Price: $price Total discounts: ".$this->totalDiscounts);
            $this->productsInCart[] = [
                'id' => $productId,
                'sku' => $product->sku,
                'slug' => $product->slug,
                'title' => $product->title,
                'img' => $product->img_web,
                'quantity' => $productQuantity,
                'withoutDiscount' => $withoutDiscount,
                'price' => $price,
                'item' => $productItem,
            ];
        }
        $this->total = $this->getTotalPriceInCartSorbona();

        if (\Auth::check()) {
            $this->name = \Auth::user()->name;
            $this->surname = \Auth::user()->surname ?? '';
            //            $this->father = \Auth::user()->father ?? '';
            $this->phone = \Auth::user()->phone ?? '';
            $this->email = \Auth::user()->email;
        }
        //        $this->regions = GetRegionNovaPochtaAction::run();
        //        $this->selectPayment($this->payment);

        //        if ($this->delivery == 'deliveryMethodNp')
        //         $this->NpCities = GetCityNovaPochtaAction::run();
    }

    /**
     * @param  $option
     * @return void
     */
    public function selectDelivery($option): void
    {
        $this->delivery = $option;
        $this->emit('refreshCartOrderLiveWier');
    }

    /**
     * @param  string  $payment
     * @return void
     */
    public function selectPayment(string $payment): void
    {
        $this->payment = $payment;

        $payment = GetPaymentAction::run($payment);

        $this->paymentDescription = $payment->description ?? '';

        $this->emit('refreshCartOrderLiveWier');
    }

    /**
     * @return void
     */
    public function updatedSelectedRegion(): void
    {
        $this->seeAddress = false;
        $this->selectedCity = '';
        $this->selectedAddress = '';
        $this->emit('refreshCartOrderLiveWier');
    }

    /**
     * @return void
     */
    public function updatedSelectedCity(): void
    {
        $this->selectedAddress = '';
        $this->emit('refreshCartOrderLiveWier');
        $this->seeAddress = true;
    }

    /**
     * @return void
     */
    public function addOrder(): void
    {
        $data = $this->validate();

        $deliveryData = $this->getDeliveryData();

        if (empty($deliveryData)) {
            return;
        }

        $this->createOrder($data, $deliveryData);

        $this->resetData();

        $this->emit('refreshCountItemsInCartLiveWier');
    }

    /**
     * @return void
     */
    protected function resetData(): void
    {
        if (! \Auth::check()) {
            $this->name = '';
            $this->surname = '';
            $this->father = '';
            $this->phone = '';
            $this->email = '';
        }

        $this->selectedRegion = '';
        $this->selectedCity = '';
        $this->selectedAddress = '';
        $this->textOrder = '';
        $this->UkrIndex = '';
        $this->UkrAddress = '';
        $this->MeestIndex = '';
        $this->MeestAddress = '';
        $this->delivery = 'novaPochta';
        $this->payment = 'paymentCard';
        $this->seeAddress = false;

        $this->clearCart();
    }

    /**
     * @return View
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render(): View
    {
        if ($this->selectedRegion) {
            $this->cities = GetCityNovaPochtaAction::run($this->selectedRegion);
        }

        if ($this->selectedCity) {
            $this->address = GetAddressNovaPochtaAction::run($this->selectedCity);
        }

        //        $this->productsInCart = $this->getItemsFromCart();
        //        $this->total = $this->getTotalPriceInCart();

        return view('livewire.front.checkout.checkout-live-wire');
    }
}
