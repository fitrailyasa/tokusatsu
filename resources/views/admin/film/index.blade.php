<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Film
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create-film')
            @include('admin.film.create')
        @endcan
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @can('import-film')
            @include('admin.film.import')
        @endcan
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @can('export-film')
            @include('admin.film.export')
        @endcan
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @can('soft-delete-all-film')
            @include('admin.film.softDeleteAll')
        @endcan
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @can('restore-all-film')
            @include('admin.film.restoreAll')
        @endcan
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all-film')
            @include('admin.film.deleteAll')
        @endcan
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('layouts.admin.search')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Type') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
                <tr @if ($film->trashed()) class="text-muted" @endif>
                    <td>{{ $films->firstItem() + $loop->index }}</td>
                    <td>{{ $film->name ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $film->getCategoryColor() }}">
                            {{ $film->category->name ?? '-' }}
                        </span>
                    </td>
                    <td>{{ $film->type ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if ($film->trashed())
                            <!-- Restore and Delete Button -->
                            @can('restore-film')
                                @include('admin.film.restore')
                            @endcan
                            @can('delete-film')
                                @include('admin.film.delete')
                            @endcan
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @can('edit-film')
                                @include('admin.film.edit')
                            @endcan
                            @can('soft-delete-film')
                                @include('admin.film.softDelete')
                            @endcan
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
                <th>{{ __('Type') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $films->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
