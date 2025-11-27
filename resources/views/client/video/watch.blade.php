@extends('layouts.client.app')

@section('title', 'Video')

@section('textvideo', 'rounded aktif')

@section('content')
    <style>
        .no-click-overlay {
            position: absolute;
            /* margin-top: 10px; */
            /* margin-right: 10px; */
            width: 100%;
            height: 70px;
            cursor: default;
            z-index: 5;
            /* background: #fff; */
        }
    </style>
    <div class="container my-5 py-4">
        <div class="container">
            <div class="row px-3 mb-3">
                <div class="col-3 text-left d-flex align-items-center">
                    <a
                        href="{{ route('video.show', ['franchise' => $category->franchise->slug, 'category' => $category->slug]) }}">
                        <p class="m-0"><i class="text-white fas fa-arrow-left"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h4 class="text-center responsive-title">
                        {{ $category->fullname }} {{ ucfirst($video->type) }}
                        {{ $video->number }}
                    </h4>
                </div>
                <div class="col-3 text-right">
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="ratio ratio-16x9">
                    <div class="d-flex justify-content-end">
                        <div class="no-click-overlay"></div>
                    </div>
                    @if (strpos($embedUrl, 'embed') !== false || strpos($embedUrl, 'preview') !== false)
                        <iframe id="video-iframe" src="{{ $embedUrl }}" allow="autoplay" allowfullscreen
                            class="w-100 h-100"></iframe>
                    @else
                        <video id="video-video" controls class="w-100 h-100">
                            <source src="{{ $embedUrl }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>
                    @endif
                </div>
                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center gap-3">
                        @if ($prev)
                            <a href="{{ route('video.watch', [
                                'franchise' => $category->franchise->slug,
                                'category' => $category->slug,
                                'type' => $prev->type,
                                'number' => $prev->number,
                            ]) }}"
                                class="btn btn-primary px-4 py-2">
                                <i class="text-white fas fa-arrow-left me-2"></i>
                                Prev
                            </a>
                        @endif
                        @if ($next)
                            <a href="{{ route('video.watch', [
                                'franchise' => $category->franchise->slug,
                                'category' => $category->slug,
                                'type' => $next->type,
                                'number' => $next->number,
                            ]) }}"
                                class="btn btn-primary px-4 py-2">
                                Next
                                <i class="text-white fas fa-arrow-right ms-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const vid = document.getElementById("video-video");
        @if ($next)
            if (vid) {
                vid.onended = function() {
                    window.location.href =
                        "{{ route('video.watch', [
                            'franchise' => $category->franchise->slug,
                            'category' => $category->slug,
                            'type' => $next->type,
                            'number' => $next->number,
                        ]) }}";
                };
            }
        @endif
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

            // === Fullscreen & Landscape for Mobile ===
            const video = document.getElementById('video-video') || document.getElementById('video-iframe');

            if (video) {
                // Event fullscreen change
                video.addEventListener('fullscreenchange', async () => {
                    if (document.fullscreenElement) {
                        try {
                            if (screen.orientation && screen.orientation.lock) {
                                await screen.orientation.lock('landscape');
                            }
                        } catch (err) {
                            console.log('Orientation lock failed:', err);
                        }
                    } else {
                        if (screen.orientation && screen.orientation.unlock) {
                            screen.orientation.unlock();
                        }
                    }
                });

                // iOS Safari workaround
                video.addEventListener('webkitbeginfullscreen', () => {
                    console.log('iOS fullscreen triggered (manual landscape)');
                });
            }
        });
    </script>
    <script>
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        });

        document.addEventListener("keydown", function(e) {
            if (e.key === "F12" ||
                (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "J")) ||
                (e.ctrlKey && e.key === "U")) {
                e.preventDefault();
            }
        });

        const video = document.getElementById('video-video') || document.getElementById('video-iframe');
        if (video) {
            video.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            });
        }
    </script>
@endsection
