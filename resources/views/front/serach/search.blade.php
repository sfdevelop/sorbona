@extends('layout.bureviy')
@section('content')

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner element-animation">
                <ul class="breadcrumbs__list">
                    <li><a href="#">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__('front.search')}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="filter">
        <div class="container">
            <h3 class="title element-animation">
                {{$searchString}}
            </h3>

            <div class="filter__inner">

                <div class="filter__right">
                    <div class="filter__right-inner">

                        @foreach($products as $product)
                            @include('partials.front._product')
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection