<!-- Tombol untuk export -->
<button type="submit" role="button" class="btn btn-sm btn-success text-white"
    onclick="event.preventDefault(); document.getElementById('export').submit();"><i class="fas fa-download"></i><span
        class="d-none d-sm-inline"> {{ __('Download') }}</span></button>

<!-- Form export -->
<form id="export" action="{{ route('admin.tag.export') }}" hidden>
    @csrf
</form>
