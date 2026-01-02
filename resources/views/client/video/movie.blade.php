@extends('layouts.client.app')

@section('title', 'Movie ' . $franchise->name ?? '')

@section('textvideo', 'rounded aktif')

@section('content')

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a href="{{ route('video') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div>
                <h1 class="text-center responsive-title">Movie {{ $franchise->name }}</h1>
            </div>
            <div>
                <button id="shareBtn" class="btn btn-icon">
                    <i class="fa fa-share"></i>
                </button>
            </div>
        </div>

        <div class="row">
            @if ($videos->isEmpty())
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
                                <th class="text-center" style="max-width: 120px;">Movie</th>
                                <th>Title</th>
                                <th style="max-width: 160px;">Release</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $item)
                                <tr>
                                    <td class="text-center fw-semibold">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
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
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </td>

                                    <td class="text-muted">
                                        {{ \Carbon\Carbon::parse($item->airdate ?? $item->category->first_aired)->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <div class="d-flex justify-content-center">
                {{ $videos->appends(['era_id' => $eraId, 'franchise_id' => $franchiseId, 'perPage' => $perPage, 'search' => $search])->links() }}
            </div>
        </div>
    </div>

    {{-- Share Button --}}
    <script>
        document.getElementById("shareBtn").addEventListener("click", async function() {
            const shareData = {
                title: document.title,
                text: "{{ $franchise->name }}",
                url: window.location.href
            };

            if (navigator.share) {
                await navigator.share(shareData);
            }
        });
    </script>
@endsection
