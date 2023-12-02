@extends('layouts.client.app')

@section('title', 'Franchise')

@section('textFranchise', 'bg-warning rounded')

@section('content')

    <div class="text-center my-5 py-5">
        <h2 class="text-white font-weight-bold">Franchise</h2>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($franchises as $franchise)
                <div class="col-sm-6 col-md-2 p-3"><a href="{{ route('franchise.show', $franchise->id) }}"
                        class="btn btn-warning col-12">{{ $franchise->name }}</a></div>
            @endforeach
        </div>
    </div>

@endsection
