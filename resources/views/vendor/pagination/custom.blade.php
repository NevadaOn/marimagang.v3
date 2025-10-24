@if ($paginator->hasPages())
    <ul class="pagination-custom">
        {{-- Tombol Previous --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">‹</li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a></li>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">{{ $page }}</li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">›</a></li>
        @else
            <li class="disabled">›</li>
        @endif
    </ul>
@endif
