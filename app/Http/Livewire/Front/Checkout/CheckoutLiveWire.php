<?php

namespace App\Http\Livewire\Front\Checkout;

use App\Actions\Order\GetCityNovaPochtaAction;
use App\Actions\Order\GetDepotNovaPochtaAction;
use App\Actions\Order\GetPaymentAction;
use App\Http\Livewire\Front\Trait\CartTrait;
// use App\Actions\Order\GetRegionNovaPochtaAction;
use App\Http\Livewire\Product\ProductBaseComponent;
use App\Http\Livewire\Traits\CreateOrderTrait;
use App\Http\Livewire\Traits\DeliveryDataFromOrderTrait;
use App\Http\Livewire\Traits\PaymentDataFromOrderTrait;
use App\Http\Requests\Livewier\CreateOrderRequest;
use App\Models\Product;
use App\Services\CartOrder\ProductsInCartService;
use App\Services\CartOrder\RequestProductsFromCart;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use App\Http\Controllers\Traits\CustomCartTrait;

class CheckoutLiveWire extends ProductBaseComponent
{
    use CartTrait;
    use CustomCartTrait;
    use CreateOrderTrait;
    use DeliveryDataFromOrderTrait;
    use PaymentDataFromOrderTrait;

    private array $rulesRegister = [
        'phone' => 'required|string|unique:users,phone',
        'email' => 'required|string|email|unique:users,email',
    ];

    private array $rulesUp = [
        'region' => 'required|string|min:3',
        'locality' => 'required|string|min:3',
        'index' => 'required|string',
    ];

    private $rulesBank = [
        'companyName' => 'required|string|min:3',
        'inn' => 'required|string|min:3',
        'edrpou' => 'required|string',
    ];

    private $rulesNp = [
        'selectedNpCity' => 'required|string',
        'selectedNpDepot' => 'required|string',
    ];

    public string $login = '';

    public string $password = '';

    public array|object $productsInCart;

    public string $totalDiscounts;

//    public string $name = 'Denys';
//
//    public ?string $surname = 'Cherkasov';
//
//    public string $phone = '+380931904412';
//
//    public string $email = 'denis.cherkasov@gmail.com';

    public string $name = '';

    public ?string $surname = '';

    public string $phone = '';

    public string $email = '';

    public string $selectedNpCity = '';

    public string $selectedNpDepot = '';

    public array|object $NpCities;

    public string $selectedRegion = 'All';

    public string $selectedCity = '';

    public string $selectedAddress = '';

    public string $paymentDescription = '';

    public string $textOrder = '';

    public string $UkrIndex = '';

    public bool $register = false;

    public string $UkrAddress = '';

    public array|object $regions;

    public array|object $cities;

    public array|object|null $depots;

    public string $delivery = 'deliveryMethodLocal';

    public string $payment = 'paymentMethodCod';

    public bool $seeAddress = false;

    public string $companyName = '';

    public string $inn = '';

    public string $edrpou = '';

    public string $comment = '';

    public int|float|string $total;

    public string $region = '';

    public string $locality = '';

    public string $index = '';

    public bool $isTryLogin = false;

    protected $listeners = [
        'refreshCartOrderLiveWier' => '$refresh',
        'updatedSelectedNpCity' => 'handleUpdatedSelectedNpCity',
        'updatedSelectedNpDepot' => 'handleUpdatedSelectedNpDepot',
//        'changePhoneNumber' => 'handlePhoneNumber',
    ];

    public function handleUpdatedSelectedNpCity($value)
    {
        $this->selectedNpCity = $value;
        $this->selectedNpDepot = '';
        \Log::info('Np city:  '.$this->selectedNpCity);
    }

    private function determineLoginType(): string
    {
        return filter_var($this->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    }

    public function handleUpdatedSelectedNpDepot($value)
    {
        $this->selectedNpDepot = $value;
        \Log::info('Np depot: '.$this->selectedNpDepot);
    }

    protected function rules(): array
    {
        $request = new CreateOrderRequest;

        return $request->rules();
    }

    public function setSelectedNpDepot($value)
    {
        $this->selectedNpDepot = $value;
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

    /**
     * @throws InvalidAssociatedException
     * @throws BindingResolutionException
     * @throws InvalidModelException
     */
    public function mount(): void
    {
        $this->totalDiscounts = 0;

        $queryProducts = app()
            ->make(RequestProductsFromCart::class)
            ->getProductsFromArrayInCart();

        $this->productsInCart =
            app()
                ->make(ProductsInCartService::class)
                ->getProductsInCart(
                    totalDiscounts: $this->totalDiscounts,
                    queryProducts: $queryProducts,
                );

        $this->total = $this->getTotalPriceInCartSorbona($queryProducts);

        if (\Auth::check()) {
            $this->name = \Auth::user()->name;
            $this->surname = \Auth::user()->surname ?? '';
            $this->phone = \Auth::user()->phone ?? '';
            $this->email = \Auth::user()->email;
        }

        $this->cities = [];
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

        //        $payment = GetPaymentAction::run($payment);

        //        $this->paymentDescription = $payment->description ?? '';

        //        $this->emit('refreshCartOrderLiveWier');
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

    public function updatedPhone($value): void
    {
        $this->phone = $value;
    }

    private function createAndLoginUser() {}

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addOrder()
    {
        if ($this->register) {
            $this->validate($this->rulesRegister);
            $this->createAndLoginUser();
        }

        if ($this->delivery == 'deliveryMethodNp') {
            $this->emit('validateNp', $this->selectedNpCity, $this->selectedNpDepot);
        }

        $data = $this->validate();

        $deliveryData = $this->getDeliveryData();
        $paymentData = $this->getPaymentData();

        if ($this->delivery == 'deliveryMethodUp') {
            $this->validate($this->rulesUp);
        }

        if ($this->payment == 'paymentMethodBank') {
            $this->validate($this->rulesBank);
        }

        //        dd($deliveryData);

        if (empty($deliveryData) || empty($paymentData)) {
            return;
        }

        $order = $this->createOrder($data, $deliveryData);

        $this->resetData();

        return redirect()->route('cart_thx', ['id' => $order->uuid]);
        //        $this->emit('refreshCountItemsInCartLiveWier');
    }

    /**
     * @return void
     */
    protected function resetData(): void
    {
        if (! \Auth::check()) {
            $this->name = '';
            $this->surname = '';
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

    public function clearComment()
    {
        $this->comment = '';
    }

    /**
     * @return View
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render(): View
    {
        $this->cities = [];
        $this->depots = [];

        if ($this->delivery == 'deliveryMethodNp') {
            $this->cities = GetCityNovaPochtaAction::run($this->selectedRegion);
        }

        if ($this->selectedNpCity != '') {
            $this->depots = GetDepotNovaPochtaAction::run($this->selectedNpCity);
        }

        return view('livewire.front.checkout.checkout-live-wire');
    }
}
