<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Video Report
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all:video-report')
            @include('admin.video-report.deleteAll')
        @endcan
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('components.search')
    </x-slot>

    <div class="alert alert-warning d-flex align-items-center mb-3">
        <span>
            Total problematic videos:
            <strong>{{ $totalProblematicVideos }}</strong>
        </span>
    </div>

    @if ($problematicVideoPerCategory->isNotEmpty())
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-2">
                @foreach ($problematicVideoPerCategory as $row)
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
                <th>{{ __('Video') }}</th>
                <th>{{ __('Message') }}</th>
                @can('delete:video-report')
                    <th class="text-center">{{ __('Action') }}</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($video_reports as $item)
                <tr class="text-muted">
                    <td>{{ $video_reports->firstItem() + $loop->index }}</td>
                    <td>
                        @php
                            $video = $item->video;
                            $searchQuery = collect([
                                $video->category->name ?? null,
                                $video->type ?? null,
                                in_array($video->type, ['episode', 'mini-series', 'spin-off']) ? $video->number : null,
                            ])
                                ->filter()
                                ->implode(' ');
                        @endphp
                        @if ($video)
                            <a href="{{ route('admin.video.index', [
                                'perPage' => 10,
                                'search' => $searchQuery,
                            ]) }}"
                                class="text-decoration-none">
                                {{ Illuminate\Support\Str::words($video->title ?? '-', 10, '...') }} <i
                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        @else
                            -
                        @endif
                        <br>
                        <span class="badge bg-{{ $item->video->getCategoryColor() }}">
                            {{ $item->video->category->fullname ?? '-' }}
                            {{ $item->video->label ?? '-' }}
                            @if (in_array($item->video->type, ['episode', 'mini-series', 'spin-off']))
                                {{ $item->video->number ?? 0 }}
                            @endif
                        </span>
                    </td>
                    <td>{{ $item->message ?? '-' }}</td>
                    @can('delete:video-report')
                        <td class="manage-row text-center">
                            @can('delete:video-report')
                                @include('admin.video-report.delete')
                            @endcan
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Video') }}</th>
                <th>{{ __('Message') }}</th>
                @can('delete:video-report')
                    <th class="text-center">{{ __('Action') }}</th>
                @endcan
            </tr>
        </tfoot>
    </table>
    {{ $video_reports->appends(['perPage' => $perPage, 'search' => $search])->links('vendor.pagination.mobile') }}

</x-admin-table>
