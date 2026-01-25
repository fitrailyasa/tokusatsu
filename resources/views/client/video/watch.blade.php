@extends('layouts.client.app')

@section('title')
    {{ $title }}
@endsection

@section('description')
    {{ $category->description }}
@endsection

@section('image')
    {{ $video->category->img ? config('app.url') . '/storage/' . $video->category->img : config('app.url') . '/logo.png' }}
@endsection

@section('textvideo', 'rounded aktif')

@section('content')
    <script type="application/ld+json">
        {!! json_encode([
            "@context"    => "https://schema.org",
            "@type"       => "VideoObject",
            "name"        => $title . ' - ' . config('app.name'),
            "description" => $category->description ?: config('app.name'),
            "thumbnailUrl" => $video->category->img
                                ? config('app.url') . "/storage/" . $video->category->img
                                : config('app.url') . "/logo.png",
            "uploadDate"  => optional($video->airdate)
                                ? \Carbon\Carbon::parse($video->airdate)->toIso8601String()
                                : \Carbon\Carbon::parse($video->category->first_aired)->toIso8601String(),
            "contentUrl"  => url()->current(), 
            "genre"       => $category->fullname,
            "publisher"   => [
                "@type" => "Organization",
                "name"  => config('app.name'),
                "logo"  => [
                    "@type" => "ImageObject",
                    "url"   => config('app.url') . "/logo.png",
                ],
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <style>
        .no-click-overlay {
            position: absolute;
            width: 100%;
            height: 70px;
            cursor: default;
            z-index: 10;
        }
    </style>

    <div class="container my-2 py-5">
        <div class="row">
            <div class="col-12">

                <div class="ratio ratio-16x9 rounded overflow-hidden bg-dark position-relative">
                    <div class="no-click-overlay"></div>
                    <div id="fsOverlay" class="position-absolute top-0 start-0 w-100 h-100"
                        style="z-index: 5; cursor: pointer;">
                    </div>
                    @php
                        use Carbon\Carbon;

                        $isComingSoon = $video->airdate && Carbon::parse($video->airdate)->isFuture();
                    @endphp

                    @if ($isComingSoon)
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center bg-dark text-white"
                            style="z-index: 10;">
                            <i class="fas fa-clock fa-3x mb-3"></i>
                            <h5 class="mb-1">Coming Soon</h5>
                            <small>
                                Airs on {{ Carbon::parse($video->airdate)->format('d M Y') }}
                            </small>
                        </div>
                    @elseif ($embedUrls->isEmpty())
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-center bg-secondary text-white"
                            style="z-index: 10;">
                            <i class="fas fa-video-slash fa-3x mb-3"></i>
                            <h5 class="mb-0">Video is not available or has been removed.</h5>
                        </div>
                    @endif

                    <iframe id="video-iframe" class="w-100 h-100 d-none border-0" allow="autoplay; fullscreen"
                        allowfullscreen>
                    </iframe>

                    <video id="video-video" class="w-100 h-100 d-none" controls controlsList="nodownload" playsinline>
                        <source id="video-source" src="">
                        Your browser does not support video.
                    </video>

                </div>

            </div>
        </div>

        {{-- Info Section --}}
        @include('client.video.video-info')

        <section class="channel-section">
            @if ($video->type == 'episode')
                <a href="{{ $category->showUrl() }}" class="channel-info">
                @else
                    <a href="{{ $category->showUrl() }}/movie" class="channel-info">
            @endif
            <div class="channel-avatar">
                <img src="{{ $video->category->img ? asset('storage/' . $video->category->img) : asset('logo.png') }}"
                    alt="{{ $video->category->name }}">
            </div>
            <div class="channel-text">
                <h4>{{ $video->category->fullname }}</h4>
                <span>
                    @if ($video->type == 'episode')
                        Series
                    @else
                        {{ $video->label }}
                    @endif
                </span>
            </div>
            </a>
        </section>

        @if (count($episodes) > 1)
            <section class="episodes-section">
                <div class="section-header">
                    <span class="fw-bold">{{ ucwords($video->type) }}</span>
                    <span class="section-more">({{ $episodes->count() }})</span>
                </div>

                @if ($episodes->count())
                    <div class="episode-scroll">
                        @foreach ($episodes as $ep)
                            <a href="{{ route('video.watch', [
                                'franchise' => $franchise->slug,
                                'category' => $category->slug,
                                'type' => $ep->type,
                                'number' => $ep->number,
                            ]) }}"
                                class="episode-btn {{ $ep->id === $video->id ? 'active' : '' }}">
                                {{ $ep->number }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </section>
        @endif

        @include('client.video.video-comment')
    </div>

    {{-- Episode Scroll --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const scroll = document.querySelector(".episode-scroll");
            if (!scroll) return;

            if (scroll.scrollWidth <= scroll.clientWidth) {
                scroll.classList.add("centered");
            }

            const active = scroll.querySelector(".episode-btn.active");
            if (active) {
                active.scrollIntoView({
                    inline: "center",
                    block: "nearest"
                });
            }
        });
    </script>

    {{-- Media Player --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const servers = @json($embedUrls);

            const iframe = document.getElementById("video-iframe");
            const video = document.getElementById("video-video");
            const source = document.getElementById("video-source");
            const overlay = document.getElementById("fsOverlay");

            function resetPlayer() {
                iframe.classList.add("d-none");
                video.classList.add("d-none");
                overlay.style.display = "none";
                iframe.src = "";
                video.pause();
                source.src = "";
            }

            function loadServer(index) {
                resetPlayer();

                const url = servers[index];
                if (!url) return;

                if (url.includes("embed") || url.includes("preview")) {
                    iframe.src = url;
                    iframe.classList.remove("d-none");
                    overlay.style.display = "block";
                } else {
                    source.src = url;
                    video.load();
                    video.classList.remove("d-none");
                }

                document.querySelectorAll(".server-btn")
                    .forEach(btn => btn.classList.remove("active"));

                document.querySelector(`.server-btn[data-index='${index}']`)
                    ?.classList.add("active");
            }

            loadServer(0);

            document.querySelectorAll(".server-btn").forEach(btn => {
                btn.addEventListener("click", () => {
                    loadServer(btn.dataset.index);
                });
            });

            video.addEventListener("play", () => {
                if (!document.fullscreenElement) {
                    video.requestFullscreen().catch(() => {});
                }
            });

            overlay.addEventListener("click", () => {
                if (!document.fullscreenElement) {
                    iframe.requestFullscreen().catch(() => {});
                }
            });

            document.addEventListener("fullscreenchange", async () => {
                if (document.fullscreenElement) {
                    try {
                        await screen.orientation.lock("landscape");
                    } catch (e) {}
                } else {
                    screen.orientation.unlock?.();
                }
            });

        });
    </script>

    {{-- Watch History --}}
    @include('components.watch-history')

    {{-- Disable Right Click --}}
    @include('components.disable-right-click')

@endsection
