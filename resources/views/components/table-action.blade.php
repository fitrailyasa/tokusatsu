@canany(['edit:' . $permission, 'delete:' . $permission, 'restore:' . $permission])
    <td class="manage-row text-center">
        @if ($item->trashed())
            <!-- Restore and Delete Button -->
            @can('restore:' . $permission)
                <x-table-modal modalMethod="PUT" route="{{ route('admin.' . $permission . '.restore', $item->id) }}"
                    id="{{ $item->id }}" modalTitle="Restore Data" modalText="Are you sure you want to restore this data?"
                    buttonText="Restore" buttonIcon="fa-undo" buttonColor="btn-info" modalType="restore" />
            @endcan
            @can('delete:' . $permission)
                <x-table-modal modalMethod="DELETE" route="{{ route('admin.' . $permission . '.destroy', $item->id) }}"
                    id="{{ $item->id }}" modalTitle="Permanently Delete Data"
                    modalText="Are you sure you want to delete data permanently?" buttonText="Delete"
                    buttonIcon="fa-skull-crossbones" buttonColor="btn-danger" modalType="hardDelete" />
            @endcan
        @else
            <!-- Edit and Soft Delete Buttons -->
            @can('edit:' . $permission)
                @include('admin.' . $permission . '.edit')
            @endcan
            @can('soft-delete:' . $permission)
                <x-table-modal modalMethod="DELETE" route="{{ route('admin.' . $permission . '.softDelete', $item->id) }}"
                    id="{{ $item->id }}" modalTitle="Delete Data" modalText="Are you sure you want to delete data?"
                    buttonText="Delete" buttonIcon="fa-trash" buttonColor="btn-danger" modalType="softDelete" />
            @endcan
        @endif
    </td>
@endcanany
