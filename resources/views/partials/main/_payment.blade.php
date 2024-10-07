<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/payment/*',
                        'admin/payment',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-money-bill-wave"></i>
        <span class="menu-text">{{__('admin.payment')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.payment.edit')}}"
                    @class([
                        'active'=> Request::is('admin/payment/*','admin/payment'),
                        ])
            >
                {{__('admin.payment')}}
            </a>
        </li>
    </ul>
</li>
