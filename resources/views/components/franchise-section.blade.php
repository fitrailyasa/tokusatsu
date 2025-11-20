<div class="text-center d-flex flex-wrap justify-content-center {{ $withBorder ? 'border-bottom pb-3' : '' }}">
    @foreach ($categories as $category)
        @if ($category->franchise && $category->franchise->name === $franchise && $category->era->name !== 'Showa')
            <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}" loading="lazy">
                <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                    alt="{{ $category->img ?? 'comingsoon' }}">

                @php
                    $episodeCount = $category->videos->where('type', 'episode')->count();
                    $movieCount = $category->videos->where('type', 'movie')->count();
                @endphp

                <p class="text-white">
                    {{ $episodeCount === 0 ? "$movieCount Movies" : "$episodeCount Episodes" }}
                </p>
            </a>
        @endif
    @endforeach
</div>
