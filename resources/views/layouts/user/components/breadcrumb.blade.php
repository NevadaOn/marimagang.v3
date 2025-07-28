<div class="breadcrumb mb-24">
    <ul class="flex-align gap-4">
        <li>
            <a href="{{ route('dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a>
        </li>

        @foreach ($items as $index => $item)
            <li>
                <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span>
            </li>
            <li>
                @if (!empty($item['url']) && $index < count($items) - 1)
                    {{-- Breadcrumb dengan link --}}
                    <a href="{{ $item['url'] }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">
                        {{ $item['label'] }}
                    </a>
                @else
                    {{-- Breadcrumb terakhir: aktif --}}
                    <span class="text-main-600 fw-normal text-15">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ul>
</div>
