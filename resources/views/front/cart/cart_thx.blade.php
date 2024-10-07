@extends('layout.bureviy')
@section('content')

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner element-animation">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__('front.cart_thx')}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="cart">
        <div class="container">
            <h3 class="title element-animation">
                {{__('front.cart_thx')}}
            </h3>
            <div class="cart__inner cart__custom element-animation">

                <p>
                    {!! __('front.thx_text') !!}
                </p>
                <a href="{{route('home')}}" class="btn btn--transparent2">
                    {{__('front.menu.home')}}
                </a>

            </div>
        </div>
    </section>

@endsection

@push('css_front')
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
@endpush