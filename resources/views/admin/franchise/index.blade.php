<x-admin-table>

    @include('components.table-header', ['permission' => $permission])

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Img') }}</th>
                <th>{{ __('Description') }}</th>
                @can('edit:' . $permission)
                    <th>{{ __('Status') }}</th>
                @endcan
                @canany(['edit:' . $permission, 'delete:' . $permission])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </thead>
        <tbody>
            @foreach ($franchises as $item)
                <tr @if ($item->trashed()) class="text-muted" @endif>
                    <td>{{ $franchises->firstItem() + $loop->index }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>
                        @if ($item->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $item->name }}" width="100">
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
                    <td>{{ Illuminate\Support\Str::words($item->description ?? '-', 10, '...') }}</td>
                    @can('edit:franchise')
                        <td class="text-center">
                            <form action="{{ route('admin.franchise.toggleStatus', $item->id) }}" method="POST">
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
                    @include('components.table-action', ['permission' => $permission, 'item' => $item])
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Img') }}</th>
                <th>{{ __('Description') }}</th>
                @can('edit:' . $permission)
                    <th>{{ __('Status') }}</th>
                @endcan
                @canany(['edit:' . $permission, 'delete:' . $permission])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </tfoot>
    </table>
    {{ $franchises->appends(['perPage' => $perPage, 'search' => $search])->links('vendor.pagination.mobile') }}

    <x-slot name="script">
        <x-preview-image />
    </x-slot>
</x-admin-table>
