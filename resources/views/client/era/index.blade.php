@extends('layouts.client.app')

@section('title', 'Era')

@section('textEra', 'rounded aktif')

@section('content')

    <div class="container text-center my-5 py-5">
        <h4 class="text-white font-weight-bold">@yield('title')</h4>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($eras as $era)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('era.show', $era->slug) }}"
                        class="btn text-white aktif border col-12">{{ $era->name }}</a></div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $eras->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
