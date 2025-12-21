<!-- Tombol untuk export -->
<button type="submit" role="button" class="btn btn-sm m-1 btn-success text-white"
    onclick="event.preventDefault(); document.getElementById('export').submit();"><i class="fas fa-file-excel"></i><span
        class="d-none d-sm-inline"> {{ __('Excel') }}</span></button>

<!-- Form export -->
<form id="export" action="{{ route('admin.video.exportExcel') }}" hidden>
    @csrf
    @if (request()->has('category_id'))
        <input type="hidden" name="category_id" value="{{ request()->category_id }}">
    @endif
</form>
