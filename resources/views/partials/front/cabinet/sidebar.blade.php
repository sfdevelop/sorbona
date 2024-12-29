<div class="account__sidebar">
    <div class="account-sidebar__body">
        <div class="account-sidebar__head">
            <h4 class="account-sidebar__name">{{auth()->user()->name }} {{auth()->user()->surname ?? '' }}</h4>
            <p class="account-sidebar__email">{{auth()->user()->email}}</p>
        </div>
        <div class="account-sidebar__list">
            <a href="{{route('cabinet')}}" class="account-sidebar__page current">{{__('front.menu.main')}}</a>
{{--            <a href="account-detail.html" class="account-sidebar__page">Мои данные</a>--}}
{{--            <a href="account-order.html" class="account-sidebar__page">Мои заказы</a>--}}
        </div>
    </div>
    <a href="{{route('logout')}}" class="account-sidebar__out">Выйти</a>
</div>