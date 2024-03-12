@extends('layouts.client.app')

@section('title', 'Category')

@section('textCategory', 'bg-warning rounded')

@section('content')

    <div class="container text-center my-5 py-5">
        <h2 class="text-white font-weight-bold">Category</h2>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('category.show', $category->id) }}"
                        class="btn btn-warning col-12"><img class="img img-fluid"
                            src="{{ asset('assets/img/' . $category->img ?? 'default.png') }}" alt=""></a></div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>

@endsection
