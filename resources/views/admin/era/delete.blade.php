<!-- Tombol untuk membuka modal -->
<a role="button" class="btn-sm btn-danger delete-button" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $era->id }}"><i class="fas fa-trash"></i></a>

<!-- Modal -->
<div class="modal fade formEdit{{ $era->id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Hapus @yield('title')</strong>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus
                @yield('title')?</div>
            <div class="modal-footer">
                <form action="{{ route('admin.era.destroy', $era->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger light" name="" id="" value="Hapus">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                </form>
            </div>
        </div>
    </div>
</div>
