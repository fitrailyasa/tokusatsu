@extends('layouts.client.app')

@section('title', 'Hasil Pencarian')

@section('textHome', 'bg-warning rounded')

@section('content')
    <div class="text-center my-5 py-5">
        <form action="{{ route('search') }}" method="GET">
            <div class="d-flex justify-content-center align-items-center px-3">
                <div class="col-md-6 input-group mb-3">
                    <input type="text" class="form-control" name="query" placeholder="Cari..."
                        value="{{ request('query') }}">
                    <button class="btn w-25 text-white bg-warning" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <h3 class="text-dark font-weight-bold p-3 mx-3 text-white">Hasil Pencarian</h3>
        <div class="text-center d-flex flex-wrap justify-content-center border-bottom">
            @foreach ($datas->take(100) as $data)
                <a href="{{ asset('assets/img') }}/{{ $data->img }}">
                    <img class="img img-fluid p-3" style="border-radius: 30px" width="300px"
                        src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
                </a>
            @endforeach
        </div>
    </div>

@endsection
