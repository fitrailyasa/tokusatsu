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
                            @foreach ($videos as $video)
                                <tr>
                                    <td class="text-center">
                                        <a class="text-decoration-none normal-text" href="{{ $video->watchUrl() }}">
                                            {{ $video->label }} {{ $video->number }}
                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </a>
                                    </td>

                                    <td>
                                        @php
                                            $pos = strpos($video->title, '(');
                                            $displayTitle =
                                                $pos !== false ? trim(substr($video->title, 0, $pos)) : $video->title;
                                        @endphp

                                        <a class="text-decoration-none normal-text" href="{{ $video->watchUrl() }}">
                                            {{ $displayTitle }}
                                        </a>
                                    </td>

                                    <td class="text-muted normal-text">
                                        {{ \Carbon\Carbon::parse($video->airdate ?? $video->category->first_aired)->diffForHumans() }}
                                    </td>

                                    {{-- <td class="text-center normal-text">
                                        @foreach ($video->link as $link)
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
                                        @include('components.button.bookmark')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- Disable Right Click --}}
    @include('components.disable-right-click')

@endsection
