@extends('layouts.client.app')

@section('title', 'Video')

@section('textvideo', 'rounded aktif')

@section('content')
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
            <div class="row px-3 mb-3">
                <div class="col-3 text-left d-flex align-items-center">
                    <a
                        href="{{ route('video.show', [
                            'franchise' => $category->franchise->slug,
                            'category' => $category->slug,
                        ]) }}">
                        <p class="m-0"><i class="text-dark fas fa-arrow-left"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h4 class="text-center responsive-title">
                        {{ $category->fullname }} {{ ucfirst($video->type) }} {{ $video->number }}
                    </h4>
                </div>

                <div class="col-3 text-right"></div>
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
                            <a href="{{ route('video.slug', $prev->slug) }}" class="btn btn-dark px-4 py-2">
                                <i class="fas fa-arrow-left me-2"></i>
                                Prev
                            </a>
                        @endif
                        @if ($next)
                            <a href="{{ route('video.slug', $next->slug) }}" class="btn btn-dark px-4 py-2">
                                Next
                                <i class="fas fa-arrow-right ms-2"></i>
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
                    window.location.href = "{{ route('video.slug', $next->slug) }}";
                };
            }
        @endif
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let watchHistory = JSON.parse(localStorage.getItem("watchHistory")) || [];

            const title = "{{ $category->fullname }} {{ ucfirst($video->type) }} {{ $video->number }}";
            const url = window.location.href;
            const time = new Date().toLocaleString();

            if (!watchHistory.find(item => item.url === url)) {
                watchHistory.unshift({
                    title,
                    url,
                    time
                });

                if (watchHistory.length > 20)
                    watchHistory = watchHistory.slice(0, 20);

                localStorage.setItem("watchHistory", JSON.stringify(watchHistory));
            }
        });
    </script>
    <script>
        document.addEventListener("contextmenu", e => e.preventDefault());
        document.addEventListener("keydown", e => {
            if (
                e.key === "F12" ||
                (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "J")) ||
                (e.ctrlKey && e.key === "U")
            ) {
                e.preventDefault();
            }
        });
    </script>
@endsection
