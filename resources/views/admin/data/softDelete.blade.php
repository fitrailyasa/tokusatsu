<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-danger" data-bs-toggle="modal"
    data-bs-target=".formSoftDelete{{ $item->id }}"><i class="fas fa-trash"></i><span class="d-none d-sm-inline">
        {{ __('Delete') }}</span></button>

<!-- Modal -->
<div class="modal fade formSoftDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Delete Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">Are you sure you want to delete data?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.data.softDelete', $item->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <x-button.close />
                    <button type="submit" class="btn btn-danger btn-submit">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">{{ __('Delete') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
