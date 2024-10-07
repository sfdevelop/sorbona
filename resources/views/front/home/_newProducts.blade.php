<section class="box-slider box-slider--twoo">
    <div class="container">
        <h3 class="title">
            {{__('front.new_products')}}
        </h3>
        <div class="product-slider">
            <div class="swiper-wrapper">
                @foreach($newProducts as $newProduct)
                    @php /** @var \App\Models\Product $newProduct */ @endphp
                    <div class="swiper-slide product-item">
                        @include('layout.front.product._product', ['product' => $newProduct])
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