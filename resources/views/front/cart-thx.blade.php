@extends('layout.sorbona')
@section('content')

    <section class="section section_lite">
        <div class="section__container--medium section__container_checkout">
            <div class="complete">
                <div class="complete__head">
                    <h2 class="complete-head__title">{{ __('cart.thx-title', ['order_id' => $order->id]) }}</h2>
                </div>
                <div class="complete__wrap">
                    <div class="complete__body">
                        <div class="complete-body__head">
                            <h2 class="complete-body-head__title">{{ __('cart.thx-products-in-order') }}</h2>
                        </div>
                        <div class="complete-body__list">
                            @foreach($order->orderItems as $item)
                            <div class="checkout-order__item">
                                <a href="#" class="checkout-order-item__picture">
                                    <img src="{{ $item->img }}" alt="image" loading="lazy" class="img-full" />
                                </a>
                                <div class="checkout-order-item__body">
                                    <a href="#" class="checkout-order-item__title"
                                    >{{ $item->title }}</a
                                    >
                                    <p class="checkout-order-item__article">{{ __('cart.sku') }} {{ $item->sku }}</p>
                                    <div class="checkout-order-item__bottom">
                                        <p class="checkout-order-item__num">{{ __('cart.count_long') }} <span>{{ $item->qty }}</span></p>
                                        <div class="checkout-order-item__price">{{ Number::currency($item->price_all, in: 'UAH', locale: 'uk') }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="complete__info">
                        <div class="complete-info__item">
                            <h5 class="complete-info__title">{{ __('cart.delivery_text') }}</h5>

                            @php /** @var \App\Models\Order $order */ @endphp
                            <p class="complete-info__text">{{deliveryMethodEnum($order->deliveryTitle)->getLabel()}}</p>

                            <p class="complete-info__text">{{$deliveryAddress}}</p>

                        </div>
                        <div class="complete-info__item">
                            <h5 class="complete-info__title">{{ __('cart.payment_text') }}</h5>

                            <p class="complete-info__text">{{paymentMethodEnum($order->payment)->getLabel()}}</p>

                            @if(paymentMethodEnum($order->payment) === \App\Enum\PaymentMethodEnum::METHOD_CARD)

                                <p class="complete-info__text text_{{$order->statusPay->getTextColor()}}">
                                    {{$order->statusPay->getLabel()}}
                                </p>
                            @endif

{{--                            <p class="complete-info__text">**** **** **** 2345</p>--}}
                        </div>
                        <div class="checkout-order-bottom__total">
                            <p class="checkout-order-bottom__total_text">{{ __('cart.cart_total') }}</p>
                            <p class="checkout-order-bottom__total_price">{{ Number::currency($order->total, in: 'UAH', locale: 'uk') }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="complete__btn btn">{{ __('front.go-to-home') }}</a>
            </div>
        </div>
    </section>
@endsection
