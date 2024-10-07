<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/article/*',
                        'admin/article',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-glass-martini"></i>
        <span class="menu-text">{{__('admin.articles')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.article.index')}}"
                    @class([
                        'active'=> Request::is('admin/article/*','admin/article'),
                        ])
            >
                {{__('admin.articles')}}
            </a>
        </li>
    </ul>
</li>
