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

    <div class="alert alert-warning d-flex align-items-center mb-3">
        <span>
            Total videos without links:
            <strong>{{ $totalEmptyLinks }}</strong>
        </span>
    </div>

    @if ($emptyLinkPerCategory->isNotEmpty())
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-2">
                @foreach ($emptyLinkPerCategory as $row)
                    <span class="badge bg-warning text-dark px-3 py-2">
                        {{ $row->category->name ?? 'Tanpa Kategori' }}
                        <span class="fw-bold">({{ $row->total }})</span>
                    </span>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Link') }}</th>
                <th>{{ __('Release') }}</th>
                @can('edit:video')
                    <th>{{ __('Status') }}</th>
                @endcan
                @canany(['edit:video', 'delete:video'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $item)
                <tr @if ($item->trashed()) class="text-muted" @endif>
                    <td>{{ $videos->firstItem() + $loop->index }}</td>
                    <td>{{ Illuminate\Support\Str::words($item->title ?? '-', 10, '...') }}</td>
                    <td>
                        <span class="badge bg-{{ $item->getCategoryColor() }}">
                            {{ $item->category->name ?? '-' }}
                        </span>
                    </td>
                    <td>{{ $item->type ?? '-' }} {{ $item->number ?? 0 }}</td>
                    {{-- <td><a href="{{ $item->link ?? '-' }}" target="_blank">{{ $item->link ?? '-' }}</a></td> --}}
                    <td>
                        @forelse ($item->link ?? [] as $url)
                            <a href="{{ $url }}" target="_blank">{{ $url }}</a><br>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ date('d M Y', strtotime($item->airdate)) }}</td>
                    @can('edit:video')
                        <td class="text-center">
                            <form action="{{ route('admin.video.toggleStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label class="toggle-switch">
                                    <input type="checkbox" onchange="this.form.submit()"
                                        {{ $item->status == 1 ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </form>
                        </td>
                    @endcan
                    @canany(['edit:video', 'delete:video'])
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
                    @endcanany
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Link') }}</th>
                <th>{{ __('Release') }}</th>
                @can('edit:video')
                    <th>{{ __('Status') }}</th>
                @endcan
                @canany(['edit:video', 'delete:video'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </tfoot>
    </table>
    {{ $videos->appends(['category_id' => $categoryId, 'perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
