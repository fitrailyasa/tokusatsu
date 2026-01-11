@extends('layouts.client.app')

@section('title')
    {{ $title }}
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

        .episode-wrapper {
            overflow: hidden;
        }

        .episode-scroll {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 10px 5px;
            scrollbar-width: none;
            scroll-behavior: auto;
        }

        .episode-scroll::-webkit-scrollbar {
            display: none;
        }

        .episode-scroll.centered {
            justify-content: center;
        }

        .episode-btn {
            min-width: 44px;
            padding: 8px 14px;
            border-radius: 999px;
            background: #e0e0e0;
            color: #333;
            text-align: center;
            font-weight: 500;
            white-space: nowrap;
            transition: all .2s ease;
        }

        .episode-btn:hover {
            background: #cfcfcf;
        }

        .episode-btn.active {
            background: #111;
            color: #fff;
        }
    </style>

    <div class="container my-5 py-4">
        <div class="container">
            <div class="row mb-3 align-items-center">
                <div class="col-3 text-left">
                    <a href="{{ $category->showUrl() }}">
                        <p class="m-0"><i data-feather="arrow-left"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h1 class="text-center responsive-title">
                        {{ $title }}
                    </h1>
                </div>
                <div class="col-3 text-right">
                    <span class="me-md-2">
                        @include('components.button.download')
                    </span>
                    <span class="me-md-2">
                        @include('components.button.share')
                    </span>
                    <span>
                        @include('components.button.video-report')
                    </span>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">

                <div class="ratio ratio-16x9 rounded overflow-hidden bg-dark mb-4 position-relative">
                    <div class="no-click-overlay"></div>
                    <div id="fsOverlay" class="position-absolute top-0 start-0 w-100 h-100"
                        style="z-index: 5; cursor: pointer;">
                    </div>

                    @if ($embedUrls->isEmpty())
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

                @if (count($embedUrls) > 1)
                    <div class="mb-3 d-flex justify-content-center gap-3 flex-wrap">
                        @foreach ($embedUrls as $index => $url)
                            <button type="button"
                                class="btn btn-sm btn-outline-light server-btn {{ $index === 0 ? 'active' : '' }}"
                                data-index="{{ $index }}">
                                Server {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                @endif

                @if ($episodes->count())
                    <div class="episode-wrapper mb-4">
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
                    </div>
                @endif

            </div>
        </div>
    </div>

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
                    block: "nearest",
                    behavior: "auto",
                });
            }
        });
    </script>

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
