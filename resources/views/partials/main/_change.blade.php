<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/change/*',
                        'admin/change',
                        'admin/optionChange/*',
                        'admin/optionChange',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-user-graduate"></i>
        <span class="menu-text">{{__('admin.change')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.optionChange.edit')}}"
                    @class([
                        'active'=> Request::is('admin/optionChange/*','admin/optionChange'),
                        ])
            >
                {{__('admin.option')}}
            </a>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.change.index')}}"
                    @class([
                        'active'=> Request::is('admin/change/*','admin/change'),
                        ])
            >
                {{__('admin.change')}}
            </a>
        </li>
    </ul>
</li>
