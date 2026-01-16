<!-- Title -->
<x-slot name="title">
    {{ ucwords($permission) ?? '' }}
</x-slot>

<!-- Button Form Create -->
<x-slot name="formCreate">
    @can('create:' . $permission)
        @include('admin.' . $permission . '.create')
    @endcan
</x-slot>

<!-- Button Import -->
<x-slot name="import">
    @can('import:' . $permission)
        <!-- Button to open modal -->
        <button role="button" class="btn btn-sm m-1 btn-info" data-bs-toggle="modal" data-bs-target=".formImport"><i
                class="fas fa-upload"></i> <span class="d-none d-sm-inline">{{ __('Upload') }}</span></button>

        <!-- Modal -->
        <div class="modal fade formImport" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.' . $permission . '.import') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFormLabel">{{ __('Upload Data') }}</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{ __('Upload File') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="file" accept=".xlsx"
                                            class="form-control @error('file') is-invalid @enderror" placeholder="file"
                                            name="file" id="file" required>
                                        <small class="text-muted">{{ __('Max: 10MB') }}</small>
                                        @error('file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-success"
                                href="{{ asset('assets/template/' . $permission . '-template.xlsx') }}"
                                download="{{ $permission . '-template.xlsx' }}">{{ __('Download Format') }}</a>
                            <button type="submit" class="btn btn-primary btn-submit">
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                                <span class="btn-text">{{ __('Save') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
</x-slot>

<!-- Button Export Excel -->
<x-slot name="exportExcel">
    @can('export:' . $permission)
        <!-- Tombol untuk export -->
        <button type="submit" role="button" class="btn btn-sm m-1 btn-success text-white"
            onclick="event.preventDefault(); document.getElementById('export').submit();"><i
                class="fas fa-file-excel"></i><span class="d-none d-sm-inline"> {{ __('Excel') }}</span></button>

        <!-- Form export -->
        <form id="export" action="{{ route('admin.' . $permission . '.exportExcel') }}" hidden>
            @csrf
        </form>
    @endcan
</x-slot>

<!-- Button Export PDF -->
<x-slot name="exportPDF">
    @can('export:' . $permission)
        {{-- <!-- Tombol untuk exportPDF -->
        <button type="submit" role="button" class="btn btn-sm m-1 btn-secondary text-white"
            onclick="event.preventDefault(); document.getElementById('exportPDF').submit();"><i
                class="fas fa-file-pdf"></i><span class="d-none d-sm-inline"> {{ __('PDF') }}</span></button>

        <!-- Form exportPDF -->
        <form id="exportPDF" action="{{ route('admin.' . $permission . '.exportPDF') }}" method="GET" hidden>
        </form> --}}
    @endcan
</x-slot>

<!-- Button Soft Delete All -->
<x-slot name="softDeleteAll">
    @can('soft-delete-all:' . $permission)
        <x-table-modal modalMethod="DELETE" route="{{ route('admin.' . $permission . '.softDeleteAll') }}"
            modalTitle="Delete All Data" modalText="Are you sure you want to delete all data?" buttonText="Delete All"
            buttonIcon="fa-trash" buttonColor="btn-danger" modalType="softDeleteAll" />
    @endcan
</x-slot>

<!-- Button Restore All -->
<x-slot name="restoreAll">
    @can('restore-all:' . $permission)
        <x-table-modal modalMethod="PUT" route="{{ route('admin.' . $permission . '.restoreAll') }}"
            modalTitle="Restore All Data" modalText="Are you sure you want to restore all deleted data?"
            buttonText="Restore All" buttonIcon="fa-undo" buttonColor="btn-info" modalType="restoreAll" />
    @endcan
</x-slot>

<!-- Button Permanent Delete All -->
<x-slot name="deleteAll">
    @can('delete-all:' . $permission)
        <x-table-modal modalMethod="DELETE" route="{{ route('admin.' . $permission . '.destroyAll') }}"
            modalTitle="Delete All Data" modalText="Are you sure you want permanently to delete all data?"
            buttonText="Delete All" buttonIcon="fa-skull-crossbones" buttonColor="btn-danger" modalType="hardDeleteAll" />
    @endcan
</x-slot>

<!-- Search & Pagination -->
<x-slot name="search">
    @include('components.search')
</x-slot>
