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
                <h3 class="text-center responsive-title">{{ $franchise->name }}</h3>
            </div>
            <div></div>
        </div>

        <div class="row">
            @if ($categories->isEmpty())
                <p class="text-center mt-3">There are no video in this category.</p>
            @else
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Cover</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td class="text-center">{{ $categories->firstItem() + $loop->index }}</td>
                                <td>
                                    <a class="text-dark"
                                        href="{{ route('video.show', [$item->franchise->slug, $item->slug]) }}">
                                        {{ $item->fullname }}
                                        @if ($item->first_aired)
                                            ({{ \Carbon\Carbon::parse($item->first_aired)->year }})
                                        @endif
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('video.show', [$item->franchise->slug, $item->slug]) }}">
                                        <img class="img img-fluid rounded" width="80"
                                            src="{{ asset('storage/' . $item->img ?? '') }}" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->appends(['era_id' => $eraId, 'franchise_id' => $franchiseId, 'perPage' => $perPage, 'search' => $search])->links() }}
        </div>
    </div>
@endsection
