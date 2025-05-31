<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Era
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create-era')
            @include('admin.era.create')
        @endcan
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @can('import-era')
            @include('admin.era.import')
        @endcan
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @can('export-era')
            @include('admin.era.export')
        @endcan
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @can('soft-delete-all-era')
            @include('admin.era.softDeleteAll')
        @endcan
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @can('restore-all-era')
            @include('admin.era.restoreAll')
        @endcan
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all-era')
            @include('admin.era.deleteAll')
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
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eras as $era)
                <tr @if ($era->trashed()) class="text-muted" @endif>
                    <td>{{ $eras->firstItem() + $loop->index }}</td>
                    <td>{{ $era->name ?? '-' }}</td>
                    <td>
                        @if ($era->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $era->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $era->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $era->img) }}"
                                    alt="{{ $era->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $era->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $era->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $era->img) }}"
                                                        alt="{{ $era->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $era->img) }}"
                                                        download="{{ $era->img }}"
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
                    <td>{{ Illuminate\Support\Str::words($era->desc ?? '-', 10, '...') }}</td>
                    <td class="manage-row text-center">
                        @if ($era->trashed())
                            <!-- Restore and Delete Button -->
                            @can('restore-era')
                                @include('admin.era.restore')
                            @endcan
                            @can('delete-era')
                                @include('admin.era.delete')
                            @endcan
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @can('edit-era')
                                @include('admin.era.edit')
                            @endcan
                            @can('soft-delete-era')
                                @include('admin.era.softDelete')
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
                <th class="text-center">{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $eras->appends(['perPage' => $perPage, 'search' => $search])->links() }}

    <x-slot name="script">
        <x-preview-image />
    </x-slot>
</x-admin-table>
