<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Role & Permissions
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create-role')
            @include('admin.role.create')
        @endcan
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('layouts.admin.search')
    </x-slot>

    <!-- Table -->
    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Permissions') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $roles->firstItem() + $loop->index }}</td>
                    <td>{{ $role->name ?? '-' }}</td>
                    <td>
                        @forelse ($role->permissions as $permission)
                            <span class="badge badge-info">{{ $permission->name }}</span>
                        @empty
                            <span class="text-muted">No permissions</span>
                        @endforelse
                    </td>

                    <td class="manage-row">
                        @can('edit-role')
                            @include('admin.role.edit')
                        @endcan
                        @can('delete-role')
                            @include('admin.role.delete')
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Permissions') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $roles->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
