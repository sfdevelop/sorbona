<div class="section__container--medium section__container_fullmob">
    <div class="section__breadcrumbs">
        <a href="{{ url()->previous() }}" class="section-breadcrumbs__back">
            <svg>
                <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-slider-arrow-prev') }}"></use>
            </svg>
            <span>{{ __('cart.go_back') }}</span>
        </a>
        @if ($productsInCart)
        <button wire:click.prevent="clearCart()" class="section-breadcrumbs__clean">{{ __('cart.clear_basket') }}</button>
        @endif
    </div>

    <div class="cart">
        <h1 class="cart__title">{{ __('front.cart') }}</h1>
        @if ($productsInCart)
        <div class="cart__wrap">
            <div class="cart__list">
                @foreach($productsInCart as $product)
                    <div class="cart__item">
                        <a
                            wire:click.prevent="deleteItemOnCart({{$product['id']}})"
                            href="#" class="cart-item__delete">
                            <svg>
                                <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-close')}}"></use>
                            </svg>
                        </a>
                        <div class="cart-item__info">
                            <a href="{{ route('product', $product['slug']) }}" class="cart-item-info__picture">
                                <img src="{{ $product['img'] }}" alt="image" loading="lazy" class="img-full">
                            </a>
                            <div class="cart-item-info__body">
                                <a href="{{ route('product', $product['slug']) }}"
                                   class="cart-item-info__title">{{ $product['title'] }}</a>
                                <p class="cart-item-info__article">{{ __('front.sku') }} {{ $product['sku'] }}</p>
                                <div class="cart-item-info__price">
                                    <p>{{ Number::currency(number: $product['price'], in: 'UAH', locale: 'uk') }}</p>
                                    @if ($product['withoutDiscount'])
                                        <span>{{ Number::currency(number: $product['withoutDiscount'], in: 'UAH', locale: 'uk') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="cart-item__order">
                            <div class="product-item__quantity">
                                <button
                                    @disabled($product['quantity'] == 1)
                                    wire:click.prevent="cartProductMinus({{ $product['item'] }})"
                                    class="product-item__quantity_minus">
                                    <svg>
                                        <use xlink:href="{{  asset('front/img/icons/icons.svg#icon-minus') }}"></use>
                                    </svg>
                                </button>
                                <span id="add_num" class="product-item__quantity_num">{{ $product['quantity'] }}</span>
                                <button
                                    wire:click.prevent="cartProductPlus({{ $product['item'] }})"
                                    class="product-item__quantity_plus">
                                    <svg>
                                        <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-plus')}}"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="price">
                                <span>{{ Number::currency(number: $product['price'] * $product['quantity'], in: 'UAH', locale: 'uk') }}</span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            @if ($productsInCart)
            <div class="cart__order">
                <div class="cart-order__line">
                    <p class="cart-order__text">{{ __('cart.cart_total') }}</p>
                    <div class="cart-order__sum">
                        @if ($totalDiscounts > 0)
                            <span>{{ Number::currency(number: $totalDiscounts + $total, in: 'UAH', locale: 'uk') }}</span>
                        @endif
                        <p>{{ Number::currency(number: $total, in: 'UAH', locale: 'uk') }}</p>
                    </div>
                </div>
                <div class="cart-order__line">
                    <p class="cart-order__text">{{ __('cart.cart_total_price') }}</p>
                    <div class="cart-order__sum">
                        <p>{{ Number::currency(number: $total, in: 'UAH', locale: 'uk') }}</p>
                    </div>
                </div>
                <div class="cart-order__buttons">
                    <a href="#" class="cart-order__btn btn">{{ __('cart.checkout') }}</a>
                    <a href="{{ url()->previous() }}"
                       class="cart-order__btn btn btn--invis">{{ __('cart.continue_to_buy') }}</a>
                </div>
            </div>
            @endif
        </div>
        @else
            <p class="catalog__subtitle">{{ __('front.cart_empty') }}</p>
        @endif
    </div>
</div>
