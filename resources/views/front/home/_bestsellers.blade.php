<section class="box-slider">
    <div class="container">
        <h3 class="title">
            Our Bestsellers
        </h3>
        <div class="product-slider">
            <div class="swiper-wrapper">

                @foreach($bestsellers as $bestseller)
                    @php /** @var \App\Models\Product $bestseller */ @endphp
                    <div class="swiper-slide product-item">
                        @include('layout.front.product._product', ['product' => $bestseller])
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next">
                <img src="{{asset('front/images/icons/arrow-down.svg')}}" alt="arrow">
            </div>
            <div class="swiper-button-prev">
                <img src="{{asset('front/images/icons/arrow-down.svg')}}" alt="arrow">
            </div>
        </div>
    </div>
</section>