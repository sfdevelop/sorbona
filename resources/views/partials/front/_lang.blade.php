<ul class="header__languege">
    <li class="header__languege-child">
        <span>{{Str::lower(app()->getLocale())== 'uk' ? 'Ua' : Str::lower(app()->getLocale())}}</span>
        <div class="header__languege-dropdown-wrap">
            <ul class="header__languege-dropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ Str::ucfirst(Str::lower($properties['native']) )}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
</ul>


{{--<ul class="header__languege">--}}
{{--    <li class="header__languege-child">--}}
{{--        <span>En</span>--}}
{{--        <div class="header__languege-dropdown-wrap">--}}
{{--            <ul class="header__languege-dropdown">--}}
{{--                <li>--}}
{{--                    <a href="#">En</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">LT</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--</ul>--}}