@section('title', 'Franchise')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Kelola Tabel {{ $title ?? '' }}</h3>
            <div class="d-flex justify-content-end mb-3">
                @include('admin.franchise.create')
                @include('admin.franchise.import')
                @include('admin.franchise.export')
                @include('admin.franchise.softDeleteAll')
                @include('admin.franchise.restoreAll')
            </div>
        </div>
        @include('components.alert')
        @include('components.search')

        <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="name" wire:model="name" id="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Images') }}</label>
                        <input id="image-input" accept="image/*" type="file"
                            class="form-control @error('img') is-invalid @enderror" placeholder="img" wire:model="img"
                            id="img">
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Description') }}</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="description" wire:model="desc"
                            id="desc" rows="3"></textarea>
                        @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="mb-3">
                        <img class="img-fluid py-3" id="image-preview" width="200px"
                            src="{{ asset('assets/profile/default.png') }}" alt="Image Preview">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ $isUpdate ? 'Update' : 'Create' }}</button>
        </form>

        <table class="table table-bordered table-striped mt-3">
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
                @forelse ($franchises as $franchise)
                    <tr>
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
                        <td>
                            <button wire:click="edit({{ $franchise->id }})"
                                class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $franchise->id }})"
                                class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('No franchises available') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $franchises->links() }}
    </div>
</div>
