<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Video React
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all:video-react')
            @include('admin.video-react.deleteAll')
        @endcan
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('components.search')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Video') }}</th>
                <th>{{ __('Status') }}</th>
                @can('delete:video-react')
                    <th class="text-center">{{ __('Action') }}</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($video_reacts as $item)
                <tr class="text-muted">
                    <td>{{ $video_reacts->firstItem() + $loop->index }}</td>
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
                                class="fw-semibold text-decoration-none">
                                {{ $video->title ?? '-' }} <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        @else
                            -
                        @endif
                        <br>
                        <span class="badge bg-{{ $item->video->getCategoryColor() }}">
                            {{ $item->video->category->franchise->name ?? '-' }}
                            {{ $item->video->category->name ?? '-' }}
                            {{ $item->video->label ?? '-' }}
                            @if (in_array($item->video->type, ['episode', 'mini-series', 'spin-off']))
                                {{ $item->video->number ?? 0 }}
                            @endif
                        </span>
                    </td>
                    <td>{{ $item->status ?? '-' }}</td>
                    @can('delete:video-react')
                        <td class="manage-row text-center">
                            @can('delete:video-react')
                                @include('admin.video-react.delete')
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
                <th>{{ __('Status') }}</th>
                @can('delete:video-react')
                    <th class="text-center">{{ __('Action') }}</th>
                @endcan
            </tr>
        </tfoot>
    </table>
    {{ $video_reacts->appends(['perPage' => $perPage, 'search' => $search])->links() }}

</x-admin-table>
