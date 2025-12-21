<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Add') }}</span></button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.video.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Add Data') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row border-bottom">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Title') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    placeholder="title" name="title" id="title" value="{{ old('title') }}"
                                    required>
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
                                                <option value="{{ old('category_id', $category->id) }}">
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
                                        <option value="{{ old('type', $type['id']) }}">{{ $type['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Number of Episodes') }} <small
                                        class="text-muted">(Optional)</small></label>
                                <input type="number" class="form-control @error('number') is-invalid @enderror"
                                    placeholder="1" name="number" id="number" value="{{ old('number') }}">
                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Link') }}</label>

                                <div id="create-link-wrapper">
                                    @php
                                        $links = old('link', []);
                                    @endphp

                                    @forelse ($links as $index => $url)
                                        <div class="input-group mb-2">
                                            <input type="url" name="link[]"
                                                class="form-control @error("link.$index") is-invalid @enderror"
                                                value="{{ $url }}" placeholder="https://google.com">

                                            <button type="button" class="btn btn-outline-danger"
                                                onclick="removeCreateLink(this)">
                                                ✕
                                            </button>

                                            @error("link.$index")
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @empty
                                        <div class="input-group mb-2">
                                            <input type="url" name="link[]" class="form-control"
                                                placeholder="https://google.com">

                                            <button type="button" class="btn btn-outline-danger"
                                                onclick="removeCreateLink(this)">
                                                ✕
                                            </button>
                                        </div>
                                    @endforelse
                                </div>

                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="addCreateLink()">
                                    + Add Link
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Release Date') }}</label>
                                <input type="date" class="form-control @error('airdate') is-invalid @enderror"
                                    name="airdate" id="airdate" value="{{ old('airdate') }}">
                                @error('airdate')
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
<script>
    function addCreateLink() {
        const wrapper = document.getElementById('create-link-wrapper');

        const div = document.createElement('div');
        div.className = 'input-group mb-2';

        div.innerHTML = `
            <input type="url" name="link[]" class="form-control" placeholder="https://google.com">
            <button type="button" class="btn btn-outline-danger" onclick="removeCreateLink(this)">✕</button>
        `;

        wrapper.appendChild(div);
    }

    function removeCreateLink(button) {
        const wrapper = document.getElementById('create-link-wrapper');

        if (wrapper.children.length > 1) {
            button.closest('.input-group').remove();
        }
    }
</script>
