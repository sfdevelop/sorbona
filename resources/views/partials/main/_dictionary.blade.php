<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/category/*',
                        'admin/category',
                        'admin/product',
                        'admin/product/*',
                        'admin/color',
                        'admin/color/*',
                        'admin/size/*',
                        'admin/size',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-store"></i>
        <span class="menu-text">{{__('admin.shop')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.category.index')}}"
                    @class([
                        'active'=> Request::is('admin/category/*','admin/category'),
                        ])
            >
                {{__('admin.category')}}
            </a>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.product.index')}}"
                    @class([
                        'active'=> Request::is('admin/product/*','admin/product'),
                        ])
            >
                {{__('admin.product')}}
            </a>
        </li>
        <li class="l_sidebar">
            <a
                    href="{{route('admin.color.index')}}"
                    @class([
                        'active'=> Request::is('admin/color/*','admin/color'),
                        ])
            >
                {{__('admin.color')}}
            </a>
        </li>

        <li class="l_sidebar">
            <a
                    href="{{route('admin.size.index')}}"
                    @class([
                        'active'=> Request::is('admin/size/*','admin/size'),
                        ])
            >
                {{__('admin.size')}}
            </a>
        </li>
    </ul>
</li>
