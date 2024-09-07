<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Tag
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.tag.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.tag.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.tag.export')
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @include('admin.tag.softDeleteAll')
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @include('admin.tag.restoreAll')
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.tag.deleteAll') --}}
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
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr @if ($tag->trashed()) class="text-muted" @endif>
                    <td>{{ $tags->firstItem() + $loop->index }}</td>
                    <td>{{ $tag->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @if ($tag->trashed())
                                <!-- Restore and Delete Button -->
                                @include('admin.tag.restore')
                                @include('admin.tag.delete')
                            @else
                                <!-- Edit and Soft Delete Buttons -->
                                @include('admin.tag.edit')
                                @include('admin.tag.softDelete')
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $tags->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
