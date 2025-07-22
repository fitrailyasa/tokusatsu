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
                <form method="POST" action="{{ route('admin.category.destroyAll') }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Delete All') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
