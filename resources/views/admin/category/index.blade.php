<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Category
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.category.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.category.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.category.export')
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @include('admin.category.softDeleteAll')
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @include('admin.category.restoreAll')
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.category.deleteAll') --}}
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
                <th>{{ __('Img') }}</th>
                <th>{{ __('Desc') }}</th>
                <th>{{ __('Era') }}</th>
                <th>{{ __('Franchise') }}</th>
                <th>{{ __('Action') }}</th>
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
                    <td class="manage-row">
                        @if ($category->trashed())
                            <!-- Restore and Delete Button -->
                            @include('admin.category.restore')
                            @include('admin.category.delete')
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @include('admin.category.edit')
                            @include('admin.category.softDelete')
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
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $categories->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
