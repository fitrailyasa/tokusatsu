@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textCategory', 'bg-warning rounded')

@section('content')

    <div class="text-center my-5 py-5">
        <h2 class="text-white font-weight-bold">{{ $category->name }}</h2>
        @foreach ($datas->where('category_id', $category->id) as $data)
            <a href="{{ asset('assets/img') }}/{{ $data->img }}">
                <img class="img-fluid p-3" style="border-radius: 30px" width="300px"
                    src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
            </a>
        @endforeach
    </div>

@endsection
