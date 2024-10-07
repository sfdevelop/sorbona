@extends('layout.bureviy')
@section('content')
    @php /** @var \App\Models\Setting $setting */ @endphp
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner element-animation">
                <ul class="breadcrumbs__list">
                    <li><a href="#">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__('front.menu.contacts')}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="contacts">
        <div class="container">
            <h3 class="title element-animation">
                {{__('front.menu.contacts')}}
            </h3>
            <ul class="contacts__list">
                <li class="element-animation">
                    <img src="{{asset('front/images/dest/icons/phone.svg')}}" alt="icon">
                    <div class="contacts__list-info">
                        <h6>
                            {{__('front.phone')}}
                        </h6>
                        <ul>
                            <li>
                                <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
                            </li>
                            <li>
                                <a href="tel:{{$setting->phone2}}">{{$setting->phone2}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="element-animation">
                    <img src="{{asset('front/images/ico/location.svg')}}" alt="location">
                    <div class="contacts__list-info">
                        <h6>
                            {{__('front.address')}}
                        </h6>
                        <ul>
                            <li>
                                {{$setting->address}}
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="element-animation">
                    <img src="{{asset('front/images/ico/mail.svg')}}" alt="mail">
                    <div class="contacts__list-info">
                        <h6>
                            E-mail
                        </h6>
                        <ul>
                            <li>
                                <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="element-animation">
                    <img src="{{asset('front/images/ico/clock.svg')}}" alt="clock">
                    <div class="contacts__list-info">
                        <h6>
                            {{__('front.work_schedule')}}
                        </h6>
                        <ul>
                            <li>
                                {{$setting->work}}
                            </li>
                            <li>
                                {{$setting->weekend}}
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="contacts__inner">
                <div class="contacts__left element-animation">
                    <strong>
                        {!! __('front.have_questions') !!}
                    </strong>
                    <p>
                        {{$setting->text}}
                    </p>
                    <span>
                {{__('front.social_media')}}
              </span>

                    <ul class="social social_sf">
                        <li>
                            <a href="{{$setting->instagram}}">
{{--                                <img src="{{asset('front/images/dest/icons/inst2.svg')}}" alt="icon">--}}
                                <i class="demo-icon icon-insta"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->linkedin}}">
{{--                                <img src="{{asset('front/images/dest/icons/tiktok2.svg')}}" alt="icon">--}}
                                <i class="demo-icon icon-tiktok"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->facebook}}">
{{--                                <img src="{{asset('front/images/dest/icons/fb2.svg')}}" alt="icon">--}}
                                <i class="demo-icon icon-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="contacts__right element-animation">
                    @livewire('front.contacts.feed-back-live-wier')
                </div>
            </div>
        </div>
    </section>

@endsection

@push('css_front')
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}?v={{ filemtime(public_path('front/css/custom.css'))}}">
@endpush