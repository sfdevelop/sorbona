<div class="checkout">
    <div class="checkout__head">
        <h1 class="checkout__title">{{ __('checkout.h1') }}</h1>
    </div>
    <div class="checkout__wrap">
        @include('livewire.front.checkout._user-block')
        <div class="checkout__order">
            @include('livewire.front.checkout._cart-block')
        </div>
    </div>
</div>
