<div class="sidebar__menu-group">
    <ul class="sidebar_nav">

        <li class="menu-title mt-30">
            <span>{{__('admin.shop')}}</span>
        </li>

{{--        @include('partials.main._dictionary')--}}

        <li class="l_sidebar">
            <a
                    href="{{route('admin.manufacturer.index')}}"
                    @class([
                        'active'=> Request::is('admin/manufacturer/*','admin/manufacturer'),
                        ])
            >
                <i class="nav-icon las la-industry"></i>
                <span class="menu-text">{{__('admin.manufacturer')}}</span>
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
        <li class="l_sidebar">
            <a
                    href="{{route('admin.color.index')}}"
                    @class([
                        'active'=> Request::is('admin/color/*','admin/color'),
                        ])
            >
                <i class="nav-icon las la-palette"></i>
                <span class="menu-text">{{__('admin.color')}}</span>
            </a>
        </li>

        <li class="menu-title mt-30">
            <span>{{__('admin.orders')}}</span>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.order.index')}}"
                    @class([
                        'active'=> Request::is(
                            'admin/orders/*',
                            'admin/orders',
                                 ),
                        ])
            >
                <i class="nav-icon las la-wallet"></i>
                <span class="menu-text">{{__('admin.orders')}}</span>
            </a>
        </li>

        <li class="menu-title mt-30">
            <span>{{__('admin.page')}}</span>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.politic.edit')}}"
                    @class([
                        'active'=> Request::is('admin/admin.politic/*','admin/admin.politic'),
                        ])
            >
                <i class="nav-icon  las la-rss-square"></i>
                <span class="menu-text">{{__('admin.admin.politic')}}</span>
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

        @include('partials.main._main')
        @include('partials.main._about')


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
