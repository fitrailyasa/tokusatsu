@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'rounded aktif')

@section('content')

    <div class="text-center my-5 py-5">
        @include('client.buttonSearch')
        <h4 class="text-white font-weight-bold">Kamen Rider</h4>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom pb-3">
            @foreach ($categories as $category)
                @if ($category->franchise && $category->franchise->name === 'Kamen Rider' && $category->era->name !== 'Showa')
                    <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}" loading="lazy">
                        @if ($category->img === null)
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('storage/comingsoon.jpg') }}" alt="alt">
                        @else
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->img }}">
                        @endif
                    </a>
                @endif
            @endforeach
        </div>
        <br>
        @include('client.buttonSearch')
        <h4 class="text-white font-weight-bold">Ultraman</h4>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom pb-3">
            @foreach ($categories as $category)
                @if ($category->franchise && $category->franchise->name === 'Ultraman' && $category->era->name !== 'Showa')
                    <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}" loading="lazy">
                        @if ($category->img === null)
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('storage/comingsoon.jpg') }}" alt="alt">
                        @else
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->img }}">
                        @endif
                    </a>
                @endif
            @endforeach
        </div>
        <br>
        @include('client.buttonSearch')
        <h4 class="text-white font-weight-bold">Super Sentai</h4>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                @if ($category->franchise && $category->franchise->name === 'Super Sentai' && $category->era->name !== 'Showa')
                    <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}" loading="lazy">
                        @if ($category->img === null)
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('storage/comingsoon.jpg') }}" alt="alt">
                        @else
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->img }}">
                        @endif
                    </a>
                @endif
            @endforeach
        </div>
    </div>

@endsection
