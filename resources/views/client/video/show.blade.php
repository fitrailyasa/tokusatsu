@extends('layouts.client.app')

@section('title', $title ?? '')

@section('textvideo', 'rounded aktif')

@section('content')
    <script type="application/ld+json">
    {!! json_encode([
        "@context"    => "https://schema.org",
        "@type"       => "VideoObject",
        "name"        => $title . ' - ' . ucwords(config('app.name')),
        "description" => $category->description ?: ucwords(config('app.name')),
        "thumbnailUrl"=> config('app.url') . "/storage/" . $category->img ?: config('app.url') . "/logo.png",
        "uploadDate"  => optional($category->first_aired)
                            ? \Carbon\Carbon::parse($category->first_aired)->toIso8601String()
                            : \Carbon\Carbon::parse($category->created_at)->toIso8601String(),
        "contentUrl"  => url()->current(), 
        "genre"       => $category->franchise->name,
        "publisher"   => [
            "@type" => "Organization",
            "name"  => ucwords(config('app.name')),
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
                <a href="{{ route('video.category', $category->franchise->slug) }}"><i data-feather="arrow-left"
                        class="d-block mx-auto"></i></a>
            </div>
            <div>
                <h1 class="text-center responsive-title">{{ $title }}</h1>
            </div>
            <div>
                @include('components.button.share')
            </div>
        </div>

        <div class="row">
            @if ($videos->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
                    <div class="text-center text-muted">
                        <i class="fas fa-film fa-2x m2-3"></i>
                        <p>No Videos Available</p>
                    </div>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-middle table-hover shadow-sm mt-3">
                        <thead>
                            <tr>
                                <th class="text-center" style="max-width: 90px;">List</th>
                                <th>Title</th>
                                <th style="max-width: 70px;">Release</th>
                                {{-- <th class="text-center" style="max-width: 90px;">Download</th> --}}
                                <th class="text-center" style="max-width: 90px;">Bookmark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $item)
                                <tr>
                                    <td class="text-center">
                                        <a class="text-decoration-none normal-text" href="{{ $item->watchUrl() }}">
                                            {{ $item->label }} {{ $item->number }}
                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </a>
                                    </td>

                                    <td>
                                        @php
                                            $pos = strpos($item->title, '(');
                                            $displayTitle =
                                                $pos !== false ? trim(substr($item->title, 0, $pos)) : $item->title;
                                        @endphp

                                        <a class="text-decoration-none normal-text" href="{{ $item->watchUrl() }}">
                                            {{ $displayTitle }}
                                        </a>
                                    </td>

                                    <td class="text-muted normal-text">
                                        {{ \Carbon\Carbon::parse($item->airdate ?? $item->category->first_aired)->diffForHumans() }}
                                    </td>

                                    {{-- <td class="text-center normal-text">
                                        @foreach ($item->link as $link)
                                            @php
                                                preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $link, $matches);
                                                $fileId = $matches[1] ?? null;
                                            @endphp

                                            @if ($fileId)
                                                <a href="{{ route('video.download', encrypt($fileId)) }}"
                                                    class="btn btn-sm btn-outline-success mb-1">
                                                    <i class="fa-solid fa-download"></i>
                                                </a>
                                            @endif
                                        @endforeach
                                    </td> --}}

                                    <td class="text-center">
                                        <button class="btn btn-sm bookmark-btn px-3 py-1 btn-outline-warning"
                                            data-title="{{ $title }} {{ ucfirst($item->type) }} {{ $item->number }}"
                                            data-url="{{ $item->watchUrl() }}">
                                            ⭐
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- Bookmark Button --}}
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
        });
    </script>

    {{-- Disable Right Click --}}
    @include('components.disable-right-click')

@endsection
