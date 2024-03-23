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
                    <td>{{ $counter++ }}</td>
                    <td>{{ $data->name ?? '-' }}</td>
                    <td>{{ $data->Category->name ?? '-' }}</td>
                    <td>
                        @if ($data->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}" width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $data->img) }}"
                                    alt="{{ $data->img }}" width="100">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <a href="{{ asset('assets/img/' . $data->img) }}">
                                                <img class="img img-fluid" src="{{ asset('assets/img/' . $data->img) }}"
                                                    alt="{{ $data->img }}">
                                            </a>
                                            <!-- Tombol Download -->
                                            <a href="{{ asset('assets/img/' . $data->img) }}"
                                                download="{{ $data->img }}" class="btn btn-success mt-2 col-12">Download
                                                Gambar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
