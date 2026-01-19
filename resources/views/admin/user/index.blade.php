<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        User
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @can('create:user')
            @include('admin.user.create')
        @endcan
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Profile') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Status') }}</th>
                @canany(['edit:user', 'delete:user'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $item->name }}"
                                width="100">
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('storage/' . $item->img) }}"
                                    alt="{{ $item->img }}" width="100" loading="lazy">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1" role="dialog"
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
                    <td>{{ $item->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $item->email ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">
                        {{ $item->getRoleNames()->implode(', ') }}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        @if ($item->email_verified_at)
                            <span class="badge badge-success">aktif</span>
                        @else
                            <span class="badge badge-danger">tidak aktif</span>
                        @endif
                    </td>
                    @canany(['edit:user', 'delete:user'])
                        <td class="manage-row text-center">
                            @can('edit:user')
                                @include('admin.user.edit')
                            @endcan
                            @can('delete:user')
                                @include('admin.user.delete')
                            @endcan
                        </td>
                    @endcanany
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Profile') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Status') }}</th>
                @canany(['edit:user', 'delete:user'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </tfoot>
    </table>

</x-admin-table>
