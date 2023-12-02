@extends('layouts.client.app')

@section('title', 'Category')

@section('textFranchise', 'bg-warning rounded')

@section('content')

    <div class="text-center my-5 py-5">
        <div class="container">
            <div class="row px-3">
                <div class="col-1">
                    <a href="{{ route('franchise.show', $franchise->id) }}">
                        <p class="text-white"><i class="fa-solid fa-arrow-left fs-4"></i></p>
                    </a>
                </div>
                <div class="col-10">
                    <h2 class="text-white font-weight-bold">{{ $category->name }}</h2>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        @foreach ($datas->where('category_id', $category->id) as $data)
            <a href="{{ asset('assets/img') }}/{{ $data->img }}">
                <img class="img-fluid p-3" style="border-radius: 30px" width="300px"
                    src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
            </a>
        @endforeach
    </div>

@endsection
