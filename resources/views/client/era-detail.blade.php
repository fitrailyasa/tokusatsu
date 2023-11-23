@extends('layouts.client.app')

@section('title', 'Category')

@section('textEra', 'bg-warning rounded')

@section('content')

    <div class="text-center my-5 py-5">
        <h2 class="text-white font-weight-bold">{{ $era->name }}</h2>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                <div class="col-sm-6 col-md-2 p-3"><a href="{{ route('category.show', $category->id) }}"
                        class="btn btn-warning col-12">{{ $category->name }}</a></div>
            @endforeach
        </div>
    </div>

@endsection
