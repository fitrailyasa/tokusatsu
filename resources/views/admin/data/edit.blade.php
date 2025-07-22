<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $data->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.data.update', $data->id) }}" enctype="multipart/form-data">
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="name" name="name" id="name"
                                    value="{{ old('name', $data->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Category') }}<span class="text-danger">*</span></label>
                                <select class="form-select @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category_id" required>
                                    <option selected disabled>{{ __('Select Category') }}</option>
                                    @foreach ($groupedCategories as $franchiseName => $categoriesGroup)
                                        <optgroup label="{{ $franchiseName }}">
                                            @foreach ($categoriesGroup as $category)
                                                <option value="{{ old('category_id', $category->id) }}"
                                                    {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
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
                                    <img class="img-fluid rounded" width="200px"
                                        src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}">
                                @else
                                    <img class="img-fluid rounded" width="200px"
                                        src="{{ asset('storage/' . $data->img) }}" alt="{{ $data->name }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row border-bottom">
                        <div class="col-md-12 text-center">
                            <div class="mb-3">
                                <input type="file" class="form-control @error('img') is-invalid @enderror"
                                    placeholder="img" name="img" id="img"
                                    value="{{ old('img', $data->img) }}" enabled>
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label">{{ __('Tag') }}</label>
                            <div class="btn-group d-flex flex-wrap" role="group" aria-label="Tags">
                                @foreach ($tags as $tag)
                                    @php
                                        $checked = false;
                                        if (is_array(old('tags'))) {
                                            $checked = in_array($tag->id, old('tags'));
                                        } else {
                                            $checked = $data->tags->contains($tag->id); // Gunakan relasi tag
                                        }
                                    @endphp

                                    <input type="checkbox" class="btn-check" name="tags[]" value="{{ $tag->id }}"
                                        id="edit-tag{{ $data->id }}-{{ $tag->id }}" autocomplete="off"
                                        {{ $checked ? 'checked' : '' }}>

                                    <label class="btn btn-outline-primary m-1"
                                        for="edit-tag{{ $data->id }}-{{ $tag->id }}">{{ $tag->name }}</label>
                                @endforeach
                            </div>
                            @error('tags')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
