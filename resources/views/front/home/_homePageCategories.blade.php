<section class="more-offers">
    <div class="container">
        <h3 class="title">
            {{__('front.more_offers')}}
        </h3>
        <ul class="category-list">
            @foreach($homePageCategories as $homePageCategory)
                @php /** @var \App\Models\Category $homePageCategory */ @endphp
                <li class="category-list__item" style="background-image: url({{$homePageCategory->img_web}});">
                    <h6>{{$homePageCategory->title}}</h6>
                    <a href="#" class="btn">{{__('front.view_more')}}</a>
                </li>
            @endforeach
        </ul>
        <a href="#" class="btn">{{__('front.view_more')}}</a>
    </div>
</section>