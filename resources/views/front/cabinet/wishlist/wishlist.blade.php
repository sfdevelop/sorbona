@extends('layout.bureviy')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner ">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__('front.wishlist')}}</span></li>
                </ul>
            </div>
        </div>

        <section class="cabinet">
            <div class="container">
                <h3 class="title ">
                    {{__('front.wishlist')}}
                </h3>
                <div class="cabinet__inner">

                    <x-cabinet.info/>
                    <div class="filter">
                        <div class="filter__right">
                            <div class="filter__right-inner">
                                @foreach($wishlists as $product)
                                    @include('partials.front._product')
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
        </section>
    </div>
@endsection