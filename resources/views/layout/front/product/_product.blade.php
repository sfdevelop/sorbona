<div class="product-item">
    @php /** @var \App\Models\Product $product */ @endphp
    <ul class="stickers">
        @if($product->is_bestseller)
            <li class="stickers__yellow">best</li>
        @endif
        @if(!empty($product->old_price))
            <li class="stickers__red">sale</li>
        @endif
        @if(!empty($product->is_new))
            <li class="stickers__green">new</li>
        @endif
    </ul>
    <div class="product-item__img">
        <img class="product-item__img-one" src="{{$product->img_web}}" alt="product-{{$product->title}}">
        <img class="product-item__img-two" src="{{$product->img_web}}" alt="product-{{$product->img_web}}-two">
    </div>
    <div class="product-item__btns">
        <a href="#" class="btn btn--dark">{{__('front.quick_view')}}</a>
        <a href="#" class="btn btn--dark">{{__('front.quick_order')}}</a>
    </div>
    <div class="product-item__inner">
        <h6>{{$product->title}}</h6>
        <p>
            {{ implode(', ', $product->categories->pluck('title')->toArray()) }}
        </p>
        <div class="product-item__box">
            <div class="product-item__price">
                {{$product->now_price}}
            </div>
            @if(!empty($product->old_price))
                <div class="product-item__old-price">
                    {{$product->old_price}}
                </div>
            @endif
        </div>
    </div>
</div>