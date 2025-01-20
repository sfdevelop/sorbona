<div>
@include('front.product._price', [''])

<div class="product-item__bottom">
    <div class="product-item__quantity">
        <button
            @disabled($productQty == 1)
            wire:click.prevent="minusQty"
            class="product-item__quantity_minus">
            <svg>
                <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-minus') }}"></use>
            </svg>
        </button>
        <span id="add_num" class="product-item__quantity_num">{{ $productQty }}</span>
        <button
            wire:click.prevent="plusQty"
            class="product-item__quantity_plus">
            <svg>
                <use xlink:href="{{ asset('front/img/icons/icons.svg#icon-plus') }}"></use>
            </svg>
        </button>
    </div>
    <button class="product-item__tobasket btn">{{ __('cart.add_to_cart') }}</button>
    <button class="product-item__buy btn btn--line">{{ __('cart.buy_one_click') }}</button>
</div>
</div>
