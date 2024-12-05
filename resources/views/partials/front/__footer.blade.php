<footer class="footer">
    @php /** @var \App\Models\Setting $settings */ @endphp
    <div class="footer__container">
        <div class="footer__top">
            <div class="footer__col">
                <a href="{{route('home')}}" class="footer__logo">
                    <img src="{{asset('front/img/footer-logo.svg')}}" alt="image" loading="lazy" class="img-full" />
                </a>
                <p class="footer__text">
                    {{$settings->textForMail}}
                </p>
                <div class="footer__social">
                    <a target="_blank" href="{{$settings->facebook}}" class="footer__social-link">
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#social-facebook')}}"></use></svg>
                    </a>
                    <a target="_blank" href="{{$settings->instagram}}" class="footer__social-link">
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#social-instagram')}}"></use></svg>
                    </a>
                </div>
            </div>
            <nav class="footer__nav">
                <div class="footer-nav__col">
                    <h4 class="footer-nav__title">{{__('front.information')}}</h4>
                    <ul class="footer-nav__list">
                        <li class="footer-nav__item"><a href="{{route('home')}}" class="footer-nav__link">{{__('front.menu.main')}}</a></li>
                        <li class="footer-nav__item"><a href="{{route('manufacturers')}}" class="footer-nav__link">{{__('front.menu.manufacturer')}}</a></li>
                        <li class="footer-nav__item"><a href="{{route('about')}}" class="footer-nav__link">{{__('front.menu.about')}}</a></li>
                        <li class="footer-nav__item"><a href="{{route('return')}}" class="footer-nav__link">{{__('front.menu.reload')}}</a></li>
                        <li class="footer-nav__item"><a href="{{route('news')}}" class="footer-nav__link">{{__('front.menu.news')}}</a></li>
                        <li class="footer-nav__item"><a href="{{route('contacts')}}" class="footer-nav__link">{{__('front.menu.contacts')}}</a></li>
                    </ul>
                </div>
                <div class="footer-nav__col">
                    <h4 class="footer-nav__title">Личный кабинет</h4>
                    <ul class="footer-nav__list">
                        <li class="footer-nav__item"><a href="#" class="footer-nav__link">Аккаунт</a></li>
                        <li class="footer-nav__item"><a href="#" class="footer-nav__link">Мои заказы</a></li>
                    </ul>
                </div>
            </nav>
            <div class="footer__info">
                <h4 class="footer-info__title">{{__('front.menu.contacts')}}</h4>
                <a href="tel:{{$settings->phone}}" class="footer-info__item">{{$settings->phone}}</a>
                <a href="tel:{{$settings->phone2}}" class="footer-info__item">{{$settings->phone2}}</a>
                <a href="mail:{{$settings->email}}" class="footer-info__item">{{$settings->email}}</a>
                <p class="footer-info__item">{{$settings->address}}</p>
            </div>
        </div>
        <div class="footer__row">
            <p class="footer-row__item">{{$settings->cooperate}}</p>
            <a href="{{route('policy')}}" class="footer-row__item">{{__('front.policy')}}</a>
            <div class="footer-row__creator">{{__('front.site')}}<img src="{{asset('front/img/logo-webakula.svg')}}" alt="image" loading="lazy" /></div>
        </div>
    </div>
</footer>