<div>
<div class="product-item__head">
    <a href="{{route('product', $product->slug)}}" class="product-item__title">{{$product->title}}</a>
    <p class="product-item__subtitle">{{$product->manufacturer->title}}</p>
</div>
<div class="product-item__prices">
    <div class="product-item__prices_left">
        <div class="price"><span>{{ $priceProduct }}</span></div>
    </div>
    <div class="product-item__prices_right">
        @unlessrole('smallopt|bigopt')
        <div class="price__number"><span>{{Number::currency(number: $product->price_from_ten,in: 'UAH', locale: 'uk') }}</span> от {{$product->qtyMilkoopt}} шт</div>
        @endunlessrole
        @unlessrole('bigopt')
        <div class="price__number"><span>{{Number::currency(number: $product->price_from_twenty,in: 'UAH', locale: 'uk') }}</span> от {{$product->qtyOpt}} шт</div>
        @endunlessrole
    </div>
</div>
<div class="product-item__bottom">
    <div class="product-item__quantity">
        <button class="product-item__quantity_minus" wire:click.prevent="minusQty">
            <svg>
                <use xlink:href="{{asset('front/img/icons/icons.svg#icon-minus')}}"></use>
            </svg>
        </button>
        <span id="add_num" class="product-item__quantity_num">{{ $productQty }}</span>
        <button class="product-item__quantity_plus" wire:click.prevent="plusQty">
            <svg>
                <use xlink:href="{{asset('front/img/icons/icons.svg#icon-plus')}}"></use>
            </svg>
        </button>
    </div>
    <button wire:click.prevent="addToCart" class="product-item__tobasket btn">{{__('front.to_cart')}}</button>
</div>
</div>
