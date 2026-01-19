<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-danger" data-bs-toggle="modal" data-bs-target=".deleteAll"><i
        class="fas fa-skull"></i><span class="d-none d-sm-inline"> {{ __('Delete All') }}</span></button>

<!-- Modal -->
<div class="modal fade deleteAll" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ __('Permanently Delete All Data') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to permanently delete all data?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('admin.video-react.destroyAll') }}">
                    @csrf
                    @method('DELETE')
                    <x-button.close />
                    <button type="submit" class="btn btn-danger btn-submit">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">{{ __('Delete All') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
