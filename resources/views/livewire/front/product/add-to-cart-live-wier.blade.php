<div class="product__right">
    <h6>
        {{$product->title}}
    </h6>
    <div class="product__pass">
        <span>SKU</span>
        <strong>{{$product->sku}}</strong>
    </div>
    <div class="product__price">
        <strong>{{$priceProduct}}</strong>

        @if($product->newPrice)
            <span>{{$product->old_price}}</span>
        @endif
    </div>
    <p>
        {{shortDescription($product->description)}}
    </p>

    @include('front.product._attributes')

    <div class="product__calc">

        <button
                @disabled($productQty == 1)
                class="product__minus"
                wire:click.prevent="minusQty"
        >
            <img src="{{asset('front/images/dest/icons/minus.svg')}}" alt="minus">
        </button>

        <input type="text" value="{{$productQty}}" readonly>

        <button
                class="product__plus"
                wire:click.prevent="plusQty"
        >
            <img src="{{asset('front/images/dest/icons/plus.svg')}}" alt="plus">
        </button>
    </div>
    <div class="product__add">
        <button class="product__basket" wire:click.prevent="addToCart">
            <img src="{{asset('front/images/dest/icons/basket.svg')}}" alt="basket">
            {{__('front.add_to_cart')}}
        </button>

        <button class="product__like" wire:click.prevent="toggleProductToWishList">
            @if(!$toAdd)
                <svg width="20.000000" height="17.793579" viewBox="0 0 20 17.7936" fill="none"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs/>
                    <path id="Vector"
                          d="M10 17.79C9.71 17.79 9.44 17.69 9.22 17.5C8.41 16.79 7.63 16.13 6.95 15.54L6.94 15.54C4.93 13.82 3.19 12.34 1.98 10.88C0.63 9.25 0 7.7 0 6.01C0 4.36 0.56 2.85 1.58 1.74C2.62 0.61 4.04 0 5.58 0C6.74 0 7.79 0.36 8.72 1.08C9.19 1.44 9.62 1.89 10 2.41C10.37 1.89 10.8 1.44 11.27 1.08C12.2 0.36 13.25 0 14.41 0C15.95 0 17.37 0.61 18.41 1.74C19.43 2.85 20 4.36 20 6.01C20 7.7 19.36 9.25 18.01 10.88C16.8 12.34 15.06 13.82 13.05 15.54C12.36 16.13 11.58 16.79 10.77 17.5C10.55 17.69 10.28 17.79 10 17.79ZM5.58 1.17C4.37 1.17 3.25 1.65 2.44 2.53C1.62 3.42 1.17 4.66 1.17 6.01C1.17 7.43 1.7 8.7 2.88 10.13C4.03 11.51 5.73 12.97 7.7 14.65L7.71 14.65C8.4 15.24 9.18 15.9 9.99 16.62C10.81 15.9 11.6 15.24 12.29 14.65C14.26 12.97 15.96 11.51 17.11 10.13C18.29 8.7 18.82 7.43 18.82 6.01C18.82 4.66 18.37 3.42 17.55 2.53C16.74 1.65 15.62 1.17 14.41 1.17C13.52 1.17 12.7 1.45 11.98 2.01C11.34 2.5 10.89 3.13 10.63 3.57C10.5 3.8 10.26 3.93 10 3.93C9.73 3.93 9.49 3.8 9.36 3.57C9.1 3.13 8.65 2.5 8.01 2.01C7.29 1.45 6.47 1.17 5.58 1.17Z"
                          fill="#1a1a1a80" fill-opacity="1.000000" fill-rule="nonzero"/>
                </svg>

            @else
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6875 0.171875C13.6022 0.171875 12.6072 0.515781 11.7302 1.19406C10.8894 1.84434 10.3296 2.67258 10 3.27484C9.67043 2.67254 9.11063 1.84434 8.2698 1.19406C7.39277 0.515781 6.39777 0.171875 5.3125 0.171875C2.28391 0.171875 0 2.6491 0 5.93414C0 9.48312 2.84934 11.9113 7.16285 15.5872C7.89535 16.2114 8.72563 16.919 9.58859 17.6737C9.70234 17.7733 9.84844 17.8281 10 17.8281C10.1516 17.8281 10.2977 17.7733 10.4114 17.6737C11.2745 16.9189 12.1047 16.2114 12.8376 15.5868C17.1507 11.9113 20 9.48312 20 5.93414C20 2.6491 17.7161 0.171875 14.6875 0.171875Z" fill="black"/>
                </svg>
            @endif
        </button>
    </div>
</div>