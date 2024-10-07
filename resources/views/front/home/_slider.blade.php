<section class="intro">
    <div class="intro__slider">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                @php /** @var \App\Models\Slider $slider */ @endphp
                <div class="swiper-slide" style="background-image: url({{$slider->img_web}});">
                    <div class="container">
                        <h1>{{$slider->title}}</h1>
                        <p>
                            {{$slider->description}}
                        </p>
                        @if(!empty($slider->url))
                            <a href="{{$slider->url}}" class="btn">
                                {{__('front.view_more')}}
                            </a>
                        @endif
                    </div>
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
</section>