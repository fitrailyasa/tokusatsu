<!-- Tombol untuk exportPDF -->
<button type="submit" role="button" class="btn btn-sm m-1 btn-secondary text-white"
    onclick="event.preventDefault(); document.getElementById('exportPDF').submit();"><i class="fas fa-download"></i><span
        class="d-none d-sm-inline"> {{ __('PDF') }}</span></button>

<!-- Form exportPDF -->
<form id="exportPDF" action="{{ route('admin.film.exportPDF') }}" method="GET" hidden>
</form>
