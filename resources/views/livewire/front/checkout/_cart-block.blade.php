<div>
    <div class="checkout-order__head">
        <h3 class="checkout-order-head__title">{{ __('checkout.products_in_order') }}</h3>
        <button onclick="location.href='{{ route('cart') }}';"
                class="checkout-order-head__edit">{{ __('checkout.edit') }}</button>
    </div>

    <div class="checkout-order__list">
        @foreach($productsInCart as $product)
            <div class="checkout-order__item">
                <a href="{{ route('product', $product['slug']) }}" class="checkout-order-item__picture">
                    <img src="{{ $product['img'] }}" alt="image" loading="lazy" class="img-full">
                </a>
                <div class="checkout-order-item__body">
                    <a href="{{ route('product', $product['slug']) }}"
                       class="checkout-order-item__title">{{ $product['title'] }}</a>
                    <p class="checkout-order-item__article">{{ __('front.sku') }} {{ $product['sku'] }}</p>
                    <div class="checkout-order-item__bottom">
                        <p class="checkout-order-item__num">{{ __('checkout.count_long') }}:
                            <span>{{ $product['quantity'] }}</span></p>
                        <div
                            class="checkout-order-item__price">{{ Number::currency(number: $product['price'] * $product['quantity'], in: 'UAH', locale: 'uk') }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="checkout-order__bottom">
        <div class="checkout-order-bottom__total">
            <p class="checkout-order-bottom__total_text">{{ __('checkout.total') }}</p>
            <p class="checkout-order-bottom__total_price">{{ Number::currency(number: $total, in: 'UAH', locale: 'uk') }}</p>
        </div>
        <div class="checkout-order__buttons">
            <button form="checkout_form" type="submit"
                    wire:click.prevent="addOrder"
                    class="checkout-order__btn btn">{{ __('checkout.order_completed') }}</button>
        </div>
        @guest
            <div class="checkout-order-bottom__chbox chbox">
                <label class="chbox__label">
                    <input type="checkbox" wire:model.lazy="register" name="register" class="chbox__input" value="">
                    <span class="chbox__icon"></span>
                    <span class="chbox__text">{{ __('checkout.register_on_site') }}</span>
                </label>
            </div>
        @endguest
        <p class="checkout-order-bottom__true">
            {!!  __('checkout.agree', ['policy_route' => route('policy')]) !!}
        </p>
    </div>
</div>
