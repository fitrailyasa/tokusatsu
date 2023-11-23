@extends('layouts.client.app')

@section('title', 'Category')

@section('textCategory', 'bg-warning rounded')

@section('content')

    <div class="text-center mt-3 mb-5 py-5 d-flex flex-wrap">
        @foreach ($categories as $category)
            <div class="m-1"><a href="{{ route('category.show', $category->id) }}"
                    class="btn btn-warning">{{ $category->name }}</a></div>
        @endforeach
    </div>

@endsection
