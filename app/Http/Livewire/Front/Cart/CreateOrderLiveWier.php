<?php

namespace App\Http\Livewire\Front\Cart;

use App\Http\Livewire\Traits\CartTrait;
use App\Http\Livewire\Traits\CreateOrderTrait;
use App\Http\Livewire\Traits\DeliveryDataFromOrderTrait;
use App\Http\Requests\Livewier\CreateOrderRequest;
use App\Models\StatesNovaPochta;
use Illuminate\Validation\ValidationException;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Livewire\Component;

class CreateOrderLiveWier extends Component
{
    use CartTrait;
    use CreateOrderTrait;
    use DeliveryDataFromOrderTrait;

    public string $name = '';

    public string $phone = '';

    public string $email = '';

    public string $payment = 'LiqPay';

    public string $deliverySelect = 'novaPochtaState';

    public object|array $regions = [];

    public string $selectedRegion = '';

    public object|array $cities = [];

    public string $selectedCity = '';

    public object|array $sectionPochta = [];

    public string $selectedPochta = '';

    public string $comment = '';

    public string $total = '';

    protected $listeners = [
        'refreshCreateOrderLiveWier' => '$refresh',
        'selectRegion' => 'selectRegion',
        'selectCity' => 'selectCity',
        'selectSectionPochta' => 'selectSectionPochta',
        'createOrder' => 'createOrderFromCreateOrder',
    ];

    protected function rules(): array
    {
        return (new CreateOrderRequest)->rules();
    }

    /**
     * @return void
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function mount(): void
    {
        $this->redirectOnEmptyCart();
        $this->regions = StatesNovaPochta::distinct()->orderBy('region')->pluck('region');
        $this->getAuthUser();
    }

    /**
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function redirectOnEmptyCart()
    {
        if ($this->getQtySum() < 1) {
            return redirect()->to(route('no_product_cart'));
        }
    }

    public function getAuthUser(): void
    {
        if (\Auth::check()) {
            $this->name = \Auth::user()->name ?? '';
            $this->phone = \Auth::user()->phone ?? '';
            $this->email = \Auth::user()->email ?? '';
        }
    }

    public function selectRegion(string $region): void
    {
        $this->selectedRegion = $region;
        $this->cities = [];
        $this->sectionPochta = [];
        $this->selectedCity = '';
        $this->emit('refreshCreateOrderLiveWier');
    }

    public function selectCity(string $city): void
    {
        $this->selectedCity = $city;
        $this->sectionPochta = [];
        $this->emit('refreshCreateOrderLiveWier');
    }

    public function selectSectionPochta(string $selectSectionPochta): void
    {
        $this->selectedPochta = $selectSectionPochta;
        $this->emit('refreshCreateOrderLiveWier');
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

    public function createOrderFromCreateOrder()
    {
        $data = $this->validate();

        $deliveryData = $this->getDeliveryData();

        if (empty($deliveryData)) {
            return;
        }

        $newOrder = $this->createOrder($data, $deliveryData);

        $this->clearCart();

        /**
         * Оплата
         */
        $redirectLink = \PaymentFacade::payment($this->payment, $newOrder);

        if ($redirectLink) {
            return redirect()->to($redirectLink);
        }

        $this->emit('refreshCartInFrontLiveWier');
        $this->emit('refreshCreateOrderLiveWier');

        return redirect()->to(route('cart_thx'));
    }

    /**
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render()
    {
        $this->cities = StatesNovaPochta::query()
            ->distinct()
            ->where('region', '!=', '')
            ->where('region', $this->selectedRegion)
            ->orderBy('city')
            ->pluck('city') ?? [];

        $this->sectionPochta = StatesNovaPochta::query()
            ->distinct()
            ->where('city', $this->selectedCity)
            ->orderBy('address')
            ->pluck('address') ?? [];

        $this->total = $this->getTotalPriceInCart();

        return view('livewire.front.cart.create-order-live-wier');
    }
}
