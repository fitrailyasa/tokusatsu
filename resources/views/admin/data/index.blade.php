<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Data
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create:data')
            @include('admin.data.create')
        @endcan
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @can('import:data')
            @include('admin.data.excel.import')
        @endcan
    </x-slot>

    <!-- Button Export Excel -->
    <x-slot name="exportExcel">
        @can('export:data')
            @include('admin.data.excel.export')
        @endcan
    </x-slot>

    <!-- Button Export PDF -->
    <x-slot name="exportPDF">
        @can('export:data')
            {{-- @include('admin.data.pdf.export') --}}
        @endcan
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @can('soft-delete-all:data')
            @include('admin.data.softDeleteAll')
        @endcan
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @can('restore-all:data')
            @include('admin.data.restoreAll')
        @endcan
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all:data')
            @include('admin.data.deleteAll')
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
                <th>{{ __('Images') }}</th>
                <th>{{ __('Tags') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $item)
                <tr @if ($item->trashed()) class="text-muted" @endif>
                    <td>{{ $datas->firstItem() + $loop->index }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $item->getCategoryColor() }}">
                            {{ $item->category->name ?? '-' }}
                        </span>
                    </td>
                    <td>
                        @if ($item->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $item->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target=".myModal{{ $item->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $item->img) }}"
                                    alt="{{ $item->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade myModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $item->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $item->img) }}"
                                                        alt="{{ $item->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $item->img) }}"
                                                        download="{{ $item->img }}"
                                                        class="btn btn-success mt-2 col-12">Download
                                                        Gambar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    {{-- Json Data Tags --}}
                    <td>
                        @php
                            $tagNames = $item->tags->pluck('name')->toArray();
                            $tagsString = implode(', ', $tagNames);
                            $decodedTags = explode(', ', $tagsString);
                        @endphp

                        @foreach ($decodedTags as $tag)
                            <span class="badge badge-primary">{{ $tag }}</span>
                        @endforeach
                    </td>
                    <td class="manage-row text-center">
                        @if ($item->trashed())
                            <!-- Restore and Delete Button -->
                            @can('restore:data')
                                @include('admin.data.restore')
                            @endcan
                            @can('delete:data')
                                @include('admin.data.delete')
                            @endcan
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @can('edit:data')
                                @include('admin.data.edit')
                            @endcan
                            @can('soft-delete:data')
                                @include('admin.data.softDelete')
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
                <th>{{ __('Images') }}</th>
                <th>{{ __('Tags') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $datas->appends(['category_id' => $categoryId, 'perPage' => $perPage, 'search' => $search])->links() }}

    <x-slot name="script">
        <x-preview-image />
    </x-slot>
</x-admin-table>
