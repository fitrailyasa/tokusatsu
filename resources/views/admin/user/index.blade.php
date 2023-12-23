@extends('layouts.admin.table')

@section('title', 'User')

@section('table-user', 'active')

@section('formCreate')
    @include('admin.user.create')
@endsection

@section('table')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>More</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->name }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            <a role="button" class="btn-sm btn-success mr-2" data-bs-toggle="modal"
                                data-bs-target=".formEdit{{ $user->id }}">
                                Edit
                            </a>
                            <!-- Modal -->
                            <div class="modal fade formEdit{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="">
                                <div class="modal-dialog" role="document">
                                    @include('admin.user.edit')
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <a role="button" class="btn-sm btn-danger delete-button" data-bs-toggle="modal"
                                data-bs-target=".bd-example-modal-sm{{ $user->id }}">
                                Hapus
                            </a>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-sm{{ $user->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
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
                <th>Email</th>
                <th>Role</th>
                <th>More</th>
            </tr>
        </tfoot>
    </table>
@endsection
