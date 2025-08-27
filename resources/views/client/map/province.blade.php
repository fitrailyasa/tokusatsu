@extends('layouts.client.app')

@section('title', "Map $province")

@section('content')
    <div class="container my-5 py-4">
        <h3 class="mb-4">List of Regencies/Cities in {{ $province }}</h3>

        @if ($regency->isEmpty())
            <p>No Regencies/Cities were found in this province.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th scope="col">Name of Regency/City</th>
                        <th scope="col">Map</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regency as $index => $reg)
                        @php
                            $regSlug = explode('_', $reg, 2)[1];
                        @endphp
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ ucwords(str_replace('_', ' ', $regSlug)) }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('map.regency', ['province' => strtolower(str_replace(' ', '_', $province)), 'regency' => $regSlug]) }}">
                                    View Map
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
