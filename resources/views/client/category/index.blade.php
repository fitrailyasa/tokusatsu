@extends('layouts.client.app')

@section('title', 'Category')

@section('textCategory', 'rounded border')

@section('content')

    <div class="text-center my-5 py-5">
        <h4 class="text-white font-weight-bold">{{ __('Category') }}</h4>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                <a href="{{ route('category.show', $category->id) }}" class="btn m-2 img-gallery" loading="lazy">
                    @if ($category->img === null)
                        <img class="img img-fluid rounded" src="{{ asset('assets/img/comingsoon.jpg') }}" alt="">
                    @else
                        <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $category->img) }}" alt="">
                    @endif
                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>

@endsection
