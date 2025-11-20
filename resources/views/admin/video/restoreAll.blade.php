<!-- Button to open modal restoreAll -->
<button role="button" class="btn btn-sm m-1 btn-dark" data-bs-toggle="modal" data-bs-target=".restoreAll"><i
        class="fas fa-undo"></i><span class="d-none d-sm-inline"> {{ __('Restore All') }}</span></button>

<!-- Modal Restore All -->
<div class="modal fade restoreAll" tabindex="-1" role="dialog" aria-labelledby="modalFormLabelRestore" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.video.restoreAll') }}">
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
                    <x-button.close />
                    <button type="submit" class="btn btn-success btn-submit">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">{{ __('Restore All') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
