@extends('layouts.client.app')

@section('title', 'Film')

@section('content')
    <div class="container my-5">
        <h3 class="text-center pt-4">Film {{ $category->franchise->name }} {{ $category->name }}</h3>

        <div class="row">
            @if ($films->isEmpty())
                <p>There are no film in this category.</p>
            @else
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Link</th>
                            <th scope="col">Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $film)
                            <tr>
                                <td class="text-center">{{ ucfirst($film->type) }} {{ $film->number }}</td>
                                <td><a class="btn btn-primary" href="{{ $film->category->slug }}/{{ $film->type }}/{{ $film->number }}">Watch</a></td>
                                <td>{{ $film->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
