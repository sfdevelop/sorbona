<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/slider/*',
                        'admin/slider',
                        'admin/mainAbout',
                        'admin/mainAbout/*',
                        'admin/chose',
                        'admin/chose/*',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-newspaper"></i>
        <span class="menu-text">{{__('admin.main_page')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.slider.index')}}"
                    @class([
                        'active'=> Request::is('admin/slider/*','admin/slider'),
                        ])
            >
                {{__('admin.slide')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.mainAbout.edit')}}"
                    @class([
                        'active'=> Request::is('admin/mainAbout/*','admin/mainAbout'),
                        ])
            >
                {{__('admin.aboutMain')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.chose.index')}}"
                    @class([
                        'active'=> Request::is('admin/chose/*','admin/chose'),
                        ])
            >
                {{__('admin.chose')}}
            </a>
        </li>
    </ul>
</li>
