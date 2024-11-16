<section class="catalog">
    <div class="catalog__container">
        <div class="catalog__wrap">
            @foreach($mainPageCategories as $category)
                @php /** @var \App\Models\Category $category */ @endphp
                <div class="catalog__item catalog-item">
                    <a href="{{route('category', $category->slug)}}" class="catalog-item__head">
                        <p class="catalog-item__head-title">{{$category->title}}</p>
                        <img
                                src="{{$category->img_web}}"
                                alt="category-main-page-{{$category->title}}"
                                loading="lazy"
                                class="catalog-item__head-img"
                        />
                    </a>
                    @if($category->children_categories_count > 0)
                        <div class="catalog-item__content">
                            <div class="catalog-item__content_body">
                                @foreach($category->childrenCategories as $childCategory)
                                    <a href="{{route('category', $childCategory->slug)}}" class="catalog-item__content-link">{{$childCategory->title}}</a>
                                @endforeach
                            </div>
                            @if($category->children_categories_count > 4)
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