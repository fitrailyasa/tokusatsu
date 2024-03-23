@extends('layouts.admin.table')

@section('title', 'Franchise')

@section('table-franchise', 'active')

@section('formCreate')
    @include('admin.franchise.create')
@endsection

@section('import')
    @include('admin.franchise.import')
@endsection

@section('export')
    @include('admin.franchise.export')
@endsection

@section('table')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($franchises as $franchise)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $franchise->name ?? '-' }}</td>
                    <td>
                        @if ($franchise->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $franchise->name }}" width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $franchise->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $franchise->img) }}"
                                    alt="{{ $franchise->img }}" width="100">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $franchise->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <a href="{{ asset('assets/img/' . $franchise->img) }}">
                                                <img class="img img-fluid"
                                                    src="{{ asset('assets/img/' . $franchise->img) }}"
                                                    alt="{{ $franchise->img }}">
                                            </a>
                                            <!-- Tombol Download -->
                                            <a href="{{ asset('assets/img/' . $franchise->img) }}"
                                                download="{{ $franchise->img }}"
                                                class="btn btn-success mt-2 col-12">Download
                                                Gambar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.franchise.edit')
                            @include('admin.franchise.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
