<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/whyChoose',
                        'admin/whyChoose/*',
                        'admin/values',
                        'admin/values/*',
                        'admin/offer',
                        'admin/offer/*',
                        'admin/pageAbout',
                        'admin/pageAbout/*',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-newspaper"></i>
        <span class="menu-text">{{__('admin.about_us')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.pageAbout.edit')}}"
                    @class([
                        'active'=> Request::is('admin/pageAbout/*','admin/pageAbout'),
                        ])
            >
                {{__('admin.option')}}
            </a>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.whyChoose.index')}}"
                    @class([
                        'active'=> Request::is('admin/whyChoose/*','admin/whyChoose'),
                        ])
            >
                {{__('admin.whoChose')}}
            </a>
        </li>



        <li class="l_sidebar">
            <a
                    href="{{route('admin.values.index')}}"
                    @class([
                        'active'=> Request::is('admin/values/*','admin/values'),
                        ])
            >
                {{__('admin.values')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.offer.index')}}"
                    @class([
                        'active'=> Request::is('admin/offer/*','admin/offer'),
                        ])
            >
                {{__('admin.offer')}}
            </a>
        </li>
    </ul>
</li>
