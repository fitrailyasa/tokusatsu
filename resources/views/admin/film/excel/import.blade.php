<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-info" data-bs-toggle="modal" data-bs-target=".formImport"><i
        class="fas fa-upload"></i> <span class="d-none d-sm-inline">{{ __('Upload') }}</span></button>

<!-- Modal -->
<div class="modal fade formImport" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.film.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Upload Film') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-1">
                                <label class="form-label">{{ __('Upload File') }}<span
                                        class="text-danger">*</span></label>
                                <input type="file" accept=".xlsx"
                                    class="form-control @error('file') is-invalid @enderror" placeholder="file"
                                    name="file" id="file" required>
                                <small class="text-muted">{{ __('Max: 10MB') }}</small>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success" href="{{ asset('assets/template/film-template.xlsx') }}"
                        download="film-template.xlsx">{{ __('Download Format') }}</a>
                    <button type="submit" class="btn btn-primary btn-submit">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">{{ __('Save') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
