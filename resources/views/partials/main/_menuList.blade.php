<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/menuList/*',
                        'admin/menuList',
                        'admin/menu/*',
                        'admin/menu',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-utensils"></i>
        <span class="menu-text">{{__('admin.menu')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.menuList.index')}}"
                    @class([
                        'active'=> Request::is('admin/menuList/*','admin/menuList'),
                        ])
            >
                {{__('admin.menuList')}}
            </a>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.menu.index')}}"
                    @class([
                        'active'=> Request::is('admin/menu/*','admin/menu'),
                        ])
            >
                {{__('admin.product')}}
            </a>
        </li>
    </ul>
</li>
