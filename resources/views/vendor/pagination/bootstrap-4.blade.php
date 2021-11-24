@if ($paginator->hasPages())
    <nav class="d-flex flex-wrap">
        <ul class="pagination nav-tabs-scroll is-scrollable p-0 mb-0 lign-items-center d-inline-flex my-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item mr-1">
                    <a class="page-link btn btn-sm btn-bgc-tp p-25 radius-3px text-600 btn-light-grey disabled border-0">
                        <i class="fa fa-caret-left text-11s0"></i>
                    </a>
                </li>
            @else
                <li class="page-item mr-1">
                    <a class="page-link btn btn-sm btn-bgc-tp p-25 radius-3px text-600 btn-light-grey border-0" href="{{ $paginator->previousPageUrl() }}">
                    <i class="fa fa-caret-left text-11s0"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled mr-0">
                        <a class="page-link border-0 px-2" href="#">&hellip;</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item mr-15">
                                <a class="w-5 active btn p-25 btn-sm border-0 btn-bgc-tp radius-3px text-600 btn-light-black btn-h-primary btn-a-primary" style="cursor: default;">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item mr-15">
                                <a class="w-5 btn p-25 btn-sm border-0 btn-bgc-tp radius-3px text-600 btn-light-black btn-h-primary btn-a-primary" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link btn btn-sm btn-bgc-tp p-25 radius-3px text-600 btn-light-grey border-0" href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-caret-right text-11s0"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link btn btn-sm btn-bgc-tp p-25 radius-3px text-600 btn-light-grey border-0 disabled">
                        <i class="fa fa-caret-right text-11s0"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
