<x-admin-table>

    @include('components.table-header', ['permission' => $permission])

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                @canany(['edit:tag', 'delete:tag'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $item)
                <tr @if ($item->trashed()) class="text-muted" @endif>
                    <td>{{ $tags->firstItem() + $loop->index }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    @include('components.table-action', ['permission' => $permission, 'item' => $item])
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                @canany(['edit:tag', 'delete:tag'])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </tfoot>
    </table>
    {{ $tags->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
