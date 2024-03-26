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
                <th class="d-none d-sm-table-cell">{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $user)
                <tr>
                    <td class="d-none d-sm-table-cell">{{ $loop->iteration }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $user->email ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $user->Roles->name ?? '-' }}</td>
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
                <th class="d-none d-sm-table-cell">{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
