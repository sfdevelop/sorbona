<div class="product-item {{($swiper ?? false) ? 'swiper-slide' : ''}} ">

    @php /** @var \App\Models\Product $product */ @endphp
    <a href="{{route('product', $product->slug)}}" class="product-item__image">
        @if($product->is_new)
            <div class="product-item__label">NEW</div>
        @endif
        <img src="{{$product->img_jpg}}" alt="image-product-{{$product->title}}" loading="lazy" class="img-full"/>
    </a>

    <div class="product-item__body">
        <div class="product-item__head">
            <a href="{{route('product', $product->slug)}}" class="product-item__title">{{$product->title}}</a>
            <p class="product-item__subtitle">{{$product->manufacturer->title}}</p>
        </div>
        <div class="product-item__prices">
            <div class="product-item__prices_left">
                <div class="price"><span>{{Number::currency(number: $product->now_price,in: 'UAH', locale: 'uk') }}</span></div>
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
                <button class="product-item__quantity_minus">
                    <svg>
                        <use xlink:href="{{asset('front/img/icons/icons.svg#icon-minus')}}"></use>
                    </svg>
                </button>
                <span id="add_num" class="product-item__quantity_num">1</span>
                <button class="product-item__quantity_plus">
                    <svg>
                        <use xlink:href="{{asset('front/img/icons/icons.svg#icon-plus')}}"></use>
                    </svg>
                </button>
            </div>
            <button class="product-item__tobasket btn">{{__('front.to_cart')}}</button>
        </div>
    </div>
</div>
