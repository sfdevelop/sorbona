@extends('layout.sorbona')
@section('content')
    @php /** @var \App\Models\Category $category */ @endphp
    <div class="breadcrumb__container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('front.menu.main')}}</a></li>
            <span>/</span>
            <li><a href="subcategory.html">Запорно - регулирующая арматура</a></li>
            <span>/</span>
            <li><a href="subcategory2.html">Шаровые краны</a></li>
            <span>/</span>
            <li>{{$category->title}}</li>
        </ul>
    </div>


    <section class="catalog subcategory">
        <div class="catalog__container section__container_fullmob">
            <h1 class="catalog__title">{{$category->title}}</h1>
            <div class="category">
                    @include('front.catalog._filters_in_category')
                    @include('front.catalog._products_in_category')
            </div>
        </div>
    </section>
@endsection