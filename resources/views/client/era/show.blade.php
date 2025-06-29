@extends('layouts.client.app')

@section('title', 'Category')

@section('textEra', 'rounded aktif')

@section('content')

    <div class="text-center my-5 py-4">
        <div class="container">
            <div class="row px-3">
                <div class="col-3 text-left">
                    <a href="#" onclick="history.back();">
                        <p class="text-white"><i class="fas fa-arrow-left fs-4"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h4 class="font-weight-bold">{{ $era->name }}</h4>
                </div>
                <div class="col-3 text-right">
                    <button type="button" class="btn aktif text-white" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                <a href="{{ route('era.category', [$category->era->slug, $category->slug]) }}" class="btn m-2 img-gallery"
                    loading="lazy">
                    @if ($category->img === null)
                        <img class="img img-fluid rounded" src="{{ asset('storage/comingsoon.jpg') }}" alt="">
                    @else
                        <img class="img img-fluid rounded" src="{{ asset('storage/' . $category->img) }}" alt="">
                    @endif
                </a>
            @endforeach
        </div>
        <div class="page d-flex justify-content-center">
            {{ $categories->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
