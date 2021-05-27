@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="paginate_button page-item previous disabled"
                id="example1_previous">
                <a href="#" aria-controls="example1"
                    data-dt-idx="0" tabindex="0" class="page-link">{{ __('pagination.previous') }}
                </a>
            </li>
        @else
            <li class="paginate_button page-item previous"
                id="example1_previous">
                <a href="{{ $paginator->previousPageUrl() }}" aria-controls="example1"
                    data-dt-idx="0" tabindex="0" class="page-link">{{ __('pagination.previous') }}
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
        {{--{{dd($paginator)}}--}}
        {{--{{dd($elements)}}--}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button page-item active">
                            <span aria-controls="example1" data-dt-idx="1" tabindex="0"
                                class="page-link">{{ $page }}
                            </span>
                        </li>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 1) || $page == $paginator->lastPage())
                        <li class="paginate_button page-item">
                            <a href="{{ $url }}" aria-controls="example1" data-dt-idx="1" tabindex="0"
                                class="page-link">{{ $page }}
                            </a>
                        </li>
                    @elseif (($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 1) || $page == $paginator->lastPage())
                        <li class="paginate_button page-item">
                            <a href="{{ $url }}" aria-controls="example1" data-dt-idx="1" tabindex="0"
                                class="page-link">{{ $page }}
                            </a>
                        </li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ '...' }}</span></li>
                    @elseif($page == 2 && $paginator->currentPage() >= 4)
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ '...' }}</span></li>
                    @elseif($page == 1 )
                        <li class="paginate_button page-item">
                            <a href="{{ $url }}" aria-controls="example1" data-dt-idx="1" tabindex="0"
                                class="page-link">{{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paginate_button page-item next" id="example1_next">
                    <a href="{{ $paginator->nextPageUrl() }}" aria-controls="example1" data-dt-idx="7" tabindex="0"
                    class="page-link">{{ __('pagination.next') }}
                </a>
            </li>
        @else
            <li class="paginate_button page-item next disabled" id="example1_next">
                <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0"
                    class="page-link">{{ __('pagination.next') }}
                </a>
            </li>
        @endif
    </ul>
@endif
