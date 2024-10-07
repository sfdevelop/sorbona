<footer class="footer">
    @php /** @var \App\Models\Setting $setting */ @endphp
    <div class="footer__top">
        <div class="container">
            <div class="footer__inner element-animation">
                <div class="footer__col">
                    <span>{{__('front.address')}}</span>
                    <ul>
                        <li>
                            {{$setting->address}}
                        </li>
                    </ul>
                </div>
                <div class="footer__col">
                    <span>{{__('front.say_hello')}}</span>
                    <ul>
                        <li>
                            <a href="#">
                                {{$setting->email}}
                            </a>
                        </li>
                        <li>
                            <a class="footer__tel" href="tel:{{$setting->phone}}">
                                {{$setting->phone}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer__col">
                    <span>{{__('front.social')}}</span>
                    <ul>
                        <li>
                            <a href="{{$setting->instagram}}" rel="nofollow noopener noreferrer" target="_blank">
                                Instagram
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->linkedin}}" rel="nofollow noopener noreferrer" target="_blank">
                                TikTok
                            </a>
                        </li>
                    </ul>
                </div>
                @livewire('front.subscribe.subscribe-live-wier')
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__inner">
                <a href="#" class="footer__logo">
                    <img src="{{asset('front/images/dest/icons/logo.svg')}}" alt="logo">
                </a>
                <p>
                    © {{now()->format('Y')}} All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>