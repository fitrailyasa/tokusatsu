@extends('layouts.admin.table')

@section('title', 'User')

@section('table-user', 'active')

@section('formCreate')
    @include('admin.user.create')
@endsection

@section('table')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Role') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td>{{ $user->email ?? '-' }}</td>
                    <td>{{ $user->roles->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.user.edit')
                            @include('admin.user.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Role') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
