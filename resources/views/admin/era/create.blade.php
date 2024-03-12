<!-- Tombol untuk membuka modal -->
<a role="button" class="btn-sm mx-1 btn-primary" data-toggle="modal" data-target="#modalFormCreate"><i
        class="fas fa-plus"></i> Tambah</a>

<!-- Modal -->
<div class="modal fade" id="modalFormCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if (auth()->user()->roles_id == 1)
                <form method="POST" action="{{ route('admin.era.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">Tambah @yield('title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" name="name" id="name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
