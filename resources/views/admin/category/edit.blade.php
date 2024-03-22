<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $category->id }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</button>

<!-- Modal -->
<div class="modal fade formEdit{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->roles_id == 1)
                <form method="POST" action="{{ route('admin.category.update', $category->id) }}"
                    enctype="multipart/form-data">
            @endif
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Edit') }} @yield('title')
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" name="name" id="name" value="{{ $category->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Franchise') }}</label>
                            <select class="form-select @error('franchise_id') is-invalid @enderror" name="franchise_id"
                                id="franchise_id" required>
                                <option selected disabled>{{ __('Select Franchise') }}</option>
                                @foreach ($franchises as $franchise)
                                    <option value="{{ $franchise->id }}"
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
                            <label class="form-label">{{ __('Era') }}</label>
                            <select class="form-select @error('era_id') is-invalid @enderror" name="era_id"
                                id="era_id" required>
                                <option selected disabled>{{ __('Select Era') }}</option>
                                @foreach ($eras as $era)
                                    <option value="{{ $era->id }}"
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
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Images') }}</label><br>
                                @if ($category->img == null)
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('assets/profile/default.png') }}" alt="{{ $category->name }}">
                                @else
                                    <img class="img-fluid rounded" width="200px" id="image-preview"
                                        src="{{ asset('assets/img/' . $category->img) }}" alt="{{ $category->name }}">
                                @endif
                                @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="mb-3">
                                <input type="file" accept="image/*" id="image-input"
                                    class="form-control @error('img') is-invalid @enderror" placeholder="img"
                                    name="img" id="img" value="{{ $category->img }}" enabled>
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
