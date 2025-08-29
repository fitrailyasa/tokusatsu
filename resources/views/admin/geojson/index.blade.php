<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        GeoJSON
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create:geojson')
            @include('admin.geojson.create')
        @endcan
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @can('import:geojson')
            {{-- @include('admin.geojson.excel.import') --}}
        @endcan
    </x-slot>

    <!-- Button Export Excel -->
    <x-slot name="exportExcel">
        @can('export:geojson')
            {{-- @include('admin.geojson.excel.export') --}}
        @endcan
    </x-slot>

    <!-- Button Export PDF -->
    <x-slot name="exportPDF">
        @can('export:geojson')
            @include('admin.geojson.pdf.export')
        @endcan
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @can('soft-delete-all:geojson')
            @include('admin.geojson.softDeleteAll')
        @endcan
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @can('restore-all:geojson')
            @include('admin.geojson.restoreAll')
        @endcan
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all:geojson')
            @include('admin.geojson.deleteAll')
        @endcan
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('components.search')
    </x-slot>

    <!-- Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('District') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($geojsons as $geojson)
                <tr @if ($geojson->trashed()) class="text-muted" @endif>
                    <td>{{ $geojsons->firstItem() + $loop->index }}</td>
                    <td>{{ $geojson->name ?? '-' }}</td>
                    <td>
                        @if (isset($district[$geojson->district_id]))
                            {{ ucwords(strtolower($district[$geojson->district_id]->name)) }},
                            {{ ucwords(strtolower($district[$geojson->district_id]->regency->name)) }},
                            {{ ucwords(strtolower($district[$geojson->district_id]->regency->province->name)) }}
                        @else
                            <em>-</em>
                        @endif
                    </td>
                    <td class="manage-row text-center">
                        @if ($geojson->trashed())
                            <!-- Restore and Delete Button -->
                            @can('restore:geojson')
                                @include('admin.geojson.restore')
                            @endcan
                            @can('delete:geojson')
                                @include('admin.geojson.delete')
                            @endcan
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @can('edit:geojson')
                                @include('admin.geojson.edit')
                            @endcan
                            @can('soft-delete:geojson')
                                @include('admin.geojson.softDelete')
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
                <th>{{ __('District') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $geojsons->appends(['perPage' => $perPage, 'search' => $search])->links() }}

    <x-slot name="script">
        <x-preview-image />
    </x-slot>
</x-admin-table>
