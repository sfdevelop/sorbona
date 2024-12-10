@extends('layout.sorbona')
@section('content')
    @php /** @var \App\Models\Article $article */ @endphp
    <div class="breadcrumb__container">
        <ul class="breadcrumb">
            <li><a href="{{route('news')}}">{{__('front.menu.news')}}</a></li>
            <span>/</span>
            <li>{{$article->title}}</li>
        </ul>
    </div>

    <section class="section">
        <div class="section__container section__container_pb">
            <div class="single-news">
                <article class="single-news__body">
                    <h1 class="single-news__title">{{$article->title}}</h1>
                    <div class="single-news__date date">{{$article->created_at->format('d.m.Y')}}</div>
                    <div class="single-news__picture">
                        <img src="{{$article->img_jpg}}"
                             alt="image"
                             loading="lazy"
                             class="img-full"
                        />
                    </div>
                    {!! $article->description !!}
                </article>

                <sidebar class="single-news__sidebar">
                    <h3>{{__('front.news_random')}}</h3>
                    <div class="single-news__list">
                        @foreach($randomArticles as $randomArticle)
                            @php /** @var \App\Models\Article $randomArticle */ @endphp
                            <a href="{{route('article', $randomArticle->slug)}}" class="single-news__item">
                                <div class="single-news-item__picture">
                                    <img
                                            src="{{$randomArticle->preview}}"
                                            alt="image"
                                            loading="lazy"
                                            class="img-full-random-{{$randomArticle->title}}"
                                    >
                                </div>
                                <div class="single-news-item__body">
                                    <h4>{{$randomArticle->title}}</h4>
                                    <div class="date">{{$randomArticle->created_at->format('d.m.Y')}}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{route('news')}}" class="single-news__btn btn btn--line">{{__('menu.all_news')}}</a>
                </sidebar>

            </div>
        </div>
    </section>
@endsection