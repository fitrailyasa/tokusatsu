<x-admin-table>

    @include('components.table-header', ['permission' => $permission])

    <div class="alert alert-warning d-flex align-items-center mb-3">
        <span>
            Total videos without links:
            <strong>{{ $totalEmptyLinks }}</strong>
        </span>
    </div>

    @if ($emptyLinkPerCategory->isNotEmpty())
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-2">
                @foreach ($emptyLinkPerCategory as $row)
                    <a href="{{ route('admin.video.index', [
                        'perPage' => 10,
                        'category_id' => $row->category_id,
                        'search' => '',
                    ]) }}"
                        class="badge bg-warning text-dark px-3 py-2 text-decoration-none">
                        {{ $row->category->name ?? 'Uncategorized' }}
                        <span class="fw-bold">({{ $row->total }})</span>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Link') }}</th>
                <th>{{ __('Release') }}</th>
                @can('edit:' . $permission)
                    <th>{{ __('Status') }}</th>
                @endcan
                @canany(['edit:' . $permission, 'delete:' . $permission])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $item)
                <tr @if ($item->trashed()) class="text-muted" @endif>
                    <td>{{ $videos->firstItem() + $loop->index }}</td>
                    <td>
                        {{ Illuminate\Support\Str::words($item->title ?? '-', 10, '...') }} <br>
                        <span class="text-muted me-2"><i class="fas fa-comment"></i>:
                            {{ $item->video_comments->count() ?? 0 }}</span>
                        <span class="text-muted me-2"><i class="fas fa-thumbs-up"></i>:
                            {{ $item->video_reacts->where('status', 'like')->count() ?? 0 }}</span>
                        <span class="text-muted me-2"><i class="fas fa-thumbs-down"></i>:
                            {{ $item->video_reacts->where('status', 'dislike')->count() ?? 0 }}</span>
                        <span class="text-muted me-2"><i class="fas fa-eye"></i>:
                            {{ $item->video_views->count() ?? 0 }}</span>
                    </td>
                    <td>
                        <span class="badge bg-{{ $item->getCategoryColor() }}">
                            {{ $item->category->name ?? '-' }}
                        </span>
                    </td>
                    <td>{{ $item->type ?? '-' }} {{ $item->number ?? 0 }}</td>
                    <td>
                        @forelse ($item->link ?? [] as $url)
                            <a href="{{ $url }}" target="_blank">{{ $url }}</a><br>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ date('d M Y', strtotime($item->airdate)) }}</td>
                    @can('edit:video')
                        <td class="text-center">
                            <form action="{{ route('admin.video.toggleStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label class="toggle-switch">
                                    <input type="checkbox" onchange="this.form.submit()"
                                        {{ $item->status == 1 ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </form>
                        </td>
                    @endcan
                    @include('components.table-action', ['permission' => $permission, 'item' => $item])
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Link') }}</th>
                <th>{{ __('Release') }}</th>
                @can('edit:' . $permission)
                    <th>{{ __('Status') }}</th>
                @endcan
                @canany(['edit:' . $permission, 'delete:' . $permission])
                    <th class="text-center">{{ __('Action') }}</th>
                @endcanany
            </tr>
        </tfoot>
    </table>
    {{ $videos->appends(['category_id' => $categoryId, 'perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
