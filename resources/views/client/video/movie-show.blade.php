@extends('layouts.client.app')

@section('title', 'Movie ' . $category->fullname ?? '')

@section('textvideo', 'rounded aktif')

@section('content')
    <script type="application/ld+json">
    {!! json_encode([
        "@context"    => "https://schema.org",
        "@type"       => "VideoObject",
        "name"        => $category->fullname . ' - ' . config('app.name'),
        "description" => $category->description ?: config('app.name'),
        "thumbnailUrl"=> config('app.url') . "/storage/" . $category->img ?: config('app.url') . "/logo.png",
        "uploadDate"  => optional($category->first_aired)
                            ? \Carbon\Carbon::parse($category->first_aired)->toIso8601String()
                            : \Carbon\Carbon::parse($category->created_at)->toIso8601String(),
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

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a class="text-dark" href="{{ route('video.movie', $category->franchise->slug) }}"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <div>
                <h1 class="text-center responsive-title">Movie {{ $category->fullname }}</h1>
            </div>
            <div>
                <button id="shareBtn" class="btn btn-icon">
                    <i class="fa fa-share"></i>
                </button>
            </div>
        </div>

        <div class="row mt-4">
            @if ($videos->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
                    <div class="text-center text-muted">
                        <i class="fas fa-film fa-2x m2-3"></i>
                        <p>No Movies Available</p>
                    </div>
                </div>
            @else
                @php
                    $groupedVideos = $videos->groupBy(function ($video) {
                        return preg_replace(
                            '/\b(Episode|Chapter|Part|Segment|Stage|Arc|Vol)\s*\d+$/i',
                            '',
                            $video->title,
                        );
                    });
                @endphp

                <div class="accordion" id="videoAccordion">
                    @foreach ($groupedVideos as $baseTitle => $episodes)
                        @php
                            $collapseId = 'collapse' . Str::slug($baseTitle);
                        @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $collapseId }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $collapseId }}" aria-expanded="false"
                                    aria-controls="{{ $collapseId }}">
                                    {{ $baseTitle }}
                                    @if ($episodes->count() > 1)
                                        ({{ $episodes->count() }} Parts)
                                    @endif
                                </button>
                            </h2>
                            <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $collapseId }}" data-bs-parent="#videoAccordion">
                                <div class="accordion-body p-0">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-hover align-middle">
                                            <tbody>
                                                @foreach ($episodes as $item)
                                                    <tr>
                                                        <td class="fw-semibold">
                                                            <a class="text-decoration-none text-dark"
                                                                href="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                                                {{ $item->title }}
                                                            </a>
                                                        </td>
                                                        <td class="text-muted">
                                                            {{ \Carbon\Carbon::parse($item->airdate ?? $item->category->first_aired)->diffForHumans() }}
                                                        </td>
                                                        <td class="text-center">
                                                            <button
                                                                class="btn btn-sm bookmark-btn px-3 py-1 btn-outline-warning"
                                                                data-title="{{ $category->fullname }} {{ ucfirst($item->type) }} {{ $item->number }}"
                                                                data-url="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                                                ⭐
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".bookmark-btn");

            let bookmarks = JSON.parse(localStorage.getItem("bookmarks")) || [];

            function updateButtons() {
                buttons.forEach(btn => {
                    const videoUrl = btn.dataset.url;
                    if (bookmarks.find(b => b.url === videoUrl)) {
                        btn.textContent = "✅";
                        btn.classList.remove("btn-outline-warning");
                        btn.classList.add("btn-success");
                    } else {
                        btn.textContent = "⭐";
                        btn.classList.remove("btn-success");
                        btn.classList.add("btn-outline-warning");
                    }
                });
            }

            buttons.forEach(btn => {
                btn.addEventListener("click", function() {
                    const videoTitle = this.dataset.title;
                    const videoUrl = this.dataset.url;

                    const index = bookmarks.findIndex(b => b.url === videoUrl);

                    if (index === -1) {
                        bookmarks.push({
                            title: videoTitle,
                            url: videoUrl
                        });
                    } else {
                        bookmarks.splice(index, 1);
                    }

                    localStorage.setItem("bookmarks", JSON.stringify(bookmarks));
                    updateButtons();
                });
            });

            updateButtons();

            const accordions = document.querySelectorAll('.accordion-collapse');

            accordions.forEach(acc => {
                const rows = acc.querySelectorAll('tbody tr');

                function hideExtraRows() {
                    rows.forEach((row, idx) => {
                        row.style.display = idx < 10 ? '' : 'none';
                    });
                }

                hideExtraRows();

                acc.addEventListener('show.bs.collapse', function() {
                    rows.forEach(row => row.style.display = '');
                });

                acc.addEventListener('hide.bs.collapse', function() {
                    hideExtraRows();
                });
            });

            document.getElementById("shareBtn").addEventListener("click", async function() {
                const shareData = {
                    title: document.title,
                    text: "{{ $category->fullname }}",
                    url: window.location.href
                };
                if (navigator.share) await navigator.share(shareData);
            });
        });
    </script>
@endsection
