<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/mainScreen/*',
                        'admin/mainScreen',
                        'admin/whoWe/*',
                        'admin/whoWe',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-newspaper"></i>
        <span class="menu-text">{{__('admin.main_screen')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.mainScreen.edit')}}"
                    @class([
                        'active'=> Request::is('admin/mainScreen/*','admin/mainScreen'),
                        ])
            >
                {{__('admin.main_screen')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.whoWe.edit')}}"
                    @class([
                        'active'=> Request::is('admin/whoWe/*','admin/whoWe'),
                        ])
            >
                {{__('admin.whyWe')}}
            </a>
        </li>
    </ul>
</li>
