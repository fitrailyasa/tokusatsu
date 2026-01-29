@extends('layouts.client.app')

@section('title', 'Series')

@section('series', 'rounded aktif')

@section('content')

    <div class="container text-center my-5 py-4">
        <h1 class="text-center responsive-title">SERIES</h1>
        <div class="row justify-content-center mt-4">
            @foreach ($franchises as $item)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                    <a href="{{ route('video.franchise.series', $item->slug) }}" class="text-decoration-none">
                        <div class="franchise-card">
                            @if ($item->img === null)
                                <img class="img img-fluid franchise-img rounded" src="{{ asset('logo.png') }}" alt="">
                            @else
                                <img class="img img-fluid franchise-img rounded" src="{{ asset('storage/' . $item->img) }}"
                                    alt="">
                            @endif
                            <p class="m-0 p-2">{{ $item->name }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $franchises->onEachSide(0)->links('vendor.pagination.mobile') }}
        </div>
    </div>

@endsection
