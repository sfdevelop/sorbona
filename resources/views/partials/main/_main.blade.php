<li
        @class([
            'has-child',
             'open'=>
                Request::is(

                        'admin/benefit',
                        'admin/benefit/*',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-newspaper"></i>
        <span class="menu-text">{{__('admin.main_page')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>


    </ul>
</li>
