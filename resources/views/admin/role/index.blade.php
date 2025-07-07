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
        @include('components.search')
    </x-slot>

    <!-- Table -->
    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Permissions') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $roles->firstItem() + $loop->index }}</td>
                    <td>{{ $role->name ?? '-' }}</td>
                    <td>
                        @forelse ($role->permissions as $permission)
                            @php
                                $name = strtolower($permission->name);
                                if (str_contains($name, 'view')) {
                                    $badgeClass = 'badge-secondary';
                                } elseif (str_contains($name, 'create')) {
                                    $badgeClass = 'badge-primary';
                                } elseif (str_contains($name, 'edit')) {
                                    $badgeClass = 'badge-warning';
                                } elseif (str_contains($name, 'delete')) {
                                    $badgeClass = 'badge-danger';
                                } elseif (str_contains($name, 'restore')) {
                                    $badgeClass = 'badge-dark';
                                } elseif (str_contains($name, 'import')) {
                                    $badgeClass = 'badge-info';
                                } elseif (str_contains($name, 'export')) {
                                    $badgeClass = 'badge-success';
                                } else {
                                    $badgeClass = 'badge-gray';
                                }
                            @endphp

                            <span class="badge {{ $badgeClass }}">{{ $permission->name }}</span>
                        @empty
                            <span class="text-muted">No permissions</span>
                        @endforelse
                    </td>

                    <td class="manage-row text-center">
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
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $roles->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
