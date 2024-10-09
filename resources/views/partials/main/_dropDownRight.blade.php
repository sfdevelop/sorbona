<div class="nav-author__options">
    <ul>
        <li>
            <a href="{{route('admin.profile.edit')}}">
                <img src="{{ asset('assets/img/svg/user.svg') }}" alt="user" class="svg"> Profile</a>
        </li>
        <li>
            <a href="{{route('admin.setting.edit')}}">
                <img src="{{ asset('assets/img/svg/settings.svg') }}" alt="settings" class="svg"> Settings</a>
        </li>

    </ul>
    <a href="" class="nav-author__signout" onclick="event.preventDefault();document.getElementById('logout').submit();">
        <img src="{{ asset('assets/img/svg/log-out.svg') }}" alt="log-out" class="svg">
        Sign Out</a>
    <form style="display:none;" id="logout" action="{{ route('logout') }}" method="POST">
        @csrf
        @method('post')
    </form>
</div>
