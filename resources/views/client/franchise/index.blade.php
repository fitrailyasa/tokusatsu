@extends('layouts.client.app')

@section('title', 'Franchise')

@section('textFranchise', 'bg-warning rounded')

@section('content')

    <div class="container text-center my-5 py-5">
        <h4 class="text-white font-weight-bold">{{ __('Franchise') }}</h4>
        <div class="text-center d-flex flex-wrap justify-content-center">
            @foreach ($franchises as $franchise)
                <div class="col-sm-4 col-md-3 p-3"><a href="{{ route('franchise.show', $franchise->id) }}"
                        class="btn btn-warning col-12">{{ $franchise->name }}</a></div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $franchises->links() }}
        </div>
    </div>

@endsection
