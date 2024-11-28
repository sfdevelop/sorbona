<div class="product-item__prices"
        @php /** @var \App\Models\Product $product */ @endphp>
    <div class="product-item__prices_left">
        <div class="price">
            <span>{{Number::currency(number: $product->now_price, in: 'UAH', locale: 'uk')}}</span>
            @if($product->sale>0)
                <div class="label">-{{$product->sale}}% *</div>
            @endif
        </div>
        @if($product->sale>0)
            <div class="price__sale">{{Number::currency(number: $product->price, in: 'UAH', locale: 'uk')}}</div>
        @endif
    </div>
    <div class="product-item__prices_right">
        <div class="price__number">
            <span>{{Number::currency(number: $product->price_from_ten, in: 'UAH', locale: 'uk')}}</span> {{__('front.in')}}
            {{$product->qtyMilkoopt}} шт
        </div>
        <div class="price__number">
            <span>{{Number::currency(number: $product->price_from_twenty, in: 'UAH', locale: 'uk')}}</span> {{__('front.in')}} {{$product->qtyOpt}}
            шт
        </div>
    </div>
</div>
<p class="price__info">{{__('front.text_guest')}}</p>