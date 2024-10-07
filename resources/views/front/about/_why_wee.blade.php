<section class="choice">
    <div class="container">
        <div class="choice__inner">
            <div class="choice__left element-animation">
                <img src="{{$about->img_main}}" alt="choice">
            </div>
            <div class="choice__right">
                <h3 class="title element-animation">
                    {{__('front.why_wee')}}
                </h3>
                <ul class="choice__list">
                    @foreach($whyChoices as $whyChoice)
                    <li class="element-animation">
                        <img src="{{$whyChoice->img_original}}" alt="img-whyChoice-{{$whyChoice->title}}">
                        <div class="choice__list-info">
                            <h6>
                                {{$whyChoice->title}}
                            </h6>
                            {!! $whyChoice->description !!}
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="choice__info element-animation">
                    <p>
                        {{$about->textFeedBackAboutUs}}.
                    </p>
                    <a href="{{route('contacts')}}" class="btn btn--transparent2">
                        {{__('front.feedBack')}}
                        <img src="{{asset('front/images/dest/icons/arrow-btn2.svg')}}" alt="arrow-btn2">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>