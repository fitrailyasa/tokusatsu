@extends('layouts.client.app')

@section('title', $title ?? '')

@section('movie', 'rounded aktif')

@section('content')

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a href="{{ route('video.movie') }}"><i data-feather="arrow-left"></i></a>
            </div>
            <div>
                <h1 class="text-center responsive-title">{{ $title }}</h1>
            </div>
            <div>
                @include('components.button.share')
            </div>
        </div>
        <div class="mt-3">
            @include('client.buttonSearch')
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
            <div class="d-flex justify-content-center">
                {{ $videos->appends(['era_id' => $eraId, 'franchise_id' => $franchiseId, 'perPage' => $perPage, 'search' => $search])->links('vendor.pagination.mobile') }}
            </div>
        </div>
    </div>
@endsection
