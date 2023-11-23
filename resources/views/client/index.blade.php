@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'bg-warning rounded')

@section('content')

    <div class="text-center my-5 py-5">
        <h2 class="text-white font-weight-bold">Kamen Rider</h2>
        @foreach ($datas->take(12) as $data)
            <a href="{{ asset('assets/img') }}/{{ $data->img }}">
                <img class="img-fluid p-3" style="border-radius: 30px" width="300px"
                    src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
            </a>
        @endforeach
    </div>

@endsection
