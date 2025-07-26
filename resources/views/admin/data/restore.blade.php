<!-- Button to open modal Restore -->
<button role="button" class="btn btn-sm m-1 btn-dark" data-bs-toggle="modal"
    data-bs-target=".formRestore{{ $data->id }}"><i class="fas fa-undo"></i><span class="d-none d-sm-inline">
        {{ __('Restore') }}</span></button>

<!-- Modal -->
<div class="modal fade formRestore{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Restore Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">Are you sure you want to restore this data?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.data.restore', $data->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-success btn-submit">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">{{ __('Restore') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
