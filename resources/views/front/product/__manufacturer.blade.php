<div class="product-item__top">
    @php /** @var \App\Models\Product $product */ @endphp
    <div class="product-item__top-logo">
        <img src="{{$product->manufacturer->img_jpg}}" alt="image-manufacturer" loading="lazy" class="img-full" />
    </div>
    @if($product->in_stock)
    <div class="product-item__top-status in-stock"><span>{{__('front.in_stock')}}</span></div>
    @endif
</div>