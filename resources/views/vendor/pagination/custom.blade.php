@if ($paginator->hasPages())
    <div class="pagination__wrap">
        <ul class="list-wrap d-flex flex-wrap justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <a href="#" class="page-numbers disabled">&lsaquo;</a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-numbers">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <span class="page-numbers disabled">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="page-numbers current">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="page-numbers">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span class="page-numbers disabled">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
