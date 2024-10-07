@guest()
    <a href="{{route('login')}}" class="header__user">
        <img src="{{asset('front/images/dest/icons/user.svg')}}" alt="user">
    </a>
@endguest

@auth()
    <a href="{{route('cabinet')}}" class="header__user" title="{{Auth::user()->name}}">
        {!! getAvatar(Auth::user()->name) !!}
    </a>
@endauth