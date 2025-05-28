<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Tag
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create-tag')
            @include('admin.tag.create')
        @endcan
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @can('import-tag')
            @include('admin.tag.import')
        @endcan
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @can('export-tag')
            @include('admin.tag.export')
        @endcan
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @can('soft-delete-all-tag')
            @include('admin.tag.softDeleteAll')
        @endcan
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @can('restore-all-tag')
            @include('admin.tag.restoreAll')
        @endcan
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all-tag')
            @include('admin.tag.deleteAll')
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
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr @if ($tag->trashed()) class="text-muted" @endif>
                    <td>{{ $tags->firstItem() + $loop->index }}</td>
                    <td>{{ $tag->name ?? '-' }}</td>
                    <td class="manage-row text-center">
                        @if ($tag->trashed())
                            <!-- Restore and Delete Button -->
                            @can('restore-tag')
                                @include('admin.tag.restore')
                            @endcan
                            @can('delete-tag')
                                @include('admin.tag.delete')
                            @endcan
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @can('edit-tag')
                                @include('admin.tag.edit')
                            @endcan
                            @can('soft-delete-tag')
                                @include('admin.tag.softDelete')
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
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $tags->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
