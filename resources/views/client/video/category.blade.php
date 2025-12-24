@extends('layouts.client.app')

@section('title', $franchise->name ?? '')

@section('textvideo', 'rounded aktif')

@section('content')
    <script type="application/ld+json">
    {!! json_encode([
        "@context"    => "https://schema.org",
        "@type"       => "VideoObject",
        "name"        => $franchise->name . ' - ' . config('app.name'),
        "description" => $franchise->description ?: config('app.name'),
        "thumbnailUrl"=> config('app.url') . "/storage/" . $franchise->img ?: config('app.url') . "/logo.png",
        "uploadDate"  => optional($franchise->first_aired)
                            ? \Carbon\Carbon::parse($franchise->first_aired)->toIso8601String()
                            : \Carbon\Carbon::parse($franchise->created_at)->toIso8601String(),
        "contentUrl"  => url()->current(), 
        "genre"       => $franchise->name,
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
                <a class="text-dark" href="{{ route('video') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div>
                <h1 class="text-center responsive-title">{{ $franchise->name }}</h1>
            </div>
            <div></div>
        </div>

        <div class="row">
            @if ($categories->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
                    <div class="text-center text-muted">
                        <i class="fas fa-tag fa-2x m2-3"></i>
                        <p>No Categories Available</p>
                    </div>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-middle table-hover shadow-sm mt-3">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center" style="width: 25px;">No</th>
                                <th>Title</th>
                                <th class="text-center" style="width: 120px;">Cover</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td class="text-center fw-semibold">
                                        {{ $categories->firstItem() + $loop->index }}
                                    </td>

                                    <td class="fw-semibold">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('video.show', [$item->franchise->slug, $item->slug]) }}">
                                            {{ $item->fullname }}

                                            @if ($item->first_aired)
                                                <span class="text-muted">
                                                    ({{ \Carbon\Carbon::parse($item->first_aired)->year }})
                                                </span>
                                            @endif

                                            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('video.show', [$item->franchise->slug, $item->slug]) }}">
                                            @if ($item->img === null)
                                                <img class="img-fluid rounded shadow-sm" src="{{ asset('logo.png') }}"
                                                    alt="{{ $item->fullname }}">
                                            @else
                                                <img class="img-fluid rounded shadow-sm"
                                                    src="{{ asset('storage/' . $item->img ?? '') }}"
                                                    alt="{{ $item->fullname }}">
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->appends(['era_id' => $eraId, 'franchise_id' => $franchiseId, 'perPage' => $perPage, 'search' => $search])->links() }}
        </div>
    </div>
@endsection
