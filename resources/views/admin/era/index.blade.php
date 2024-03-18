@extends('layouts.admin.table')

@section('title', 'Era')

@section('table-era', 'active')

@section('formCreate')
    @include('admin.era.create')
@endsection

@section('import')
    @include('admin.era.import')
@endsection

@section('export')
    @include('admin.era.export')
@endsection

@section('table')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>More</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eras as $era)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $era->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.era.edit')
                            @include('admin.era.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>More</th>
            </tr>
        </tfoot>
    </table>
@endsection
