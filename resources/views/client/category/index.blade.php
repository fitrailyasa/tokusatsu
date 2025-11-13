@extends('layouts.client.app')

@section('title', 'Category')

@section('textCategory', 'rounded aktif')

@section('content')

    <div class="text-center my-5 py-4">
        <h4 class="font-weight-bold responsive-title">@yield('title')</h4>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $item)
                <a href="{{ route('category.show', $item->slug) }}" class="btn m-2 img-gallery" loading="lazy">
                    @if ($item->img === null)
                        <img class="img img-fluid rounded" src="{{ asset('storage/comingsoon.jpg') }}" alt="">
                    @else
                        <img class="img img-fluid rounded" src="{{ asset('storage/' . $item->img) }}" alt="">
                    @endif
                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->onEachSide(0)->links() }}
        </div>
    </div>

@endsection
