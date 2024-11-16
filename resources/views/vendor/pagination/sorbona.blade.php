@if ($paginator->hasPages())
    <div class="product__pagination pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="pagination__arrow pagination__arrow--prev end"  aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use></svg>
                </a>
            @else
                    <a
                        class="pagination__arrow pagination__arrow--prev"
                        href="{{ $paginator->previousPageUrl() }}"
                        rel="prev"
                        aria-label="@lang('pagination.previous')"
                    >
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use></svg>
                    </a>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="pagination__item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a
                                class="pagination__item active"
                                aria-current="page"
                            >
                                {{ $page }}
                            </a>
                        @else

                                <a class="pagination__item" href="{{ $url }}">{{ $page }}</a>

                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                    <a
                        class="pagination__arrow pagination__arrow--next"
                        href="{{ $paginator->nextPageUrl() }}"
                        rel="next"
                        aria-label="@lang('pagination.next')"
                    >
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use></svg>
                    </a>

            @else
                <a
                        class="pagination__arrow pagination__arrow--next end"
                        aria-disabled="true"
                        aria-label="@lang('pagination.next')"
                >
                        <svg><use xlink:href="{{asset('front/img/icons/icons.svg#icon-label-open')}}"></use></svg>
                </a>
            @endif

    </div>
@endif
