<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Data
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.data.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.data.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.data.export')
    </x-slot>

    <!-- Button Soft Delete All -->
    <x-slot name="softDeleteAll">
        @include('admin.data.softDeleteAll')
    </x-slot>

    <!-- Button Restore All -->
    <x-slot name="restoreAll">
        @include('admin.data.restoreAll')
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.data.deleteAll') --}}
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
                <th>{{ __('Category') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('Tags') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr @if ($data->trashed()) class="text-muted" @endif>
                    <td>{{ $datas->firstItem() + $loop->index }}</td>
                    <td>{{ $data->name ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $data->getCategoryColor() }}">
                            {{ $data->category->name ?? '-' }}
                        </span>
                    </td>
                    <td>
                        @if ($data->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target=".myModal{{ $data->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $data->img) }}"
                                    alt="{{ $data->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade myModal{{ $data->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $data->name }}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="maximize"><i
                                                                class="fas fa-expand"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img img-fluid col-12"
                                                        src="{{ asset('storage/' . $data->img) }}"
                                                        alt="{{ $data->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('storage/' . $data->img) }}"
                                                        download="{{ $data->img }}"
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
                            $tagNames = $data->tags->pluck('name')->toArray();
                            $tagsString = implode(', ', $tagNames);
                            $decodedTags = explode(', ', $tagsString);
                        @endphp

                        @foreach ($decodedTags as $tag)
                            <span class="badge badge-primary">{{ $tag }}</span>
                        @endforeach
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @if ($data->trashed())
                                <!-- Restore and Delete Button -->
                                @include('admin.data.restore')
                                @include('admin.data.delete')
                            @else
                                <!-- Edit and Soft Delete Buttons -->
                                @include('admin.data.edit')
                                @include('admin.data.softDelete')
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
                <th>{{ __('Category') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('Tags') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>
    {{ $datas->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
