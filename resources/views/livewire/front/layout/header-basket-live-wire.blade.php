<div>
    <div class="header__basket" data-href="/cart.html">
        <div class="header__basket_icon">
            <svg>
                <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-basket') }}"></use>
            </svg>
            <span class="header__basket_label">{{ $countInCart }}</span>
        </div>
        <span>{{ __('front.cart') }}</span>
    </div>
    @if ($showAddToCart)
    <div class="mini-cart" style="display:block;position:fixed;top:20px;right:20px">
        <div class="mini-cart__wrapper">
            <div class="mini-cart__close" onclick="removeCartDiv()">
                <svg>
                    <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-close') }}"></use>
                </svg>
            </div>
            <div class="mini-cart__head">
                <h3 class="mini-cart-head__title">{{ __('cart.product_added_to_cart') }}</h3>
<!--                <p class="mini-cart-head__pos">1 из 1 позиций</p> -->
            </div>
            <div class="mini-cart__list">
                <div class="mini-cart__item">
                    <div class="mini-cart-item__col">
                        <a href="{{route('product', $slug)}}" class="mini-cart-item__img">
                            <img src="{{ $img }}" alt="image" loading="lazy" class="img-full">
                        </a>
                        <div class="mini-cart-item__body">
                            <a href="{{route('product', $slug)}}" class="mini-cart-item__title">
                                {{ $title }}</a>
                            <p class="mini-cart-item__num">{{ __('cart.count_short') }}: <span>{{ $productQty }}</span></p>
                        </div>
                    </div>
                    <div class="mini-cart-item__price">{{ $priceWithCount }}</div>
                </div>
            </div>
            <div class="mini-cart__bottom">
                <div class="mini-cart-bottom__total">
                    <p class="mini-cart-bottom__total_text">{{ __('cart.total_price_in_cart') }}</p>
                    <p class="mini-cart-bottom__total_price">{{ Number::currency(number: $total, in: 'UAH', locale: 'uk') }}</p>
                </div>
                <div class="mini-cart-bottom__buttons">
                    <a href="#" onclick="return removeCartDiv();" class="mini-cart-bottom__btn btn btn--line">{{ __('cart.continue_to_buy') }}</a>
                    <a href="cart.html" class="mini-cart-bottom__btn btn">{{ __('cart.goto_cart') }}</a>
                </div>
            </div>
        </div>
    </div>
        <div class="layout"></div>
    @endif
</div>
