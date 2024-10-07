@extends('layout.okplius')
@section('content')
    <section class="more-offers more-offers--subcategory-filter">
        <div class="container">
            <h3 class="title">{{$category->title}}</h3>
            @php /** @var \App\Models\Category $category */ @endphp
            <div class="breadcrumbs">
                <div class="breadcrumbs__inner">
                    <ul class="breadcrumbs__list">
                        <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>

                        <li><a href="{{route('catalog')}}">{{__('front.menu.catalog')}}</a></li>

                        <li><span>{{$category->title}}</span></li>
                    </ul>
                </div>
            </div>

            <section class="subcategory-filter">
                <div class="container">
                    <div class="subcategory-filter__inner">
                        @include('front.productsInCategory._filter')
                        @include('front.productsInCategory._products')
                    </div>
                </div>
            </section>


        </div>
    </section>

    @livewire('front.subscribe.subscribe-live-wier')
@endsection