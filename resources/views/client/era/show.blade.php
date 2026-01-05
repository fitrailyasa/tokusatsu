@extends('layouts.client.app')

@section('title', $era->name ?? '')

@section('textEra', 'rounded aktif')

@section('content')

    <div class="text-center my-5 py-4">
        <div class="container">
            <div class="row px-3 mb-3 align-items-center">
                <div class="col-3 text-left">
                    <a href="#" onclick="history.back();">
                        <p class="text-dark m-0"><i data-feather="arrow-left"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h1 class="responsive-title">{{ $era->name }}</h1>
                </div>
                <div class="col-3 text-right">
                </div>
            </div>
        </div>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $item)
                <a href="{{ route('era.category', [$item->era->slug, $item->slug]) }}" class="btn m-2 img-gallery"
                    loading="lazy">
                    @if ($item->img === null)
                        <img class="img img-fluid rounded" src="{{ asset('storage/comingsoon.jpg') }}" alt="">
                    @else
                        <img class="img img-fluid rounded" src="{{ asset('storage/' . $item->img) }}" alt="">
                    @endif
                    <p>{{ $item->fullname }}</p>
                </a>
            @endforeach
        </div>
        <div class="page d-flex justify-content-center">
            {{ $categories->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
