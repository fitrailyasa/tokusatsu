@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center flex-wrap">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">‹</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a>
                </li>
            @endif

            {{-- First page --}}
            <li class="page-item {{ $paginator->currentPage() == 1 ? 'active' : '' }}">
                <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
            </li>

            {{-- Left dots --}}
            @if ($paginator->currentPage() > 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Current page (middle) --}}
            @if ($paginator->currentPage() != 1 && $paginator->currentPage() != $paginator->lastPage())
                <li class="page-item active">
                    <span class="page-link">{{ $paginator->currentPage() }}</span>
                </li>
            @endif

            {{-- Right dots --}}
            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            {{-- Last page (only if > 1) --}}
            @if ($paginator->lastPage() > 1)
                <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">
                        {{ $paginator->lastPage() }}
                    </a>
                </li>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">›</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">›</span></li>
            @endif

        </ul>
    </nav>
@endif
