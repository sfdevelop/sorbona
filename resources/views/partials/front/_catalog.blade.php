<div class="catalog-menu">
    <div class="catalog-menu__list">
        <h4 class="catalog-menu__sublist-title">{{__('front.catalog_products')}}</h4>

        @foreach($categories as $category)
            <div class="catalog-menu__item">
                <a href="{{route('category', $category->slug)}}" class="catalog-menu__link">{{$category->title}}</a>
                @if($category->children_categories_count > 0)

                    <div class="catalog-menu__sublist">
                        <h4 class="catalog-menu__sublist-title">{{$category->title}}</h4>

                        @foreach($category->childrenCategories as $children)
                            <div class="catalog-menu__sublist_item">
                                <a href="{{route('category', $children->slug)}}" class="catalog-menu__sublist__link">{{$children->title}}</a>

                                @if($children->childrenCategories->count() > 0)
                                    <div class="catalog-menu__sublists">
                                        <h4 class="catalog-menu__sublist-title">{{$children->title}}</h4>

                                        @foreach($children->childrenCategories as $childrenThree)
                                            <a href="{{route('category', $childrenThree->slug)}}"
                                               class="catalog-menu__sublists__link">{{$childrenThree->title}}</a>
                                        @endforeach

                                    </div>
                                @endif

                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        @endforeach

    </div>
</div>