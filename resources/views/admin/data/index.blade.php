@extends('layouts.admin.table')

@section('title', 'Data')

@section('table-data', 'active')

@section('formCreate')
    @include('admin.data.create')
@endsection

@section('deleteAll')
    @include('admin.data.deleteAll')
@endsection

@section('import')
    @include('admin.data.import')
@endsection

@section('export')
    @include('admin.data.export')
@endsection

@section('table')
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name ?? '-' }}</td>
                    <td>{{ $data->category->name ?? '-' }}</td>
                    <td>
                        @if ($data->img == null)
                            <a href="{{ asset('assets/profile/default.png') }}">
                                <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}" width="100">
                            </a>
                        @else
                            <a href="{{ asset('assets/img/' . $data->img) }}">
                                <img src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->name }}" width="100">
                            </a>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.data.edit')
                            @include('admin.data.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
            <tr>
                <th colspan="5">
                    {{ $datas->links() }}
                </th>
            </tr>
        </tfoot>
    </table>
@endsection
