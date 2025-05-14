<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Franchise
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.franchise.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.franchise.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.franchise.export')
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @include('admin.franchise.softDeleteAll')
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @include('admin.franchise.restoreAll')
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.franchise.deleteAll') --}}
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
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($franchises as $franchise)
                <tr @if ($franchise->trashed()) class="text-muted" @endif>
                    <td>{{ $franchises->firstItem() + $loop->index }}</td>
                    <td>{{ $franchise->name ?? '-' }}</td>
                    <td>
                        @if ($franchise->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $franchise->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $franchise->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $franchise->img) }}"
                                    alt="{{ $franchise->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $franchise->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $franchise->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $franchise->img) }}"
                                                        alt="{{ $franchise->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $franchise->img) }}"
                                                        download="{{ $franchise->img }}"
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
                    <td>{{ Illuminate\Support\Str::words($franchise->desc ?? '-', 10, '...') }}</td>
                    <td class="manage-row">
                        @if ($franchise->trashed())
                            <!-- Restore and Delete Button -->
                            @include('admin.franchise.restore')
                            @include('admin.franchise.delete')
                        @else
                            <!-- Edit and Soft Delete Buttons -->
                            @include('admin.franchise.edit')
                            @include('admin.franchise.softDelete')
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
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $franchises->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
