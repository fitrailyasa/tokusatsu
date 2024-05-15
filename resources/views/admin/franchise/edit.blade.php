<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $franchise->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $franchise->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.franchise.update', $franchise->id) }}"
                    enctype="multipart/form-data">
            @endif
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" name="name" id="name"
                                value="{{ old('name', $franchise->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Images') }}</label>
                            <input id="image-input" accept="image/*" type="file" id="img-input"
                                class="form-control @error('img') is-invalid @enderror" placeholder="img" name="img"
                                id="img" value="{{ old('img', $franchise->img) }}">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="description" name="desc"
                                id="desc" rows="3">{{ old('desc', $franchise->desc) }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            @if ($franchise->img == null)
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/profile/default.png') }}" alt="{{ $franchise->name }}">
                            @else
                                <img class="img-fluid rounded" width="200px" id="image-preview"
                                    src="{{ asset('assets/img/' . $franchise->img) }}" alt="{{ $franchise->name }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
