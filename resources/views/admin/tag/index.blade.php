@extends('layouts.admin.table')

@section('title', 'Tag')

@section('table-tag', 'active')

@section('formCreate')
    @include('admin.tag.create')
@endsection

@section('import')
    @include('admin.tag.import')
@endsection

{{-- @section('export')
    @include('admin.tag.export')
@endsection --}}

@section('table')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.tag.edit')
                            @include('admin.tag.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
