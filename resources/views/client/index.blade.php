@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'text-success')

@section('content')

    {{-- <div class="text-center mt-5 pt-5">
        @foreach ($datas as $data)
            <img class="img-fluid p-3" width="100px" src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->img }}">
        @endforeach
    </div> --}}

@endsection
