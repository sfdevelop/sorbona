@extends('layout.okplius')
@section('content')
    <section class="more-offers more-offers--category">
        <div class="container">
            <h3 class="title">{{__('front.menu.catalog')}}</h3>

            <div class="breadcrumbs">
                <div class="breadcrumbs__inner">
                    <ul class="breadcrumbs__list">
                        <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                        <li><span>{{__('front.menu.catalog')}}</span></li>
                    </ul>
                </div>
            </div>

            <ul class="category-list">
                @foreach($categories as $category)
                    @php /** @var \App\Models\Category $category */ @endphp
                    <li class="category-list__item" style="background-image: url({{$category->img_web}})">
                        <h6>{{$category->title}}</h6>

                        <a
                                href="{{ $category->children_categories_count > 0 ? route('subcategory', $category->slug) : route('filter', $category->slug) }}"
                                class="btn"
                        >
                            {{ __('front.view_more') }}
                        </a>

                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    @livewire('front.subscribe.subscribe-live-wier')
@endsection