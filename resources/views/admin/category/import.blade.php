<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-secondary" data-bs-toggle="modal" data-bs-target=".formImport"><i
        class="fas fa-upload"></i> <span class="d-none d-sm-inline">{{ __('Upload') }}</span></button>

<!-- Modal -->
<div class="modal fade formImport" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.category.import') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Upload Category') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label">{{ __('Upload File') }}</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                placeholder="file" name="file" id="file" required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="{{ asset('assets/template/category-template.xlsx') }}"
                    download="category-template.xlsx">{{ __('Download Format') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
