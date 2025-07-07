<!-- Tombol untuk membuka modal restoreAll -->
<button role="button" class="btn btn-sm m-1 btn-dark" data-bs-toggle="modal" data-bs-target=".restoreAll"><i
        class="fas fa-undo"></i><span class="d-none d-sm-inline"> {{ __('Restore All') }}</span></button>

<!-- Modal Restore All -->
<div class="modal fade restoreAll" tabindex="-1" role="dialog" aria-labelledby="modalFormLabelRestore" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.film.restoreAll') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabelRestore">{{ __('Restore All Data') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to restore all deleted data?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Restore All') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
