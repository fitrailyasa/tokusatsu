@extends('layouts.client.app')

@section('title', 'Video')

@section('textvideo', 'rounded aktif')

@section('content')

    <style>
        .franchise-card {
            transition: all .25s ease;
            border-radius: 12px;
            padding: 20px 15px;
            font-size: 0.9rem;
            font-weight: 600;
            background: #ffffff;
            border: 1px solid #ddd;
            text-align: center;
        }

        .franchise-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            border-color: #bfbfbf;
        }
    </style>

    <div class="container text-center my-5 py-4">
        <div class="row justify-content-center mt-4">
            @foreach ($franchises as $item)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                    <a href="{{ route('video.category', $item->slug) }}" class="text-decoration-none text-dark">
                        <div class="franchise-card">
                            @if ($item->img === null)
                                <img class="img img-fluid rounded" src="{{ asset('logo.png') }}" alt="">
                            @else
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $item->img) }}" alt="">
                            @endif
                            <p>{{ $item->name }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $franchises->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
