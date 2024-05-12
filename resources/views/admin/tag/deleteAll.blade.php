<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm mx-1 btn-danger" data-toggle="modal" data-target="#modalDeleteAll"><i
        class="fas fa-trash"></i><span class="d-none d-sm-inline"> {{ __('Hapus Semua') }}</span></button>

<!-- Modal -->
<div class="modal fade" id="modalDeleteAll" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.tag.destroyAll') }}">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Hapus Semua Data') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus semua data?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Tutup') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Hapus Semua') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
