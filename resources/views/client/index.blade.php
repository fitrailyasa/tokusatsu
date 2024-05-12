@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'rounded border')

@section('content')

    <div class="text-center my-5 py-5">
        @include('client.buttonSearch')
        <h4 class="text-white font-weight-bold">Kamen Rider</h4>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom pb-3">
            @foreach ($categories as $category)
                @if ($category->Franchise->name === 'Kamen Rider' && $category->Era->name !== 'Showa')
                    <a href="{{ route('beranda.show', $category->id) }}" loading="lazy">
                        @if ($category->img === null)
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('assets/img/comingsoon.jpg') }}" alt="alt">
                        @else
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('assets/img/' . $category->img) }}" alt="{{ $category->img }}">
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
                @if ($category->Franchise->name === 'Ultraman' && $category->Era->name !== 'Showa')
                    <a href="{{ route('beranda.show', $category->id) }}" loading="lazy">
                        @if ($category->img === null)
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('assets/img/comingsoon.jpg') }}" alt="alt">
                        @else
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('assets/img/' . $category->img) }}" alt="{{ $category->img }}">
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
                @if ($category->Franchise->name === 'Super Sentai' && $category->Era->name !== 'Showa')
                    <a href="{{ route('beranda.show', $category->id) }}" loading="lazy">
                        @if ($category->img === null)
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('assets/img/comingsoon.jpg') }}" alt="alt">
                        @else
                            <img class="img img-fluid img-gallery" loading="lazy" width="300px"
                                src="{{ asset('assets/img/' . $category->img) }}" alt="{{ $category->img }}">
                        @endif
                    </a>
                @endif
            @endforeach
        </div>
    </div>

@endsection
