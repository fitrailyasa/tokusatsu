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

    <!-- Button Delete All -->
    {{-- <x-slot name="deleteAll">
        @include('admin.data.deleteAll')
    </x-slot> --}}

    <!-- Style -->
    <style>
        .tags-container {
            display: flex;
            flex-wrap: wrap;
        }

        .form-check {
            margin-right: 25px;
            /* Jarak antar tag */
        }
    </style>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('Tags') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $data->name ?? '-' }}</td>
                    <td>{{ $data->category->name ?? '-' }}</td>
                    <td>
                        @if ($data->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}" width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $data->img) }}"
                                    alt="{{ $data->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog"
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
                                                        src="{{ asset('assets/img/' . $data->img) }}"
                                                        alt="{{ $data->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $data->img) }}"
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
                            @include('admin.data.edit')
                            @include('admin.data.delete')
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
                <th>{{ __('More') }}</th>
            </tr>
            <tr>
                <th colspan="5">
                    {{ $datas->links() }}
                </th>
            </tr>
        </tfoot>
    </table>

    @section('activeData', 'aktif')
</x-admin-table>
