<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Video
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create:video')
            @include('admin.video.create')
        @endcan
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @can('import:video')
            @include('admin.video.excel.import')
        @endcan
    </x-slot>

    <!-- Button Export Excel -->
    <x-slot name="exportExcel">
        @can('export:video')
            @include('admin.video.excel.export')
        @endcan
    </x-slot>

    <!-- Button Export PDF -->
    <x-slot name="exportPDF">
        @can('export:video')
            {{-- @include('admin.video.pdf.export') --}}
        @endcan
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @can('soft-delete-all:video')
            @include('admin.video.softDeleteAll')
        @endcan
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @can('restore-all:video')
            @include('admin.video.restoreAll')
        @endcan
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all:video')
            @include('admin.video.deleteAll')
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
                <th>{{ __('Category') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Link') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $item)
                <tr @if ($item->trashed()) class="text-muted" @endif>
                    <td>{{ $videos->firstItem() + $loop->index }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $item->getCategoryColor() }}">
                            {{ $item->category->name ?? '-' }}
                        </span>
                    </td>
                    <td>{{ $item->type ?? '-' }} {{ $item->number ?? 0 }}</td>
                    <td><a href="{{ $item->link ?? '-' }}" target="_blank">{{ $item->link ?? '-' }}</a></td>
                    <td class="manage-row text-center">
                        @if ($item->trashed())
                            <!-- Restore and Delete Button -->
                            @can('restore:video')
                                @include('admin.video.restore')
                            @endcan
                            @can('delete:video')
                                @include('admin.video.delete')
                            @endcan
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @can('edit:video')
                                @include('admin.video.edit')
                            @endcan
                            @can('soft-delete:video')
                                @include('admin.video.softDelete')
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
                <th>{{ __('Link') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $videos->appends(['category_id' => $categoryId, 'perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
