<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/scroll/*',
                        'admin/scroll',
                        'admin/optionScroll/*',
                        'admin/optionScroll',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-check-circle"></i>
        <span class="menu-text">{{__('admin.scroll')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                href="{{route('admin.optionScroll.edit')}}"
                @class([
                    'active'=> Request::is('admin/optionScroll/*','admin/optionScroll'),
                    ])
            >
                {{__('admin.option')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                href="{{route('admin.scroll.index')}}"
                @class([
                    'active'=> Request::is('admin/scroll/*','admin/scroll'),
                    ])
            >
                {{__('admin.scroll')}}
            </a>
        </li>
    </ul>
</li>
