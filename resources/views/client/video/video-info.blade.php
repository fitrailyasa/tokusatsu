<section class="info-section">
    @php
        $titleVideo = $video->title ?? '-';
        $categoryDesc = $video->category?->description ?: $video->category?->franchise?->description ?: '-';
    @endphp

    <div class="video-title-wrapper" id="videoTitle">

        <div class="d-flex align-items-start gap-2">

            <h1 class="video-title flex-grow-1 mb-0">

                {{-- Mobile --}}
                <span class="truncate d-block d-sm-none">
                    {{ Str::words($titleVideo, 6, '...') }}
                </span>

                {{-- Tablet --}}
                <span class="truncate d-none d-sm-block d-md-none">
                    {{ Str::words($titleVideo, 10, '...') }}
                </span>

                {{-- Desktop --}}
                <span class="truncate d-none d-md-block d-lg-none">
                    {{ Str::words($titleVideo, 14, '...') }}
                </span>

                {{-- Large --}}
                <span class="truncate d-none d-lg-block">
                    {{ Str::words($titleVideo, 18, '...') }}
                </span>

                {{-- FULL --}}
                <span class="full d-none">
                    {{ $titleVideo }}
                </span>

            </h1>

            {{-- ARROW --}}
            <button class="accordion-toggle btn btn-icon p-0" aria-expanded="false" aria-label="Toggle title">
                <i data-feather="chevron-down"></i>
            </button>

        </div>

        {{-- DESCRIPTION --}}
        <p class="category-desc d-none mt-2 text-muted">
            {{ $categoryDesc }}
        </p>
    </div>

    @php
        if (!function_exists('format_number_short')) {
            function format_number_short($num)
            {
                if ($num < 1000) {
                    return $num;
                }
                if ($num < 1000000) {
                    return round($num / 1000, 1) . 'K';
                }
                if ($num < 1000000000) {
                    return round($num / 1000000, 1) . 'M';
                }
                return round($num / 1000000000, 1) . 'B';
            }
        }
    @endphp

    <div class="video-meta">
        <div class="meta-left">
            <span>{{ format_number_short($video->video_views->count()) }} views</span>
            <span>•</span>
            <span>{{ \Carbon\Carbon::parse($video->airdate ?? $video->category->first_aired)->diffForHumans() }}</span>
        </div>
    </div>

    <div class="action-bar">
        {{-- Reactions --}}
        @include('client.video.video-react')

        {{-- Share --}}
        <div class="action-item">
            @include('components.button.share')
            <span>Share</span>
        </div>

        {{-- Download --}}
        @if ($downloadTokens)
            @include('client.video.video-download')
        @endif

        {{-- Report --}}
        @include('client.video.video-report')

        {{-- Bookmark --}}
        <div class="action-item">
            @include('components.button.bookmark')
            <span>Bookmark</span>
        </div>
    </div>

    @if (count($embedUrls) > 1)
        <div class="mt-3 d-flex justify-content-center gap-3 flex-wrap">
            @foreach ($embedUrls as $index => $url)
                <button type="button"
                    class="btn btn-sm btn-outline-light server-btn {{ $index === 0 ? 'active' : '' }}"
                    data-index="{{ $index }}">
                    Server {{ $index + 1 }}
                </button>
            @endforeach
        </div>
    @endif
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const wrapper = document.getElementById("videoTitle");
        const toggleBtn = wrapper.querySelector(".accordion-toggle");

        toggleBtn.addEventListener("click", function() {
            const expanded = wrapper.classList.toggle("expanded");

            toggleBtn.setAttribute("aria-expanded", expanded);
        });

    });
</script>
