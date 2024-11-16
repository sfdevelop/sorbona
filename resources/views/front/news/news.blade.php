@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__head">
                <h1 class="section-head__title">{{__('front.menu.news')}}</h1>
            </div>
            <div class="news">
                <div class="news__list">

                    @foreach($news as $item)
                        @php /** @var \App\Models\Article $item */ @endphp
                        <a href="news-page.html" class="news__item">
                            <div class="news-item__picture">
                                <img src="{{$item->img_web}}" alt="image" loading="lazy" class="img-full" />
                            </div>
                            <div class="news-item__body">
                                <div class="news-item__date date">{{$item->created_at->format('d.m.Y')}}</div>
                                <h4 class="news-item__title">{{$item->title}}</h4>
                                <p class="news-item__desc">
                                {{ $item->short_description }}
                                </p>
                            </div>
                        </a>
                    @endforeach

                </div>

                {{ $news->onEachSide(2)->appends($_GET)->links('pagination::sorbona') }}

            </div>
        </div>
    </section>
@endsection