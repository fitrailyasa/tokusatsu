<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Add') }}</span></button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Add Data') }}</h5>
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
                                    placeholder="name" name="name" id="name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
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
                                        <option value="{{ old('franchise_id', $franchise->id) }}">{{ $franchise->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('franchise_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
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
                                        <option value="{{ old('era_id', $era->id) }}">{{ $era->name }}</option>
                                    @endforeach
                                </select>
                                @error('era_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="description" name="desc"
                                    id="desc" rows="3"></textarea>
                                @error('desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Images') }}</label>
                                <input id="image-input" accept="image/*" type="file"
                                    class="form-control @error('img') is-invalid @enderror" placeholder="img"
                                    name="img" id="img">
                                <img class="img-fluid py-3" id="image-preview" width="200px"
                                    src="{{ asset('assets/profile/default.png') }}" alt="Image Preview">
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
