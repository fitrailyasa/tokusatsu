@extends('layouts.client.app')

@section('title', 'Film')

@section('content')
    <div class="container my-5 py-4">
        <div class="container">
            <div class="row px-3 mb-3">
                <div class="col-3 text-left d-flex align-items-center">
                    <a
                        href="{{ route('film.show', ['franchise' => $category->franchise->slug, 'category' => $category->slug]) }}">
                        <p class="text-white m-0"><i class="fas fa-arrow-left fs-4"></i></p>
                    </a>
                </div>
                <div class="col-6">
                    <h4 class="text-center">
                        {{ $category->franchise->name }} {{ $category->name }} {{ ucfirst($film->type) }}
                        {{ $film->number }}
                    </h4>
                </div>
                <div class="col-3 text-right">
                </div>
            </div>
        </div>

        <div class="row">
            <video src="{{ asset('storage/' . $film->video) }}" controls="controls" width="100%"></video>
        </div>
    </div>
@endsection
