@guest
    <a href="{{route('login')}}"
       class="header__login"
    >
        <div class="header__login-icon">
            <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-login')}}"></use></svg>
        </div>
        <div class="header__login-text">{{__('front.sign_in')}}</div>
    </a>
@endguest

@auth
    <a href="{{route('cabinet')}}" class="header__login autorized">
        <div class="header__login-icon">
            <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-login')}}"></use></svg>
        </div>
        <div class="header__login-text">{{auth()->user()->name ?? ''}}</div>
    </a>
@endauth
