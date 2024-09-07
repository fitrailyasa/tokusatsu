<!-- Tombol untuk membuka modal restoreAll -->
<button role="button" class="btn btn-sm mx-1 btn-info" data-bs-toggle="modal" data-bs-target=".restoreAll"><i
        class="fas fa-undo"></i><span class="d-none d-sm-inline"> {{ __('Restore Semua') }}</span></button>

<!-- Modal Restore All -->
<div class="modal fade restoreAll" tabindex="-1" role="dialog" aria-labelledby="modalFormLabelRestore" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.franchise.restoreAll') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabelRestore">{{ __('Restore Semua Data') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin mengembalikan semua data yang telah dihapus?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Restore Semua') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
