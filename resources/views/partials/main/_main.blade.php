<li
        @class([
            'has-child',
             'open'=>
                Request::is(

                        'admin/benefit',
                        'admin/benefit/*',
                        'admin/optionMain/*',
                        'admin/optionMain',
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
                    href="{{route('admin.optionMain.edit')}}"
                    @class([
                        'active'=> Request::is('admin/optionMain/*','admin/optionMain'),
                        ])
            >
                {{__('admin.option')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.benefit.index')}}"
                    @class([
                        'active'=> Request::is('admin/benefit/*','admin/benefit'),
                        ])
            >
                {{__('admin.benefit')}}
            </a>
        </li>
    </ul>
</li>
