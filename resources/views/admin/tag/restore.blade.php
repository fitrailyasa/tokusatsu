<!-- Tombol untuk membuka modal Restore -->
<button role="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
    data-bs-target=".formRestore{{ $tag->id }}"><i class="fas fa-undo"></i><span class="d-none d-sm-inline">
        {{ __('Restore') }}</span></button>

<!-- Modal -->
<div class="modal fade formRestore{{ $tag->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Restore Data') }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin mengembalikan data ini?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.tag.restore', $tag->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                    <input type="submit" class="btn btn-success light" name="" id="" value="Restore">
                </form>
            </div>
        </div>
    </div>
</div>
