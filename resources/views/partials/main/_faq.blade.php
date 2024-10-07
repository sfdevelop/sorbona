<li
    @class([
        'has-child',
         'open'=>
            Request::is(
                    'admin/faq/*',
                    'admin/faq',
                    'admin/optionFaq/*',
                    'admin/optionFaq',
                    )
])
>
    <a href="#" class="">
        <i class="nav-icon las la-question-circle"></i>
        <span class="menu-text">{{__('admin.faq')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                href="{{route('admin.optionFaq.edit')}}"
                @class([
                    'active'=> Request::is('admin/optionFaq/*','admin/optionFaq'),
                    ])
            >
                {{__('admin.option')}}
            </a>
        </li>
        <li class="l_sidebar">
            <a
                href="{{route('admin.faq.index')}}"
                @class([
                    'active'=> Request::is('admin/faq/*','admin/faq'),
                    ])
            >
                {{__('admin.faq')}}
            </a>
        </li>
    </ul>
</li>
