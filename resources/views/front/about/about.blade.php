@extends('layout.bureviy')
@section('content')

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner element-animation">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__('front.menu.about')}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    @include('front.about._intro')
    @include('front.about._values')
    @include('front.about._offer')
    @include('front.about._why_wee')
    @include('front.about._inner')

@endsection