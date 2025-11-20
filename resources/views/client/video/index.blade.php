@extends('layouts.client.app')

@section('title', 'video')

@section('textvideo', 'rounded aktif')

@section('content')

    <div class="container text-center my-5 py-4">
        <h5 class="font-weight-bold">@yield('title')</h5>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($franchises as $item)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('video.category', $item->slug) }}"
                        class="btn text-white aktif border col-12">{{ $item->name }}</a></div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $franchises->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
