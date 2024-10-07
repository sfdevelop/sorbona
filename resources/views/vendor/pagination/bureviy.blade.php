@if ($paginator->hasPages())
    <div class="pagination">
        <ul class="pagination__list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="end"  aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="">
                    <img src="{{asset('front/images/dest/icons/arrow-slider-dark.svg')}}" alt="icon">
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a
                        class="pagination__btn-prev"
                        href="{{ $paginator->previousPageUrl() }}"
                        rel="prev"
                        aria-label="@lang('pagination.previous')"
                    >
                        <img src="{{asset('front/images/dest/icons/arrow-slider-dark.svg')}}" alt="icon">
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li
                                class=""
                                aria-current="page"
                            >
                                <span class="active">{{ $page }}</span>
                            </li>
                        @else
                            <li class="">
                                <a class="" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="">
                    <a
                        class="pagination__btn-next"
                        href="{{ $paginator->nextPageUrl() }}"
                        rel="next"
                        aria-label="@lang('pagination.next')"
                    >
                        <img src="{{asset('front/images/dest/icons/arrow-slider-dark.svg')}}" alt="icon">
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a
                        class="pagination__btn-next end"
                    >
                        <img src="{{asset('front/images/dest/icons/arrow-slider-dark.svg')}}" alt="icon">
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
