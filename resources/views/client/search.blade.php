@extends('layouts.client.app')

@section('title', 'Search Result')

@section('textHome', 'rounded aktif')

@section('content')
    <div class="text-center" style="padding-top: 80px; padding-bottom: 80px;">
        @include('client.buttonSearch')
        <h4 class="text-center responsive-title">Search Result</h4>
        <div class="text-center d-flex flex-wrap justify-content-center py-3">
            @foreach ($datas as $item)
                @if ($item->type == 'episode')
                    <a class="bg-light rounded"
                        href="{{ url('video/' . $item->category->franchise->slug) }}/{{ $item->category->slug }}/{{ $item->type }}/{{ $item->number }}">
                        <img class="img img-fluid img-gallery" loading="lazy"
                            src="{{ asset('storage/' . $item->category->img) }}" alt="{{ $item->category->img }}">
                        <p class="small px-2">{{ ucwords($item->category->fullname) }} {{ ucwords($item->type) }}
                            {{ $item->number }}
                        </p>
                    </a>
                @else
                    <a class="bg-light rounded"
                        href="{{ url('video/' . $item->category->franchise->slug) }}/{{ $item->category->slug }}/{{ $item->type }}/{{ $item->number }}">
                        <img class="img img-fluid img-gallery" loading="lazy"
                            src="{{ asset('storage/' . $item->category->img) }}" alt="{{ $item->category->img }}">
                        <p class="small px-2">{{ $item->title }} {{ ucwords($item->type) }}
                            {{ $item->number }}
                        </p>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="d-flex justify-content-center w-100 overflow-auto">
                {{ $datas->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection
