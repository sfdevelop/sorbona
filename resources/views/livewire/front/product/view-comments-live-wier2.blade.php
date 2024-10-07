@if($comments->count()>0)
    <div class="u-info__slider">
        <div class="swiper-wrapper">
            @forelse($comments as $comment)
                <div class="swiper-slide review element-animation">
                    <div class="talk__top">
                        @php /** @var \App\Models\Comment $comment */ @endphp
                        <h6>
                            {{$comment->name}}
                        </h6>
                        <span>
                        {{$comment->createdFormat}}
                </span>
                    </div>
                    <div class="talk__text">
                        <p>
                            {{$comment->text}}
                        </p>
                    </div>
                </div>
            @empty
                <div class="dont_comment">
                    {{__('front.not_comments')}}
                </div>
            @endforelse
        </div>
        <div class="swiper-button-next">
            <img src="{{asset('front/images/dest/icons/arrow-slider3.svg')}}" alt="arrow">
        </div>
        <div class="swiper-button-prev">
            <img src="{{asset('front/images/dest/icons/arrow-slider3.svg')}}" alt="arrow">
        </div>
    </div>
@else
    <div class="dont_comment">
        {{__('front.not_comments')}}
    </div>
@endif
@push('css_front')
    <link href="{{asset('front/css/custom.css')}}?v={{ filemtime(public_path('front/css/custom.css'))}}" rel="stylesheet"/>
@endpush
