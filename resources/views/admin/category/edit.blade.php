<div class="modal-content">
    @if (auth()->user()->roles_id == 1)
        <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
    @endif
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Edit @yield('title')
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name"
                        name="name" id="name" value="{{ $category->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Franchise</label>
                    <select class="form-select @error('franchise_id') is-invalid @enderror" name="franchise_id"
                        id="franchise_id" required>
                        <option selected disabled>Select Franchise</option>
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
                    <label class="form-label">Era</label>
                    <select class="form-select @error('era_id') is-invalid @enderror" name="era_id" id="era_id"
                        required>
                        <option selected disabled>Select Era</option>
                        @foreach ($eras as $era)
                            <option value="{{ $era->id }}" {{ $era->id == $category->era_id ? 'selected' : '' }}>
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
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>
