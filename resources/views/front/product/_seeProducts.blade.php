@if(session('recently_viewed'))
    <section class="section" data-products>
        <div class="section__container--medium section__container_pb">
            <div class="section__head">
                <h2 class="section__head_title">{{__('front.your_see')}}</h2>
                <div class="slider__nav">
                    <div class="slider-nav__arrow slider-nav__arrow_prev">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-slider-arrow-prev')}}"></use>
                        </svg>
                    </div>
                    <div class="slider-nav__arrow slider-nav__arrow_next">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-slider-arrow-next')}}"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="product__slider swiper">
                <div class="swiper-wrapper">
                    @foreach($seeProducts as $itemSeeProduct)
                        @include('layout.front.product._product', ['product' => $itemSeeProduct, 'swiper'=>true])
                    @endforeach
                </div>
                <div class="slider__pagination"></div>
            </div>
        </div>
    </section>
@endif