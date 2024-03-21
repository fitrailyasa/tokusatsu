@extends('layouts.admin.table')

@section('title', 'Franchise')

@section('table-franchise', 'active')

@section('formCreate')
    @include('admin.franchise.create')
@endsection

@section('import')
    @include('admin.franchise.import')
@endsection

@section('export')
    @include('admin.franchise.export')
@endsection

@section('table')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Images</th>
                <th>More</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($franchises as $franchise)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $franchise->name ?? '-' }}</td>
                    <td>
                        @if ($franchise->img == null)
                            <a href="{{ asset('assets/profile/default.png') }}">
                                <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $franchise->name }}"
                                    width="100">
                            </a>
                        @else
                            <a href="{{ asset('assets/img/' . $franchise->img) }}">
                                <img src="{{ asset('assets/img/' . $franchise->img) }}" alt="{{ $franchise->name }}"
                                    width="100">
                            </a>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.franchise.edit')
                            @include('admin.franchise.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Images</th>
                <th>More</th>
            </tr>
        </tfoot>
    </table>
@endsection
