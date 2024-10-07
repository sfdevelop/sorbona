<div class="product__left element-animation">
    <div class="product__slider">
        <div class="swiper-wrapper">
            @foreach($allManyPhotos as $key=>$photo)
                <div class="swiper-slide">
                    <img src="{{$photo->getUrl('thumb-p')}}" alt="photo-{{$product->title}}-{{$key}}"/>
                </div>
            @endforeach
        </div>
    </div>
    <div thumbsSlider="" class="product__slider-side">
        <div class="swiper-wrapper">
            @foreach($allManyPhotos as $key2=> $photo2)
                <div class="swiper-slide">
                    <img src="{{$photo2->getUrl('thumb-p')}}"
                         alt="photo-{{$product->title}}-prew-{{$key2}}"/>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next">
            <img src="{{asset('front/images/dest/icons/arrow-slider2.svg')}}" alt="arrow">
        </div>
        <div class="swiper-button-prev">
            <img src="{{asset('front/images/dest/icons/arrow-slider2.svg')}}" alt="arrow">
        </div>
    </div>
</div>