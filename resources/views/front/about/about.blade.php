@extends('layout.sorbona')
@section('content')
    @php /** @var \App\Models\Page $about */ @endphp
    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__head">
                <h1 class="section__title">{{$about->title}}</h1>
            </div>
            <div class="about">
                <div class="about__top">
                    <div class="about__info">
                        {{$about->descriptionShort}}
                    </div>
                    <div class="about__text">
                        {!! $about->description !!}
                    </div>
                </div>

                <h2 class="about__title">{{__('front.our_privecy')}}</h2>

                <div class="about__advantages">

                    @foreach($benefits as $benefit)
                        @php
                            /** @var \App\Models\Benefit $benefit */
                        @endphp
                        <div class="about-advantages__item">
                            <img style="max-width: 50px" src="{{$benefit->img_web}}" alt="">
                            <p><b>{{$benefit->title}}</b></p>
                        </div>
                    @endforeach

                </div>
                <div class="about__item">
                    <div class="about-item__head">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-advantages-fame')}}"></use>
                        </svg>
                        <h3>{{__('front.notoriety')}}</h3>
                    </div>
                    <div class="about-item__text">
                        {!! $about->notoriety !!}
                    </div>
                </div>
                <div class="about__item">
                    <div class="about-item__head">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-advantages-assortment')}}"></use>
                        </svg>
                        <h3>{{__('front.assortment')}}</h3>
                    </div>
                    <div class="about-item__text">
                        {!! $about->assortment !!}
                    </div>
                </div>
                <div class="about__item">
                    <div class="about-item__head">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-advantages-manufacturers')}}"></use>
                        </svg>
                        <h3>{{__('front.cooperation')}}</h3>
                    </div>
                    <div class="about-item__text">
                        {!! $about->cooperate !!}
                    </div>
                </div>
                <div class="about__item">
                    <div class="about-item__head">
                        <svg>
                            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-advantages-convenience')}}"></use>
                        </svg>
                        <h3>{{__('front.comfort')}}</h3>
                    </div>
                    <div class="about-item__text">
                        {!! $about->comfort !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="section" data-manufacturers>
            <div class="section__container--medium section__container_pb">
                <div class="section__head">
                    <h2 class="section__head_title">{{__('front.our_manufacturers')}}</h2>
                    <div class="slider__nav">
                        <div class="slider-nav__arrow slider-nav__arrow_prev">
                            <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-slider-arrow-prev')}}"></use></svg>
                        </div>
                        <div class="slider-nav__arrow slider-nav__arrow_next">
                            <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-slider-arrow-next')}}"></use></svg>
                        </div>
                    </div>
                </div>
                <div class="manufacturers__slider swiper">
                    <div class="swiper-wrapper">

                        @foreach($aboutManufacturers as $manufacturer)
                            @php /** @var \App\Models\Manufacturer $manufacturer */ @endphp
                            <a href="{{route('manufacturerItem', $manufacturer->slug)}}" class="manufacturers__item swiper-slide">
                                <div class="manufacturers-item__logo">
                                    <img src="{{$manufacturer->img_web}}" alt="image" loading="lazy" class="img-full" />
                                </div>
                                <h5 style="text-align: center" class="manufacturers-item__title">{{$manufacturer->title}}</h5>
                            </a>
                        @endforeach

                    </div>
                </div>
                <a href="{{route('manufacturers')}}" class="manufacturers__more btn">{{__('front.see_all')}}</a>
            </div>
        </section>

@endsection