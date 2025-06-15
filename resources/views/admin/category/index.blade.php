<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Category
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create-category')
            @include('admin.category.create')
        @endcan
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @can('import-category')
            @include('admin.category.excel.import')
        @endcan
    </x-slot>

    <!-- Button Export Excel -->
    <x-slot name="exportExcel">
        @can('export-category')
            @include('admin.category.excel.export')
        @endcan
    </x-slot>

    <!-- Button Export PDF -->
    <x-slot name="exportPDF">
        @can('export-category')
            @include('admin.category.pdf.export')
        @endcan
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @can('soft-delete-all-category')
            @include('admin.category.softDeleteAll')
        @endcan
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @can('restore-all-category')
            @include('admin.category.restoreAll')
        @endcan
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all-category')
            @include('admin.category.deleteAll')
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
                <th>{{ __('Img') }}</th>
                <th>{{ __('Desc') }}</th>
                <th>{{ __('Era') }}</th>
                <th>{{ __('Franchise') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr @if ($category->trashed()) class="text-muted" @endif>
                    <td>{{ $categories->firstItem() + $loop->index }}</td>
                    <td>{{ $category->name ?? '-' }}</td>
                    <td>
                        @if ($category->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $category->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target=".myModal{{ $category->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $category->img) }}"
                                    alt="{{ $category->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade myModal{{ $category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $category->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $category->img) }}"
                                                        alt="{{ $category->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $category->img) }}"
                                                        download="{{ $category->img }}"
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
                    <td>{{ Illuminate\Support\Str::words($category->desc ?? '-', 10, '...') }}</td>
                    <td>
                        <span class="badge bg-{{ $category->getEraColor() }}">
                            {{ $category->era->name ?? '-' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-{{ $category->getFranchiseColor() }}">
                            {{ $category->franchise->name ?? '-' }}
                        </span>
                    </td>
                    <td class="manage-row text-center">
                        @if ($category->trashed())
                            <!-- Restore and Delete Button -->
                            @can('restore-category')
                                @include('admin.category.restore')
                            @endcan
                            @can('delete-category')
                                @include('admin.category.delete')
                            @endcan
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @can('edit-category')
                                @include('admin.category.edit')
                            @endcan
                            @can('soft-delete-category')
                                @include('admin.category.softDelete')
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
                <th>{{ __('Img') }}</th>
                <th>{{ __('Desc') }}</th>
                <th>{{ __('Era') }}</th>
                <th>{{ __('Franchise') }}</th>
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $categories->appends(['era_id' => $eraId, 'franchise_id' => $franchiseId, 'perPage' => $perPage, 'search' => $search])->links() }}

    <x-slot name="script">
        <x-preview-image />
    </x-slot>
</x-admin-table>
