@extends('layouts.client.app')

@section('title', 'Category')

@section('textEra', 'bg-warning rounded')

@section('content')

    <div class="container text-center my-5 py-5">
        <div class="container">
            <div class="row px-3">
                <div class="col-1">
                    <a href="{{ route('era') }}">
                        <p class="text-white"><i class="fa-solid fa-arrow-left fs-4"></i></p>
                    </a>
                </div>
                <div class="col-10">
                    <h2 class="text-white font-weight-bold">{{ $era->name }}</h2>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('era.category', $category->id) }}"
                        class="btn btn-warning col-12">{{ $category->name }}</a></div>
            @endforeach
        </div>
    </div>

@endsection
