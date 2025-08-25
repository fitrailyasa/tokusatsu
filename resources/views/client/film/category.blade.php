@extends('layouts.client.app')

@section('title', 'Film')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a class="text-white" href="{{ route('film.index') }}"><i class="fas fa-arrow-left fs-4"></i></a>
            </div>
            <div>
                <h3 class="text-center">Film {{ $franchise->name }}</h3>
            </div>
            <div></div>
        </div>

        <div class="row">
            @if ($categories->isEmpty())
                <p>There are no film in this category.</p>
            @else
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td class="text-center">{{ $categories->firstItem() + $loop->index }}</td>
                                <td>{{ $item->franchise->name }} {{ $item->name }}</td>
                                <td><img class="img img-fluid rounded" width="80"
                                        src="{{ asset('storage/' . $item->img ?? '') }}" alt=""></td>
                                <td><a class="btn btn-primary"
                                        href="{{ $item->franchise->slug }}/{{ $item->slug }}">Watch</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->appends(['era_id' => $eraId, 'franchise_id' => $franchiseId, 'perPage' => $perPage, 'search' => $search])->links() }}
        </div>
    </div>
@endsection
