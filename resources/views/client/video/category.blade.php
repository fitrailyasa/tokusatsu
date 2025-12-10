@extends('layouts.client.app')

@section('title', $franchise->name ?? '')

@section('textvideo', 'rounded aktif')

@section('content')
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
                <p class="text-center mt-3">There are no video in this category.</p>
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
                                            <img class="img-fluid rounded shadow-sm"
                                                src="{{ asset('storage/' . $item->img ?? '') }}"
                                                alt="{{ $item->fullname }}">
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
