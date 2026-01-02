@extends('layouts.client.app')

@section('title', 'Video')

@section('textvideo', 'rounded aktif')

@section('content')

    <div class="container my-5 py-4">
        <div class="row justify-content-center mt-4 g-3">

            @foreach ($franchises as $item)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ route('video.category', $item->slug) }}" class="text-decoration-none h-100 d-block">

                        <div class="franchise-card h-100 d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ $item->img ? asset('storage/' . $item->img) : asset('logo.png') }}"
                                alt="{{ $item->name }}" class="img-fluid mb-2">

                            <p class="mb-0 text-center">
                                {{ $item->name }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $franchises->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
