@extends('layouts.client.app')

@section('title', 'Film')

@section('content')
    <div class="container my-5 py-4">
        <div class="container">
            <div class="row px-3 mb-3">
                <div class="col-3 text-left d-flex align-items-center">
                    <a
                        href="{{ route('film.show', ['franchise' => $category->franchise->slug, 'category' => $category->slug]) }}">
                        <p class="m-0"><i class="text-white fas fa-arrow-left"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h4 class="text-center responsive-title">
                        {{ $category->franchise->name }} {{ $category->name }} {{ ucfirst($film->type) }}
                        {{ $film->number }}
                    </h4>
                </div>
                <div class="col-3 text-right">
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="ratio ratio-16x9">
                    @if (strpos($embedUrl, 'embed') !== false || strpos($embedUrl, 'preview') !== false)
                        <iframe src="{{ $embedUrl }}" allow="autoplay" allowfullscreen></iframe>
                    @else
                        <video controls class="w-100 h-100">
                            <source src="{{ $embedUrl }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let watchHistory = JSON.parse(localStorage.getItem("watchHistory")) || [];

            const filmTitle =
                "{{ $category->franchise->name }} {{ $category->name }} {{ ucfirst($film->type) }} {{ $film->number }}";
            const filmUrl = window.location.href;
            const currentTime = new Date().toLocaleString();


            const exists = watchHistory.find(item => item.url === filmUrl);
            if (!exists) {
                const newEntry = {
                    title: filmTitle,
                    url: filmUrl,
                    time: currentTime
                };
                watchHistory.unshift(newEntry);
                if (watchHistory.length > 20) {
                    watchHistory = watchHistory.slice(0, 20);
                }
                localStorage.setItem("watchHistory", JSON.stringify(watchHistory));
            }
        });
    </script>
@endsection
