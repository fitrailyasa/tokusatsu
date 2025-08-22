<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $category->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.category.update', $category->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data') }}
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="name" name="name" id="name"
                                    value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Franchise') }}<span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('franchise_id') is-invalid @enderror"
                                    name="franchise_id" id="franchise_id" required>
                                    <option selected disabled>{{ __('Select Franchise') }}</option>
                                    @foreach ($franchises as $franchise)
                                        <option value="{{ old('franchise_id', $franchise->id) }}"
                                            {{ $franchise->id == $category->franchise_id ? 'selected' : '' }}>
                                            {{ $franchise->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('franchise_id')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Era') }}<span class="text-danger">*</span></label>
                                <select class="form-select @error('era_id') is-invalid @enderror" name="era_id"
                                    id="era_id" required>
                                    <option selected disabled>{{ __('Select Era') }}</option>
                                    @foreach ($eras as $era)
                                        <option value="{{ old('era_id', $era->id) }}"
                                            {{ $era->id == $category->era_id ? 'selected' : '' }}>
                                            {{ $era->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('era_id')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description" name="description"
                                    id="description" rows="3">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Images') }}</label><br>
                                @if ($category->img == null)
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('assets/profile/default.png') }}" alt="{{ $category->name }}">
                                @else
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->name }}">
                                @endif
                                @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="mb-3">
                                <input type="file" accept="image/*" id="image-input"
                                    class="form-control @error('img') is-invalid @enderror" placeholder="img"
                                    name="img" id="img" value="{{ old('img', $category->img) }}" enabled>
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
