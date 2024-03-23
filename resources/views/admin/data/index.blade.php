@extends('layouts.admin.table')

@section('title', 'Data')

@section('table-data', 'active')

@section('formCreate')
    @include('admin.data.create')
@endsection

@section('deleteAll')
    @include('admin.data.deleteAll')
@endsection

@section('import')
    @include('admin.data.import')
@endsection

@section('export')
    @include('admin.data.export')
@endsection

@section('table')
    <style>
        .tags-container {
            display: flex;
            flex-wrap: wrap;
        }

        .form-check {
            margin-right: 25px;
            /* Jarak antar tag */
        }
    </style>

    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('Tags') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name ?? '-' }}</td>
                    <td>{{ $data->Category->name ?? '-' }}</td>
                    <td>
                        @if ($data->img == null)
                            <a href="{{ asset('assets/profile/default.png') }}">
                                <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}"
                                    width="100">
                            </a>
                        @else
                            <a href="{{ asset('assets/img/' . $data->img) }}">
                                <img src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->name }}" width="100">
                            </a>
                        @endif
                    </td>
                    {{-- Json Data Tags --}}
                    <td>
                        @if (!empty($data->tags))
                            @foreach (json_decode($data->tags) as $tagId)
                                @php
                                    $tag = $tags->where('id', $tagId)->first();
                                @endphp
                                @if ($tag)
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endif
                            @endforeach
                        @else
                            <span class="badge badge-secondary">No tags</span>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.data.edit')
                            @include('admin.data.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('Tags') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
            <tr>
                <th colspan="5">
                    {{ $datas->links() }}
                </th>
            </tr>
        </tfoot>
    </table>
@endsection
