@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'bg-warning rounded')

@section('content')

    <div class="text-center my-5 py-5">
        <h3 class="text-white font-weight-bold">Kamen Rider</h3>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas->where('category_id', '1') as $data)
                <a href="{{ asset('assets/img') }}/{{ $data->img }}">
                    <img class="img-fluid p-3" style="border-radius: 30px" width="300px"
                        src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
                </a>
            @endforeach
        </div>
        <h3 class="text-white font-weight-bold pt-4">Super Sentai</h3>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas->where('category_id', '39') as $data)
                <a href="{{ asset('assets/img') }}/{{ $data->img }}">
                    <img class="img-fluid p-3" style="border-radius: 30px" width="300px"
                        src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
                </a>
            @endforeach
        </div>
    </div>

@endsection
