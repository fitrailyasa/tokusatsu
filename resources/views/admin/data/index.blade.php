@extends('layouts.admin.table')

@section('title', 'Data')

@section('table-data', 'active')

@section('formCreate')
    @include('admin.data.create')
@endsection

{{-- @section('deleteAll')
    @include('admin.data.deleteAll')
@endsection --}}

@section('import')
    @include('admin.data.import')
@endsection

@section('export')
    @include('admin.data.export')
@endsection

@section('table')
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Category</th>
                <th>Images</th>
                <th>More</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name ?? '-' }}</td>
                    <td>{{ $data->category->name ?? '-' }}</td>
                    <td>
                        @if ($data->img == null)
                            <a href="{{ asset('assets/profile/default.png') }}">
                                <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $data->name }}" width="100">
                            </a>
                        @else
                            <a href="{{ asset('assets/img/' . $data->img) }}">
                                <img src="{{ asset('assets/img/' . $data->img) }}" alt="{{ $data->name }}" width="100">
                            </a>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.data.edit')

                            <!-- Button trigger modal -->
                            <a role="button" class="btn-sm btn-danger delete-button" data-bs-toggle="modal"
                                data-bs-target=".bd-example-modal-sm{{ $data->id }}">
                                Hapus
                            </a>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-sm{{ $data->id }}" tabindex="-1" role="dialog"
                                aria-hidden="">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><strong>Hapus @yield('title')</strong>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">Apakah anda yakin ingin menghapus
                                            @yield('title')?</div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.data.destroy', $data->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-danger light" name=""
                                                    id="" value="Hapus">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Tidak</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Category</th>
                <th>Images</th>
                <th>More</th>
            </tr>
            <tr>
                <th colspan="5">
                    {{ $datas->links() }}
                </th>
            </tr>
        </tfoot>
    </table>
@endsection
