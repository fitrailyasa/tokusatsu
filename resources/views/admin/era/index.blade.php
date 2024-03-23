@extends('layouts.admin.table')

@section('title', 'Era')

@section('table-era', 'active')

@section('formCreate')
    @include('admin.era.create')
@endsection

@section('import')
    @include('admin.era.import')
@endsection

@section('export')
    @include('admin.era.export')
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
            @foreach ($eras as $era)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $era->name ?? '-' }}</td>
                    <td>
                        @if ($era->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $era->name }}" width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $era->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $era->img) }}"
                                    alt="{{ $era->img }}" width="100">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $era->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <a href="{{ asset('assets/img/' . $era->img) }}">
                                                <img class="img img-fluid" src="{{ asset('assets/img/' . $era->img) }}"
                                                    alt="{{ $era->img }}">
                                            </a>
                                            <!-- Tombol Download -->
                                            <a href="{{ asset('assets/img/' . $era->img) }}"
                                                download="{{ $era->img }}" class="btn btn-success mt-2 col-12">Download
                                                Gambar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.era.edit')
                            @include('admin.era.delete')
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
