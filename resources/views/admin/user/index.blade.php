<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        User
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create:user')
            @include('admin.user.create')
        @endcan
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Status') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $item->email ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        {{ $item->getRoleNames()->implode(', ') }}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        @if ($user->email_verified_at)
                            <span class="badge badge-success">aktif</span>
                        @else
                            <span class="badge badge-danger">tidak aktif</span>
                        @endif
                    </td>
                    <td class="manage-row text-center">
                        @can('edit:user')
                            @include('admin.user.edit')
                        @endcan
                        @can('delete:user')
                            @include('admin.user.delete')
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Status') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>

</x-admin-table>
