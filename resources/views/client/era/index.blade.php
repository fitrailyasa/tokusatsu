@extends('layouts.client.app')

@section('title', 'Era')

@section('textEra', 'bg-warning rounded')

@section('content')

    <div class="container text-center my-5 py-5">
        <h2 class="text-white font-weight-bold">Era</h2>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($eras as $era)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('era.show', $era->id) }}"
                        class="btn btn-warning col-12">{{ $era->name }}</a></div>
            @endforeach
        </div>
    </div>

@endsection
