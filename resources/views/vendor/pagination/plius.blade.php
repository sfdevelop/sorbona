@if ($paginator->hasPages())
    <div class="pagination">
        <ul class="pagination__list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
{{--                <li class="end"  aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                    <a href="">--}}
{{--                                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                        <path--}}
{{--                                                                d="M5.00003 5.33333C4.92326 5.33377 4.84715 5.31906 4.77608 5.29003C4.70501 5.261 4.64037 5.21823 4.58586 5.16416L1.08586 1.66416C0.976016 1.55432 0.914307 1.40534 0.914307 1.25C0.914307 1.09465 0.976016 0.945673 1.08586 0.83583C1.1957 0.725986 1.34468 0.664276 1.50003 0.664276C1.65537 0.664276 1.80435 0.725986 1.91419 0.83583L5.00003 3.9275L8.08586 0.841663C8.19745 0.746098 8.341 0.696161 8.48781 0.701831C8.63462 0.707502 8.77388 0.768363 8.87777 0.872251C8.98166 0.97614 9.04252 1.1154 9.04819 1.26222C9.05386 1.40903 9.00393 1.55257 8.90836 1.66416L5.40836 5.16416C5.29971 5.27193 5.15306 5.33269 5.00003 5.33333Z"--}}
{{--                                                                fill="#2B2A29" />--}}
{{--                                                    </svg>--}}
{{--                    </a>--}}
{{--                </li>--}}
            @else
                <li class="page-item">
                    <a
                        class="pagination__btn-prev"
                        href="{{ $paginator->previousPageUrl() }}"
                        rel="prev"
                        aria-label="@lang('pagination.previous')"
                    >
                                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M5.00003 5.33333C4.92326 5.33377 4.84715 5.31906 4.77608 5.29003C4.70501 5.261 4.64037 5.21823 4.58586 5.16416L1.08586 1.66416C0.976016 1.55432 0.914307 1.40534 0.914307 1.25C0.914307 1.09465 0.976016 0.945673 1.08586 0.83583C1.1957 0.725986 1.34468 0.664276 1.50003 0.664276C1.65537 0.664276 1.80435 0.725986 1.91419 0.83583L5.00003 3.9275L8.08586 0.841663C8.19745 0.746098 8.341 0.696161 8.48781 0.701831C8.63462 0.707502 8.77388 0.768363 8.87777 0.872251C8.98166 0.97614 9.04252 1.1154 9.04819 1.26222C9.05386 1.40903 9.00393 1.55257 8.90836 1.66416L5.40836 5.16416C5.29971 5.27193 5.15306 5.33269 5.00003 5.33333Z"
                                                                fill="#2B2A29" />
                                                    </svg>
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
                                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M5.00003 5.33333C4.92326 5.33377 4.84715 5.31906 4.77608 5.29003C4.70501 5.261 4.64037 5.21823 4.58586 5.16416L1.08586 1.66416C0.976016 1.55432 0.914307 1.40534 0.914307 1.25C0.914307 1.09465 0.976016 0.945673 1.08586 0.83583C1.1957 0.725986 1.34468 0.664276 1.50003 0.664276C1.65537 0.664276 1.80435 0.725986 1.91419 0.83583L5.00003 3.9275L8.08586 0.841663C8.19745 0.746098 8.341 0.696161 8.48781 0.701831C8.63462 0.707502 8.77388 0.768363 8.87777 0.872251C8.98166 0.97614 9.04252 1.1154 9.04819 1.26222C9.05386 1.40903 9.00393 1.55257 8.90836 1.66416L5.40836 5.16416C5.29971 5.27193 5.15306 5.33269 5.00003 5.33333Z"
                                                                fill="#2B2A29" />
                                                    </svg>
                    </a>
                </li>
            @else
{{--                <li aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                    <a--}}
{{--                        class="pagination__btn-next end"--}}
{{--                    >--}}
{{--                        <img src="{{asset('front/images/dest/icons/arrow-slider-dark.svg')}}" alt="icon">--}}
{{--                    </a>--}}
{{--                </li>--}}
            @endif
        </ul>
    </div>
@endif
