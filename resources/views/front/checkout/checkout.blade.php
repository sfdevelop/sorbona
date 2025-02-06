@extends('layout.sorbona')
@section('content')
    <section class="section section_lite">
        <div class="section__container--medium section__container_checkout">
            <div class="checkout">
                <div class="checkout__head">
                    <h1 class="checkout__title">{{ __('checkout.h1') }}</h1>
                </div>
                <div class="checkout__wrap">
                    @livewire('front.checkout.user-live-wire')
                    <div class="checkout__order">
                        @livewire('front.checkout.cart-live-wire')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
