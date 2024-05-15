<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $data->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.data.update', $data->id) }}" enctype="multipart/form-data">
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
                                placeholder="name" name="name" id="name" value="{{ old('name', $data->name) }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Category') }}</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                id="category_id" required>
                                <option selected disabled>{{ __('Select Category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('category_id', $category->id) }}"
                                        {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Images') }}</label><br>
                            @if ($data->img == null)
                                <img class="img-fluid rounded" width="300px"
                                    src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}">
                            @else
                                <img class="img-fluid rounded" width="300px"
                                    src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->name }}">
                            @endif
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-md-12 text-center">
                        <div class="mb-3">
                            <input type="file" class="form-control @error('img') is-invalid @enderror"
                                placeholder="img" name="img" id="img" value="{{ old('img', $data->img) }}"
                                enabled>
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-group" id="tags">
                        <label for="tag">{{ __('Tag') }}</label>
                        <div class="tags-container">
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tags[]"
                                        value="{{ old('tags[]', $tag->id) }}" id="tag{{ $tag->id }}"
                                        {{ in_array($tag->id, $data->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tag{{ $tag->id }}">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
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
