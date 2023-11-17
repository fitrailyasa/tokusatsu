@extends('layouts.client.app')

@section('title', 'Category')

@section('textHome', 'text-success')

@section('content')

    <div class="text-center mt-5 pt-5 d-flex flex-wrap">
        @foreach ($categories as $category)
            <div class="m-1"><a href="{{ route('category.show', $category->id) }}"
                    class="btn btn-warning">{{ $category->name }}</a></div>
        @endforeach
    </div>

@endsection
