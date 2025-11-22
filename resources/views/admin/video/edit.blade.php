<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $item->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.video.update', $item->id) }}" enctype="multipart/form-data">
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
                                <label class="form-label">{{ __('Title') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    placeholder="title" name="title" id="title"
                                    value="{{ old('title', $item->title) }}" required>
                                @error('title')
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
                                                    {{ $category->id == $item->category_id ? 'selected' : '' }}>
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Type') }}<span class="text-danger">*</span></label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type"
                                    id="type" required>
                                    <option selected disabled>{{ __('Select Type') }}</option>
                                    @foreach ($types as $type)
                                        <option value="{{ old('type', $type['id']) }}"
                                            {{ $type['id'] == $item->type ? 'selected' : '' }}>{{ $type['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Number of Episodes') }}<span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('number') is-invalid @enderror"
                                    placeholder="1" name="number" id="number"
                                    value="{{ old('number', $item->number) }}" required>
                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Link') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror"
                                    placeholder="https://google.com" name="link" id="link"
                                    value="{{ old('link', $item->link) }}" required>
                                @error('link')
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
