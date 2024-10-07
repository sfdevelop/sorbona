<li
        @class([
            'has-child',
             'open'=>
                Request::is(
                        'admin/comment/*',
                        'admin/comment',
                        'admin/optionComment/*',
                        'admin/optionComment',
                        )
    ])
>
    <a href="#" class="">
        <i class="nav-icon las la-comments"></i>
        <span class="menu-text">{{__('admin.comments')}}</span>
        <span class="toggle-icon"></span>
    </a>
    <ul>
        <li class="l_sidebar">
            <a
                href="{{route('admin.optionComment.edit')}}"
                @class([
                    'active'=> Request::is('admin/optionComment/*','admin/optionComment'),
                    ])
            >
                {{__('admin.option')}}
            </a>
        </li>
        <li class="l_sidebar">
            <a
                href="{{route('admin.comment.index')}}"
                @class([
                    'active'=> Request::is('admin/comment/*','admin/comment'),
                    ])
            >
                {{__('admin.comments')}}
            </a>
        </li>
    </ul>
</li>
