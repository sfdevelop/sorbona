@extends('layout.okplius')
@section('content')

    @include('front.home._slider')
    @include('front.home._bestsellers')
    @include('front.home._homePageCategories')
    @include('front.home._newProducts')

    {{--    <section class="review">--}}
    {{--        <div class="container">--}}
    {{--            <h3 class="title">--}}
    {{--                What they say about us--}}
    {{--            </h3>--}}
    {{--            <div class="review__slider">--}}
    {{--                <div class="swiper-wrapper">--}}
    {{--                    <div class="swiper-slide review__item">--}}
    {{--                        <div class="review__top">--}}
    {{--                            <div class="review__avatar">--}}
    {{--                                <span>a</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="review__info">--}}
    {{--                                <div class="review__name">Alexander </div>--}}
    {{--                                <div class="review__date">30.07.2023</div>--}}
    {{--                            </div>--}}
    {{--                            <div class="rateYo_reviews"></div>--}}
    {{--                        </div>--}}
    {{--                        <h6>Product name in one or two lines</h6>--}}
    {{--                        <span>product review</span>--}}
    {{--                        <div class="review__text">--}}
    {{--                            <p>Lorem ipsum dolor sit amet consectetur. Aliquet sit praesent libero non amet. Viverra commodo eros--}}
    {{--                                felis elit tellus augue porttitor feugiat. Eu amet nisl quis eleifend sit condimentum ac nisl.--}}
    {{--                                Tellus neque ultrices amet viverra a sit cursus.</p>--}}
    {{--                        </div>--}}
    {{--                        <button class="review__more">Read more <img src="images/icons/arrow-right.svg" alt="arrow"></button>--}}
    {{--                    </div>--}}
    {{--                    <div class="swiper-slide review__item">--}}
    {{--                        <div class="review__top">--}}
    {{--                            <div class="review__avatar">--}}
    {{--                                <img src="images/content/avatar.jpg" alt="avatar">--}}
    {{--                            </div>--}}
    {{--                            <div class="review__info">--}}
    {{--                                <div class="review__name">Alexander </div>--}}
    {{--                                <div class="review__date">30.07.2023</div>--}}
    {{--                            </div>--}}
    {{--                            <div class="rateYo_reviews"></div>--}}
    {{--                        </div>--}}
    {{--                        <h6>Product name in one or two lines</h6>--}}
    {{--                        <span>product review</span>--}}
    {{--                        <div class="review__text">--}}
    {{--                            <p>Lorem ipsum dolor sit amet consectetur. Aliquet sit praesent libero non amet. Viverra commodo eros--}}
    {{--                                felis elit tellus augue porttitor feugiat. Eu amet nisl quis eleifend sit condimentum ac nisl.--}}
    {{--                                Tellus neque ultrices amet viverra a sit cursus.</p>--}}
    {{--                        </div>--}}
    {{--                        <button class="review__more">Read more <img src="images/icons/arrow-right.svg" alt="arrow"></button>--}}
    {{--                    </div>--}}
    {{--                    <div class="swiper-slide review__item">--}}
    {{--                        <div class="review__top">--}}
    {{--                            <div class="review__avatar">--}}
    {{--                                <span>a</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="review__info">--}}
    {{--                                <div class="review__name">Alexander </div>--}}
    {{--                                <div class="review__date">30.07.2023</div>--}}
    {{--                            </div>--}}
    {{--                            <div class="rateYo_reviews"></div>--}}
    {{--                        </div>--}}
    {{--                        <h6>Product name in one or two lines</h6>--}}
    {{--                        <span>product review</span>--}}
    {{--                        <div class="review__text">--}}
    {{--                            <p>Lorem ipsum dolor sit amet consectetur. Aliquet sit praesent libero non amet. Viverra commodo eros--}}
    {{--                                felis elit tellus augue porttitor feugiat. Eu amet nisl quis eleifend sit condimentum ac nisl.--}}
    {{--                                Tellus neque ultrices amet viverra a sit cursus.</p>--}}
    {{--                        </div>--}}
    {{--                        <button class="review__more">Read more <img src="images/icons/arrow-right.svg" alt="arrow"></button>--}}
    {{--                    </div>--}}
    {{--                    <div class="swiper-slide review__item">--}}
    {{--                        <div class="review__top">--}}
    {{--                            <div class="review__avatar">--}}
    {{--                                <span>a</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="review__info">--}}
    {{--                                <div class="review__name">Alexander </div>--}}
    {{--                                <div class="review__date">30.07.2023</div>--}}
    {{--                            </div>--}}
    {{--                            <div class="rateYo_reviews"></div>--}}
    {{--                        </div>--}}
    {{--                        <h6>Product name in one or two lines</h6>--}}
    {{--                        <span>product review</span>--}}
    {{--                        <div class="review__text">--}}
    {{--                            <p>Lorem ipsum dolor sit amet consectetur. Aliquet sit praesent libero non amet. Viverra commodo eros--}}
    {{--                                felis elit tellus augue porttitor feugiat. Eu amet nisl quis eleifend sit condimentum ac nisl.--}}
    {{--                                Tellus neque ultrices amet viverra a sit cursus.</p>--}}
    {{--                        </div>--}}
    {{--                        <button class="review__more">Read more <img src="images/icons/arrow-right.svg" alt="arrow"></button>--}}
    {{--                    </div>--}}
    {{--                    <div class="swiper-slide review__item">--}}
    {{--                        <div class="review__top">--}}
    {{--                            <div class="review__avatar">--}}
    {{--                                <span>a</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="review__info">--}}
    {{--                                <div class="review__name">Alexander </div>--}}
    {{--                                <div class="review__date">30.07.2023</div>--}}
    {{--                            </div>--}}
    {{--                            <div class="rateYo_reviews"></div>--}}
    {{--                        </div>--}}
    {{--                        <h6>Product name in one or two lines</h6>--}}
    {{--                        <span>product review</span>--}}
    {{--                        <div class="review__text">--}}
    {{--                            <p>Lorem ipsum dolor sit amet consectetur. Aliquet sit praesent libero non amet. Viverra commodo eros--}}
    {{--                                felis elit tellus augue porttitor feugiat. Eu amet nisl quis eleifend sit condimentum ac nisl.--}}
    {{--                                Tellus neque ultrices amet viverra a sit cursus.</p>--}}
    {{--                        </div>--}}
    {{--                        <button class="review__more">Read more <img src="images/icons/arrow-right.svg" alt="arrow"></button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="swiper-button-next">--}}
    {{--                    <img src="images/icons/arrow-down.svg" alt="arrow">--}}
    {{--                </div>--}}
    {{--                <div class="swiper-button-prev">--}}
    {{--                    <img src="images/icons/arrow-down.svg" alt="arrow">--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    @livewire('front.subscribe.subscribe-live-wier')

@endsection