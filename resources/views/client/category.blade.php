@extends('layouts.client.app')

@section('title', 'Category')

@section('textCategory', 'bg-warning rounded')

@section('content')

    <div class="text-center mt-3 mb-5 py-5 d-flex flex-wrap justify-content-center">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-md-2 p-2"><a href="{{ route('category.show', $category->id) }}"
                    class="btn btn-warning col-12">{{ $category->name }}</a></div>
        @endforeach
    </div>

@endsection
