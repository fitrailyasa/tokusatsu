@extends('layouts.client.app')

@section('title', 'Search Result')

@section('textHome', 'rounded aktif')

@section('content')
    <div class="text-center my-5 py-5">
        @include('client.buttonSearch')
        <h4 class="font-weight-bold">Search Result</h4>
        <div class="text-center d-flex flex-wrap justify-content-center pb-3">
            @foreach ($datas as $item)
                <a class="bg-light px-2 py-1 mx-2 my-2 rounded"
                    href="{{ url('video/' . $item->category->franchise->slug) }}/{{ $item->category->slug }}/{{ $item->type }}/{{ $item->number }}">
                    <img class="img img-fluid img-gallery" loading="lazy" src="{{ asset('storage/' . $item->category->img) }}"
                        alt="{{ $item->category->img }}">
                    <p>{{ ucwords($item->category->fullname) }} {{ ucwords($item->type) }} {{ $item->number }}</p>
                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="d-flex justify-content-center w-100 overflow-auto">
                {{ $datas->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
