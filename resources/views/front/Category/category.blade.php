@extends('layout.bureviy')
@section('content')

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner element-animation">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><a href="{{route('catalog')}}">{{__('front.menu.catalog')}}</a></li>
                    <li><span>{{$category->title}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="filter">
        <div class="container">
            <h3 class="title element-animation">
                {{$category->title}}
            </h3>
            <div class="filter__inner">
                @include('front.CategoryTest._filters')


                <div class="filter__right">
                    <button class="filter__btn element-animation">
                        <span><img src="{{asset('front/images/dest/icons/filter.svg')}}"
                                   alt="icon"></span> {{__('front.filters_name')}}
                    </button>
                    <div class="filter__right-inner">

                        @foreach($products as $product)
                            @include('partials.front._product')
                        @endforeach
                    </div>

                    {{ $products->onEachSide(2)->appends($_GET)->links('pagination::bureviy') }}

                </div>
            </div>

        </div>
    </section>

@endsection

@push('css_front')
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}?v={{ filemtime(public_path('front/css/custom.css'))}}">
@endpush