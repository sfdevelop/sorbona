<div class="product-item {{($swiper ?? false) ? 'swiper-slide' : ''}} ">

    @php /** @var \App\Models\Product $product */ @endphp
    <a href="{{route('product', $product->slug)}}" class="product-item__image">
        @if($product->is_new)
            <div class="product-item__label">NEW</div>
        @endif
        <img src="{{$product->img_jpg}}" alt="image-product-{{$product->title}}" loading="lazy" class="img-full"/>
    </a>

    <div class="product-item__body">
        @livewire('front.product.product-in-category-live-wire', ['product' => $product])
    </div>
</div>
