<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $item->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.category.update', $item->id) }}" enctype="multipart/form-data">
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
                                <label class="form-label">{{ __('Full Name') }}<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                    placeholder="fullname" name="fullname" id="fullname"
                                    value="{{ old('fullname', $item->fullname) }}" required>
                                @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="name" name="name" id="name"
                                    value="{{ old('name', $item->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Franchise') }}<span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('franchise_id') is-invalid @enderror"
                                    name="franchise_id" id="franchise_id" required>
                                    <option selected disabled>{{ __('Select Franchise') }}</option>
                                    @foreach ($franchises as $franchise)
                                        <option value="{{ old('franchise_id', $franchise->id) }}"
                                            {{ $franchise->id == $item->franchise_id ? 'selected' : '' }}>
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
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Era') }}<span class="text-danger">*</span></label>
                                <select class="form-select @error('era_id') is-invalid @enderror" name="era_id"
                                    id="era_id" required>
                                    <option selected disabled>{{ __('Select Era') }}</option>
                                    @foreach ($eras as $era)
                                        <option value="{{ old('era_id', $era->id) }}"
                                            {{ $era->id == $item->era_id ? 'selected' : '' }}>
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
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">{{ __('First Aired') }}<span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('first_aired') is-invalid @enderror"
                                    placeholder="first_aired" name="first_aired" id="first_aired"
                                    value="{{ old('first_aired', $item->first_aired) }}" required>
                                @error('first_aired')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Last Aired') }}</label>
                                <input type="date" class="form-control @error('last_aired') is-invalid @enderror"
                                    placeholder="last_aired" name="last_aired" id="last_aired"
                                    value="{{ old('last_aired', $item->last_aired) }}">
                                @error('last_aired')
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
                                <label class="form-label">{{ __('Images') }}</label><br>
                                @if ($item->img == null)
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('assets/profile/default.png') }}" alt="{{ $item->name }}">
                                @else
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->name }}">
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
                                    name="img" id="img" value="{{ old('img', $item->img) }}" enabled>
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
