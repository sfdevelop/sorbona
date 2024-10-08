@if ($paginator->hasPages())
    <div class="pagination">
        <ul class="pagination__list">

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li
                        class="disabled"
                        aria-disabled="true"
                    >
                        <span>{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li class=" active">
                                <a
                                    href=""

                                >
                                        <span class="page-number">
                                            {{ $page }}
                                        </span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a
                                    class=""
                                    href="{{ $url }}"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>
@endif
