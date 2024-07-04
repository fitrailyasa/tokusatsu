<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Era
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.era.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.era.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.era.export')
    </x-slot>

    <!-- Button Delete All -->
    {{-- <x-slot name="deleteAll">
        @include('admin.era.deleteAll')
    </x-slot> --}}

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Images') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Desc') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eras as $era)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $era->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        @if ($era->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $era->name }}"
                                width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $era->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $era->img) }}"
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
                                                        src="{{ asset('assets/img/' . $era->img) }}"
                                                        alt="{{ $era->img }}">
                                                    <!-- Tombol Download -->
                                                    <a href="{{ asset('assets/img/' . $era->img) }}"
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
                    <td class="d-none d-lg-table-cell">{{ $era->desc ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.era.edit')
                            @include('admin.era.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Images') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Desc') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>

</x-admin-table>
