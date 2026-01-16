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
        @include('admin.' . $permission . '.excel.import')
    @endcan
</x-slot>

<!-- Button Export Excel -->
<x-slot name="exportExcel">
    @can('export:' . $permission)
        @include('admin.' . $permission . '.excel.export')
    @endcan
</x-slot>

<!-- Button Export PDF -->
<x-slot name="exportPDF">
    @can('export:' . $permission)
        {{-- @include('admin.' . $permission . '.pdf.export') --}}
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
