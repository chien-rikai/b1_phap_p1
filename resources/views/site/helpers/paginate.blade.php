<nav class="numbering">
    <ul class="pagination paging">
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <span>{{ $page }}</span>
                        </li>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 1) || $page == $paginator->lastPage())
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif (($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 1) || $page == $paginator->lastPage())
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li class="disabled"><span>{{ '...' }}</span></li>
                    @elseif($page == 2 && $paginator->currentPage() >= 4)
                        <li class="disabled"><span>{{ '...' }}</span></li>
                    @elseif($page == 1 )
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        @else
            <li class="disabled">
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
