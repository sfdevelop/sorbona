@if ($paginator->hasPages())
    <div class="card-body ">
        <nav class="dm-page ">
            <ul class="dm-pagination d-flex">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    {{--                    <li class="disabled dm-pagination__item" aria-disabled="true"--}}
                    {{--                        aria-label="@lang('pagination.previous')">--}}
                    {{--                        <span aria-hidden="true">&lsaquo;</span>--}}
                    {{--                    </li>--}}
                @else

                        <a class="dm-pagination__link pagination-control" href="{{ $paginator->previousPageUrl() }}"
                           rel="prev"
                           aria-label="@lang('pagination.previous')">&lsaquo;</a>

                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled dm-pagination__item" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())


                                    <a href="" class="dm-pagination__link active">
                                        <span class="page-number">{{ $page }}</span>
                                    </a>


                            @else


                                    <a class="dm-pagination__link"
                                                                   href="{{ $url }}">{{ $page }}
                                    </a>


                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="dm-pagination__item">
                        <a class="dm-pagination__link pagination-control" href="{{ $paginator->nextPageUrl() }}"
                           rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    {{--                    <li--}}
                    {{--                            class="disabled dm-pagination__item"--}}
                    {{--                            aria-disabled="true" aria-label="@lang('pagination.next')"--}}
                    {{--                    >--}}
                    {{--                        <a class="dm-pagination__link pagination-control" aria-hidden="true">&rsaquo;</a>--}}
                    {{--                    </li>--}}
                @endif
            </ul>
        </nav>
    </div>
@endif
