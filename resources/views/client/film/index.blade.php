@extends('layouts.client.app')

@section('title', 'Film')

@section('textFilm', 'rounded aktif')

@section('content')

    <div class="container text-center my-5 py-4">
        <h4 class="font-weight-bold">@yield('title')</h4>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($franchises as $i)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('film.category', $i->slug) }}"
                        class="btn text-white aktif border col-12">{{ $i->name }}</a></div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $franchises->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
