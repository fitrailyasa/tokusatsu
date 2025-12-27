@extends('layouts.client.app')

@section('title', $category->fullname . ' ' . ucfirst($video->type) . ' ' . $video->number)

@section('textvideo', 'rounded aktif')

@section('content')
    <script type="application/ld+json">
    {!! json_encode([
        "@context"    => "https://schema.org",
        "@type"       => "VideoObject",
        "name"        => $category->fullname . ' ' . ucfirst($video->type) . ' ' . $video->number . ' - ' . config('app.name'),
        "description" => $category->description ?: config('app.name'),
        "thumbnailUrl"=> config('app.url') . "/storage/" . $video->category->img ?: config('app.url') . "/logo.png",
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
            z-index: 5;
        }
    </style>
    <div class="container my-5 py-4">
        <div class="container">
            <div class="row px-3 mb-3 align-items-center">
                <div class="col-3 text-left">
                    @if ($video->type == 'episode')
                        <a
                            href="{{ route('video.show', ['franchise' => $category->franchise->slug, 'category' => $category->slug]) }}">
                            <p class="m-0"><i class="text-dark fas fa-arrow-left"></i></p>
                        </a>
                    @else
                        <a href="{{ route('video.movie', ['franchise' => $category->franchise->slug]) }}">
                            <p class="m-0"><i class="text-dark fas fa-arrow-left"></i></p>
                        </a>
                    @endif
                </div>
                <div class="col-6">
                    <h1 class="text-center responsive-title">
                        @if ($video->type == 'episode')
                            {{ $category->fullname }} {{ ucfirst($video->type) }}
                            {{ $video->number }}
                        @else
                            {{ $video->title }}
                        @endif
                    </h1>
                </div>
                <div class="col-3 text-right">
                    <button id="shareBtn" class="btn m-0 p-0">
                        <i class="fa fa-share"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">

                <div class="ratio ratio-16x9 rounded overflow-hidden bg-dark mb-4">
                    <div class="no-click-overlay"></div>

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

                    <video id="video-video" class="w-100 h-100 d-none" controls controlsList="nodownload">
                        <source id="video-source" src="">
                        Your browser does not support video.
                    </video>

                </div>

                @if (count($embedUrls) > 1)
                    <div class="mb-3 d-flex justify-content-center gap-3 flex-wrap">
                        @foreach ($embedUrls as $index => $url)
                            <button type="button"
                                class="btn btn-sm btn-outline-dark server-btn {{ $index === 0 ? 'active' : '' }}"
                                data-index="{{ $index }}">
                                Server {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                @endif

                <div class="d-flex justify-content-center gap-3 mb-3">
                    @if ($prev)
                        <a href="{{ route('video.watch', [
                            'franchise' => $category->franchise->slug,
                            'category' => $category->slug,
                            'type' => $prev->type,
                            'number' => $prev->number,
                        ]) }}"
                            class="btn btn-sm btn-outline-dark">
                            <i class="fas fa-arrow-left me-1"></i> Prev
                        </a>
                    @endif

                    @if ($next)
                        <a href="{{ route('video.watch', [
                            'franchise' => $category->franchise->slug,
                            'category' => $category->slug,
                            'type' => $next->type,
                            'number' => $next->number,
                        ]) }}"
                            class="btn btn-sm btn-outline-dark">
                            Next <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const servers = @json($embedUrls);
            const iframe = document.getElementById("video-iframe");
            const video = document.getElementById("video-video");
            const source = document.getElementById("video-source");

            function resetPlayer() {
                iframe.classList.add("d-none");
                video.classList.add("d-none");
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
                } else {
                    source.src = url;
                    video.load();
                    video.classList.remove("d-none");
                }

                document.querySelectorAll(".server-btn").forEach(btn => btn.classList.remove("active"));
                document.querySelector(`.server-btn[data-index='${index}']`)?.classList.add("active");
            }

            loadServer(0);

            document.querySelectorAll(".server-btn").forEach(btn => {
                btn.addEventListener("click", function() {
                    loadServer(this.dataset.index);
                });
            });

            @if ($next)
                video.addEventListener("ended", function() {
                    window.location.href =
                        "{{ route('video.watch', [
                            'franchise' => $category->franchise->slug,
                            'category' => $category->slug,
                            'type' => $next->type,
                            'number' => $next->number,
                        ]) }}";
                });
            @endif

            const video = document.getElementById('video-video') || document.getElementById('video-iframe');
            if (video) {
                video.addEventListener("contextmenu", function(e) {
                    e.preventDefault();
                });
            }
        });
    </script>
    <script>
        document.getElementById("shareBtn").addEventListener("click", async function() {
            const shareData = {
                title: document.title,
                text: "{{ $category->fullname }} {{ ucwords($video->type) }} {{ $video->number }}\n",
                url: window.location.href
            };

            if (navigator.share) {
                await navigator.share(shareData);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // === Watch History ===
            let watchHistory = JSON.parse(localStorage.getItem("watchHistory")) || [];
            const videoTitle =
                "{{ $category->fullname }} {{ ucfirst($video->type) }} {{ $video->number }}";
            const videoUrl = window.location.href;
            const currentTime = new Date().toLocaleString();

            const exists = watchHistory.find(item => item.url === videoUrl);
            if (!exists) {
                watchHistory.unshift({
                    title: videoTitle,
                    url: videoUrl,
                    time: currentTime
                });
                if (watchHistory.length > 20) watchHistory = watchHistory.slice(0, 20);
                localStorage.setItem("watchHistory", JSON.stringify(watchHistory));
            }
        });
    </script>
    <script>
        document.addEventListener("fullscreenchange", async () => {
            if (document.fullscreenElement) {
                try {
                    if (screen.orientation && screen.orientation.lock) {
                        await screen.orientation.lock("landscape");
                    }
                } catch (err) {
                    console.log("Orientation lock failed:", err);
                }
            } else {
                if (screen.orientation && screen.orientation.unlock) {
                    screen.orientation.unlock();
                }
            }
        });
    </script>
    @include('components.disable-right-click')
@endsection
