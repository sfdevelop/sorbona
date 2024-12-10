@extends('layout.sorbona')
@section('content')
    @php /** @var \App\Models\Category $category */ @endphp
    <div class="breadcrumb__container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('front.menu.main')}}</a></li>
            <span>/</span>
            <li>{{$category->title}}</li>
        </ul>
    </div>


    <section class="catalog subcategory">
        <div class="catalog__container">
            <h1 class="catalog__title">{{$category->title}}</h1>
            <div class="catalog__wrap">

                @foreach($category->childrenCategories as $childCategory)
                    <div class="catalog__item catalog-item">
                        <a href="{{route('category', $childCategory->slug)}}" class="catalog-item__head">
                            <p class="catalog-item__head-title">{{$childCategory->title}}</p>
                            <img
                                    src="{{$childCategory->img_jpg}}"
                                    alt="image"
                                    loading="lazy"
                                    class="catalog-item__head-img"
                            />
                        </a>
                        @if($childCategory->childrenCategories->count() >0 )
                        <div class="catalog-item__content">
                            <div class="catalog-item__content_body">

                                @foreach($childCategory->childrenCategories as $grandChildCategoryTwo)
                                    <a href="{{route('category', $grandChildCategoryTwo->slug)}}" class="catalog-item__content-link">{{$grandChildCategoryTwo->title}}</a>
                                @endforeach

                            </div>
                            @if($grandChildCategoryTwo->children_categories_count > 4)
                                <div class="catalog-item__content-btn">
                                    <span>{{__('front.moreCategory')}}</span>
                                    <span>{{__('front.notMoreCategory')}}</span>
                                    <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use></svg>
                                </div>
                            @endif
                        </div>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="section">
        <div class="section__container section__container_pb section__container_fullmob">
            <h2 class="section__title">Рекомендовано для вас</h2>
            <div class="product-list">

                @foreach($randomProducts as $productRandom)
                   @include('layout.front.product._product', ['product' => $productRandom])
                @endforeach

            </div>
        </div>
    </section>
@endsection