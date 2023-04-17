@if ($paginator->hasPages())
    <div class="btn-group">
        {{-- Tombol "Sebelumnya" --}}
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-sm">«</a>
        @endif

        {{-- Tombol halaman --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="#" class="btn btn-sm btn-disabled"><span>{{ $element }}</span></a>
            @endif

            {{-- Tombol halaman aktif --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="btn btn-sm btn-active" aria-current="page"><span>{{ $page }}</span></a>
                    @else
                        <a class="btn btn-sm" href="{{ $url }}"><span>{{ $page }}</span></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol "Selanjutnya" --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-sm">»</a>
        @endif
    </div>
@endif
