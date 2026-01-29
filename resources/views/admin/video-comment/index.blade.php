<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Video Comment
    </x-slot>

    <!-- Button Permanent Delete All -->
    <x-slot name="deleteAll">
        @can('delete-all:video-comment')
            @include('admin.video-comment.deleteAll')
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
                <th>{{ __('User') }}</th>
                <th>{{ __('Message') }}</th>
                @can('delete:video-comment')
                    <th class="text-center">{{ __('Action') }}</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($video_comments as $item)
                <tr class="text-muted">
                    <td>{{ $video_comments->firstItem() + $loop->index }}</td>
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
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>{{ $item->message ?? '-' }}</td>
                    @can('delete:video-comment')
                        <td class="manage-row text-center">
                            @can('delete:video-comment')
                                @include('admin.video-comment.delete')
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
                <th>{{ __('User') }}</th>
                <th>{{ __('Message') }}</th>
                @can('delete:video-comment')
                    <th class="text-center">{{ __('Action') }}</th>
                @endcan
            </tr>
        </tfoot>
    </table>
    {{ $video_comments->appends(['perPage' => $perPage, 'search' => $search])->links('vendor.pagination.mobile') }}

</x-admin-table>
