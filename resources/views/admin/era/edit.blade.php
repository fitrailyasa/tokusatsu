<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $item->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.era.update', $item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data') }}
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="name" name="name" id="name"
                                    value="{{ old('name', $item->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Images') }}</label>
                                <input id="image-input" accept="image/*" type="file" id="image-input"
                                    class="form-control @error('img') is-invalid @enderror" placeholder="img"
                                    name="img" id="img" value="{{ old('img', $item->img) }}">
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description" name="description"
                                    id="description" rows="3">{{ old('description', $item->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="mb-3">
                                @if ($item->img == null)
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('assets/profile/default.png') }}" alt="{{ $item->name }}">
                                @else
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->name }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-button.close />
                    <x-button.save />
                </div>
            </form>
        </div>
    </div>
</div>
