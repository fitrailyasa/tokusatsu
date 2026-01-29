<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Role & Permissions
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create:role')
            @include('admin.role.create')
        @endcan
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('components.search')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Permissions') }}</th>
                @canany(['edit:role', 'delete:role'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
                <tr>
                    <td>{{ $roles->firstItem() + $loop->index }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>
                        @forelse ($item->permissions as $permission)
                            @php
                                $name = strtolower($permission->name);
                                if (str_contains($name, 'view')) {
                                    $badgeClass = 'badge-dark';
                                } elseif (str_contains($name, 'create')) {
                                    $badgeClass = 'badge-primary';
                                } elseif (str_contains($name, 'edit')) {
                                    $badgeClass = 'badge-warning';
                                } elseif (str_contains($name, 'delete')) {
                                    $badgeClass = 'badge-danger';
                                } elseif (str_contains($name, 'restore')) {
                                    $badgeClass = 'badge-secondary';
                                } elseif (str_contains($name, 'import')) {
                                    $badgeClass = 'badge-info';
                                } elseif (str_contains($name, 'export')) {
                                    $badgeClass = 'badge-success';
                                } else {
                                    $badgeClass = 'badge-dark';
                                }
                            @endphp

                            <span class="badge {{ $badgeClass }}">{{ $permission->name }}</span>
                        @empty
                            <span class="text-muted">No permissions</span>
                        @endforelse
                    </td>

                    @canany(['edit:role', 'delete:role'])
                        <td class="manage-row text-center">
                            @can('edit:role')
                                @include('admin.role.edit')
                            @endcan
                            @can('delete:role')
                                @include('admin.role.delete')
                            @endcan
                        </td>
                    @endcanany
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Permissions') }}</th>
                @canany(['edit:role', 'delete:role'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </tfoot>
    </table>
    {{ $roles->appends(['perPage' => $perPage, 'search' => $search])->links('vendor.pagination.mobile') }}

</x-admin-table>
