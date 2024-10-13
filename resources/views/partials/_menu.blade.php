<div class="sidebar__menu-group">
    <ul class="sidebar_nav">

        @include('partials.main._dictionary')

        <li class="menu-title mt-30">
            <span>{{__('admin.shop')}}</span>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.filter.index')}}"
                    @class([
                        'active'=> Request::is('admin/filter/*','admin/filter'),
                        ])
            >
                <i class="nav-icon las la-filter"></i>
                <span class="menu-text">{{__('admin.filter')}}</span>

            </a>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.category.index')}}"
                    @class([
                        'active'=> Request::is('admin/category/*','admin/category'),
                        ])
            >
                <i class="nav-icon las la-tags"></i>
                <span class="menu-text">{{__('admin.category')}}</span>

            </a>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.product.index')}}"
                    @class([
                        'active'=> Request::is('admin/product/*','admin/product'),
                        ])
            >
                <i class="nav-icon las la-tshirt"></i>
                <span class="menu-text">{{__('admin.product')}}</span>
            </a>
        </li>

        <li class="menu-title mt-30">
            <span>{{__('admin.orders')}}</span>
        </li>

{{--        <li class="l_sidebar">--}}
{{--            <a--}}
{{--                    href="{{route('admin.order.index')}}"--}}
{{--                    @class([--}}
{{--                        'active'=> Request::is(--}}
{{--                            'admin/orders/*',--}}
{{--                            'admin/orders',--}}
{{--                                 ),--}}
{{--                        ])--}}
{{--            >--}}
{{--                <i class="nav-icon las la-wallet"></i>--}}
{{--                <span class="menu-text">{{__('admin.orders')}}</span>--}}
{{--            </a>--}}
{{--        </li>--}}

        <li class="menu-title mt-30">
            <span>{{__('admin.page')}}</span>
        </li>

        @include('partials.main._main')
        @include('partials.main._about')

        <li class="l_sidebar">
            <a
                    href="{{route('admin.politic.edit')}}"
                    @class([
                        'active'=> Request::is('admin/politic/*','admin/politic'),
                        ])
            >
                <i class="nav-icon  las la-clipboard-list"></i>
                <span class="menu-text">{{__('admin.politic')}}</span>
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.offerta.edit')}}"
                    @class([
                        'active'=> Request::is('admin/offerta/*','admin/offerta'),
                        ])
            >
                <i class="nav-icon  las la-clipboard-list"></i>
                <span class="menu-text">{{__('admin.offerta')}}</span>
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.return.edit')}}"
                    @class([
                        'active'=> Request::is('admin/return/*','admin/return'),
                        ])
            >
                <i class="nav-icon  las la-clipboard-list"></i>
                <span class="menu-text">{{__('admin.return')}}</span>
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.article.index')}}"
                    @class([
                        'active'=> Request::is('admin/article/*','admin/article'),
                        ])
            >
                <i class="nav-icon  las la-rss-square"></i>
                <span class="menu-text">{{__('admin.article')}}</span>
            </a>
        </li>


        <li class="menu-title mt-30">
            <span>{{__('Повідомлення')}}</span>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.comment.index')}}"
                    @class([
                        'active'=> Request::is(
                            'admin/comment/*',
                            'admin/comment',
                                 ),
                        ])
            >
                <i class="nav-icon las la-comments"></i>
                {{__('admin.comments')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.subscribe.index')}}"
                    @class([
                        'active'=> Request::is(
                            'admin/subscribe/*',
                            'admin/subscribe',
                                 ),
                        ])
            >
                <i class="nav-icon las la-paper-plane"></i>
                Підписка на розсилку
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.feedback.index')}}"
                    @class([
                        'active'=> Request::is('admin/feedback/*') or Request::is('admin/feedback'),
                        ])
            >
                <i class="nav-icon las la-comments"></i>

                <span class="menu-text">Повідомлення</span>
            </a>
        </li>

    </ul>
</div>
