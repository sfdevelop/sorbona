@extends('layout.sorbona')
@section('content')
    @php /** @var \App\Models\Setting $settings */ @endphp

    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__head">
                <h1 class="section-head__title">{{__('front.menu.contacts')}}</h1>
            </div>
            <div class="contact">
                <div class="contact__wrap">
                    <div class="contact__body">
                        <h3 class="contact-body__title">{{__('front.office')}}</h3>
                        <div class="contact-body__item">
                            <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-pin')}}"></use></svg>
                            <span>{{$settings->address}}</span>
                        </div>
                    </div>
                    <div class="contact__body">
                        <h3 class="contact-body__title">{{__('front.menu.contacts')}}</h3>
                        <div class="contact-body__line">
                            <h4 style="text-transform: uppercase" class="contact-body__subtitle">{{__('front.phone')}}</h4>
                            <a href="tel:{{$settings->phone}}" class="contact-body__item">
                                <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-phone')}}"></use></svg>
                                <span><b>{{$settings->phone}}</b></span>
                            </a>
                            <a href="tel:{{$settings->phone2}}" class="contact-body__item">
                                <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-phone')}}"></use></svg>
                                <span><b>{{$settings->phone2}}</b></span>
                            </a>
                        </div>
                        <div class="contact-body__line">
                            <h4 class="contact-body__subtitle">E-MAIL</h4>
                            <a href="mailto:{{$settings->email}}" class="contact-body__item">
                                <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-email')}}"></use></svg>
                                <span>{{$settings->email}}</span>
                            </a>
                        </div>
                        <div class="contact-body__line">
                            <h4 class="contact-body__subtitle">{{__('front.website')}}</h4>
                            <a href="{{$settings->website}}" class="contact-body__item">
                                <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-web')}}"></use></svg>
                                <span>{{$settings->website}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="contact__map">
                 {!! $settings->map !!}
{{--                    <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-big-pin')}}"></use></svg>--}}
                </div>
            </div>
        </div>
    </section>
@endsection