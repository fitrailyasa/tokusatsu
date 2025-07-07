<!-- Tombol untuk membuka modal Restore -->
<button role="button" class="btn btn-sm m-1 btn-info" data-bs-toggle="modal"
    data-bs-target=".formRestore{{ $film->id }}"><i class="fas fa-undo"></i><span class="d-none d-sm-inline">
        {{ __('Restore') }}</span></button>

<!-- Modal -->
<div class="modal fade formRestore{{ $film->id }}" tabindex="-1" role="dialog" aria-hidden="">
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
                <form action="{{ route('admin.film.restore', $film->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <input type="submit" class="btn btn-success light" name="" id="" value="Restore">
                </form>
            </div>
        </div>
    </div>
</div>
