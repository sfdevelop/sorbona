<div class="lang">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a
                rel="alternate"
                @class(['lang-item', 'active' => $localeCode == app()->getLocale()])
                hreflang="{{ $localeCode }}"
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
        >
            {{ Str::upper($properties['native']) }}
        </a>
    @endforeach
</div>