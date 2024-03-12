<!-- Tombol untuk membuka modal -->
<a role="button" class="btn-sm btn-warning mr-2" data-bs-toggle="modal"
    data-bs-target=".bd-example-modal-sm{{ $era->id }}"><i class="fas fa-edit"></i></a>

<!-- Modal -->
<div class="modal fade bd-example-modal-sm{{ $era->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->roles_id == 1)
                <form method="POST" action="{{ route('admin.era.update', $era->id) }}" enctype="multipart/form-data">
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
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" name="name" id="name" value="{{ $era->name }}" required>
                            @error('name')
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
    </div>
</div>
