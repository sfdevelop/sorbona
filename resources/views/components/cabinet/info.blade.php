<div class="cabinet__left">
    <button class="cabinet__close">
        <img src="{{asset('front/images/dest/icons/close.svg')}}" alt="close">
    </button>
    <div class="cabinet__user">
        {{Auth::user()->name}}
    </div>
    <div class="cabinet__mail-info">
        {{Auth::user()->email}}
    </div>
    <ul>
        <li
                @class([
                        "active"=>Request::is(app()->getLocale().'cabinet') || Request::is('cabinet'),
                ])
        >
            <a href="{{route('cabinet')}}">
                {{__('front.profile')}}
            </a>
        </li>
        <li
                @class([
                        "active"=>Request::is(app()->getLocale().'cabinet/orders') || Request::is('cabinet/orders'),
                ])
        >
            <a href="{{route('orders')}}">
                {{__('front.orders')}}
            </a>
        </li>
        <li
                @class([
                        "active"=>Request::is(app()->getLocale().'cabinet/wishlist') || Request::is('cabinet/wishlist'),
                ])
        >
            <a href="{{route('wishlist')}}">
                {{__('front.wishlist')}}
            </a>
        </li>
        <li>
            <a href="{{route('change.password')}}">
                {{__('front.change_password')}}
            </a>
        </li>
        <li>
            <form id="logout-form" action="{{ route('cabinet.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
{{__('front.log_out')}}
            </a>
        </li>
    </ul>

</div>