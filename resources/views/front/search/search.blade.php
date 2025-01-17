@extends('layout.sorbona')
@section('content')
        <div class="breadcrumb__container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('front.menu.main') }}</a></li>
                <span>/</span>
                <li>{{ __('front.search') }}</li>
            </ul>
        </div>


        <section class="catalog subcategory">
            <div class="catalog__container section__container_fullmob">
                <div class="catalog__head">
                    <h1 class="catalog__title">{{ __('search.title') }}</h1>
                    <p class="catalog__subtitle">{{ __('search.found-total') }} {{  $products->count()}} {{ trans_choice('search.products', $products->count()) }}</p>
                </div>
                @if (count($products) > 0)
                <div class="category">
                    <sidebar class="category__sidebar">
                        <div class="filters">
                            <div class="filters__head">
                                <h3 class="filters__head-title">{{ __('search.categories') }}</h3>
                                <button class="filters__close">
                                    <svg><use xlink:href="img/icons/icons.svg#icon-close"></use></svg>
                                </button>
                            </div>
                            <div class="filters__item ui accordion">
                                <div class="filters-item__head title">
                                    <span class="filters-item__head-title">{{ __('search.found-categories') }}</span>
                                    <svg><use xlink:href="img/icons/icons.svg#icon-label-open"></use></svg>
                                </div>
                                <div class="filters-item__body content active">
                                    <div class="filters-item__categorys">
                                        @foreach($searchCategories as $category)
                                        <a href="{{ $category['url'] }}" class="filters-item__category">
                                            <p class="chbox__text">{{ $category['name'] }} <span>({{$category['count']}})</span></p>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </sidebar>
                    @include('front.search._products_in_category')
                </div>
                @else
                    <div class="notfound">
                        <div class="notfound__picture">
                            <img src="/front/img/search/catalog-notfound.svg" alt="image" loading="lazy" class="img-full">
                        </div>
                        <h1 class="notfound__title">{{ __('search.no_results') }}</h1>
                    </div>
                @endif;
            </div>
        </section>
@endsection
