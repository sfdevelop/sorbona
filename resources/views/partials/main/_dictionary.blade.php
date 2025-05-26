<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/manufacturer/*',
                        'admin/manufacturer',
                        'admin/currency',
                        'admin/currency/*',
                        'admin/status',
                        'admin/status/*',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon  las la-book"></i>
        <span class="menu-text">{{__('admin.dictionary')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.currency.index')}}"
                    @class([
                        'active'=> Request::is('admin/currency/*','admin/currency'),
                        ])
            >
                <i class=" nav-icon  las la-coins"></i>
                <span class="menu-text">{{__('admin.currency')}}</span>
            </a>
        </li>
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
                    href="{{route('admin.status.index')}}"
                    @class([
                        'active'=> Request::is('admin/status/*','admin/status'),
                        ])
            >
                <i class="nav-icon  las la-tasks"></i>
                <span class="menu-text">Статусы заказа</span>
            </a>
        </li>
    </ul>
</li>
