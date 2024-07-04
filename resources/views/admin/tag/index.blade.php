<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Tag
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.tag.create')
    </x-slot>

    <!-- Button Import -->
    <x-slot name="import">
        @include('admin.tag.import')
    </x-slot>

    <!-- Button Export -->
    <x-slot name="export">
        @include('admin.tag.export')
    </x-slot>

    <!-- Button Delete All -->
    {{-- <x-slot name="deleteAll">
        @include('admin.tag.deleteAll')
    </x-slot> --}}

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->name ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.tag.edit')
                            @include('admin.tag.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </tfoot>
    </table>

</x-admin-table>
