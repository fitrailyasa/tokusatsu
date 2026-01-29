@extends('layouts.client.app')

@section('title', $title ?? '')

@section('movie', 'rounded aktif')

@section('description')
    {{ $category->description }}
@endsection

@section('image')
    {{ $category->img ? config('app.url') . '/storage/' . $category->img : config('app.url') . '/logo.png' }}
@endsection

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
                <a href="{{ route('video.franchise.movie', $category->franchise->slug) }}"><i data-feather="arrow-left"
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
                                <th class="text-center" style="width: 120px;">Movie</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $item)
                                <tr>
                                    <td class="text-center">
                                        <a class="text-decoration-none" href="{{ $item->watchUrl() }}">
                                            @if ($item->category->img === null)
                                                <img class="img-fluid rounded shadow-sm" width="150px"
                                                    src="{{ asset('logo.png') }}" alt="{{ $item->category->fullname }}">
                                            @else
                                                <img class="img-fluid rounded shadow-sm" width="150px"
                                                    src="{{ asset('storage/' . $item->category->img ?? '') }}"
                                                    alt="{{ $item->category->fullname }}">
                                            @endif
                                        </a>
                                    </td>

                                    <td class="fw-semibold">
                                        <a class="text-decoration-none" href="{{ $item->watchUrl() }}">
                                            {{ $item->title }}
                                        </a>
                                        <br>
                                        <span class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->airdate ?? $item->category->first_aired)->diffForHumans() }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $videos->appends(['perPage' => $perPage])->links('vendor.pagination.mobile') }}
        </div>
    </div>

    {{-- Disable Right Click --}}
    @include('components.disable-right-click')

@endsection
