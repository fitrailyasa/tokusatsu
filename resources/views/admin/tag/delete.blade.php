<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-danger" data-bs-toggle="modal"
    data-bs-target=".formDelete{{ $tag->id }}"><i class="fas fa-skull"></i><span class="d-none d-sm-inline">
        {{ __('Delete') }}</span></button>

<!-- Modal -->
<div class="modal fade formDelete{{ $tag->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Permanently Delete Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">Are you sure you want to delete data permanently?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <input type="submit" class="btn btn-danger light" name="" id="" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
