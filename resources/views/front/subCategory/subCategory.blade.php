@extends('layout.okplius')
@section('content')
    <section class="more-offers more-offers--subcategory">
        <div class="container">
            <h3 class="title">{{$category->title}}</h3>

            <div class="breadcrumbs">
                <div class="breadcrumbs__inner">
                    <ul class="breadcrumbs__list">
                        <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                        <li><a href="{{route('catalog')}}">{{__('front.menu.catalog')}}</a></li>
                        <li><span>{{$category->title}}</span></li>
                    </ul>
                </div>
            </div>

            <ul class="category-list category-list--subcategory">
                @foreach($subCategories as $subCategory)
                    @php /** @var \App\Models\Category $subCategory */ @endphp
                    <li class="category-list__item" style="background-image: url({{$subCategory->img_jpg}});">
                        <h6>{{$subCategory->title}}</h6>
                        <a href="{{route('filter', $subCategory->slug)}}" class="btn">View more</a>
                    </li>
                @endforeach
            </ul>
            {{ $subCategories->onEachSide(2)->appends($_GET)->links('pagination::plius') }}
        </div>
    </section>

    @livewire('front.subscribe.subscribe-live-wier')
@endsection