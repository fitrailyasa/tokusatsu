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

        .episode-scroll {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 10px 5px;
            scrollbar-width: none;
        }

        .episode-scroll::-webkit-scrollbar {
            display: none;
        }

        .episode-scroll.centered {
            justify-content: center;
        }

        .episode-btn {
            flex: 0 0 auto;
            width: 49px;
            height: 49px;
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-main);
            position: relative;
        }

        .episode-btn:hover {
            background: #cfcfcf;
        }

        .episode-btn.active {
            background: #260751;
            color: #fff;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        .app-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            background: var(--card-bg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            z-index: 1000;
            border-bottom: 1px solid var(--border-color);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-btn {
            font-size: 1.2rem;
        }

        .header-title {
            font-weight: 600;
            font-size: 1rem;
        }

        .header-right {
            display: flex;
            gap: 18px;
            color: var(--text-sec);
        }

        .header-right i {
            font-size: 1.1rem;
            cursor: pointer;
        }

        .video-container {
            width: 100%;
            background: #000;
            position: relative;
            padding-top: 56.25%;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .info-section {
            padding: 16px;
            background: var(--card-bg);
            margin-bottom: 8px;
        }

        .video-title {
            font-size: 1.1rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .video-meta {
            font-size: 0.8rem;
            color: var(--text-sec);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .meta-left span {
            margin-right: 8px;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            color: var(--text-sec);
            font-size: 0.75rem;
            cursor: pointer;
        }

        .action-item i {
            font-size: 1.2rem;
            margin-bottom: 2px;
        }

        .action-item.active {
            color: var(--primary);
        }

        .channel-section {
            padding: 12px 16px;
            background: var(--card-bg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 8px;
        }

        .channel-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .channel-avatar {
            width: 50px;
            height: 50px;
            background: #ddd;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .channel-avatar img {
            width: 95%;
            height: 95%;
            object-fit: contain;
        }

        .channel-text h4 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .channel-text span {
            font-size: 0.75rem;
            color: var(--text-sec);
        }

        .btn-subscribe {
            background: var(--primary);
            color: white;
            border: none;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .episodes-section {
            padding: 16px;
            background: var(--card-bg);
            margin-bottom: 8px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 600;
        }

        .section-more {
            font-size: 0.85rem;
            color: var(--text-sec);
        }

        .comments-section {
            padding: 16px;
            background: var(--card-bg);
        }

        .comment-input-area {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .user-mini-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #444;
        }

        .video-title-wrapper.expanded .truncate {
            display: none !important;
        }

        .video-title-wrapper.expanded .full,
        .video-title-wrapper.expanded .category-desc {
            display: block !important;
        }

        .video-title-wrapper .accordion-toggle i {
            transition: transform .2s ease;
        }

        .video-title-wrapper.expanded .accordion-toggle i {
            transform: rotate(180deg);
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

            </div>
        </div>

        <section class="info-section">
            @php
                $title = $video->title ?? '-';
                $categoryDesc = $video->category?->description ?: $video->category?->franchise?->description ?: '-';
            @endphp

            <div class="video-title-wrapper" id="videoTitle">

                <div class="d-flex align-items-start gap-2">

                    <h1 class="video-title flex-grow-1 mb-0">

                        {{-- Mobile --}}
                        <span class="truncate d-block d-sm-none">
                            {{ Str::words($title, 6, '...') }}
                        </span>

                        {{-- Tablet --}}
                        <span class="truncate d-none d-sm-block d-md-none">
                            {{ Str::words($title, 8, '...') }}
                        </span>

                        {{-- Desktop --}}
                        <span class="truncate d-none d-md-block d-lg-none">
                            {{ Str::words($title, 10, '...') }}
                        </span>

                        {{-- Large --}}
                        <span class="truncate d-none d-lg-block">
                            {{ Str::words($title, 12, '...') }}
                        </span>

                        {{-- FULL --}}
                        <span class="full d-none">
                            {{ $title }}
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

            <div class="video-meta">
                <div class="meta-left">
                    <span>10K views</span>
                    <span>•</span>
                    <span>{{ \Carbon\Carbon::parse($video->airdate ?? $video->category->first_aired)->diffForHumans() }}</span>
                </div>
            </div>

            <div class="action-bar">
                <div class="action-item active">
                    <i class="fa-regular fa-thumbs-up"></i>
                    <span>1K</span>
                </div>
                <div class="action-item">
                    <i class="fa-regular fa-thumbs-down"></i>
                    <span>Dislike</span>
                </div>
                <div class="action-item">
                    @include('components.button.share')
                    <span>Share</span>
                </div>
                @if ($downloadTokens)
                    <div class="action-item" id="downloadWrapper">
                        @include('components.button.download')
                        <span>Download</span>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {

                            const tokens = @json($downloadTokens ?? []);
                            const wrapper = document.getElementById("downloadWrapper");
                            const downloadBtn = document.getElementById("downloadBtn");

                            function updateDownload(index) {
                                const token = tokens[index];

                                if (!token) {
                                    wrapper.classList.add("d-none");
                                    downloadBtn.removeAttribute("href");
                                    return;
                                }

                                downloadBtn.href =
                                    "{{ route('video.download', '__TOKEN__') }}"
                                    .replace("__TOKEN__", token);

                                wrapper.classList.remove("d-none");
                            }

                            updateDownload(0);

                            document.querySelectorAll(".server-btn").forEach(btn => {
                                btn.addEventListener("click", () => {
                                    updateDownload(btn.dataset.index);
                                });
                            });

                        });
                    </script>
                @endif
                <div class="action-item">
                    @include('components.button.video-report')
                    <span>Report</span>
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

        <section class="channel-section">
            <div class="channel-info">
                <div class="channel-avatar">
                    <img src="{{ $video->category->img ? asset('storage/' . $video->category->img) : asset('logo.png') }}"
                        alt="{{ $video->category->name }}">
                </div>
                <div class="channel-text">
                    <h4>{{ $video->category->fullname }}</h4>
                    <span>Official
                        @if ($video->type == 'episode')
                            Series
                        @else
                            {{ $video->label }}
                        @endif
                    </span>
                </div>
            </div>
            {{-- <button class="btn-subscribe">Follow</button> --}}
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

        <section class="comments-section">
            <div class="section-header">
                <span class="fw-bold">Comments (100)</span>
                <span class="section-more"><i class="fa-solid fa-sliders"></i> Filter</span>
            </div>

            <div class="d-flex gap-2 mb-2" style="display:flex; gap:10px;">
                <div class="user-mini-avatar"><img src="https://via.placeholder.com/40" alt=""></div>
                <div>
                    <div style="font-size:0.8rem; font-weight:600; color:var(--text-sec); margin-bottom:2px;">User_1
                    </div>
                    <div style="font-size:0.9rem;">Finally the new form is out too! 🔥</div>
                </div>
            </div>

            <div class="comment-input-area">
                <div class="user-mini-avatar"><img src="https://via.placeholder.com/40" alt=""></div>
                <input type="text" placeholder="Type a comment..." class="form-control">
            </div>
        </section>
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
                    block: "nearest"
                });
            }
        });
    </script>

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
