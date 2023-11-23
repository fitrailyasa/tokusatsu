@extends('layouts.admin.app')

@section('title', 'Table Era')

@section('tableEra', 'active')

@section('content')

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h3 class="card-title">Era Data Tables</h3>
                <a href="{{ route('admin.era.create') }}" class="btn-sm btn-primary">Create</a>
            </div>
            @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eras as $era)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $era->name }}</td>
                                <td class="manage-row">
                                    @if (auth()->user()->roles_id == 1)
                                        <a href="{{ route('admin.era.show', $era->id) }}"
                                            class="btn-sm btn-success">Detail</a>
                                        <a href="{{ route('admin.era.edit', $era->id) }}"
                                            class="btn-sm btn-warning">Edit</a>
                                        <!-- Button trigger modal -->
                                        <a role="button" class="btn-sm btn-danger delete-button" data-bs-toggle="modal"
                                            data-bs-target=".bd-example-modal-sm{{ $era->id }}">
                                            Hapus
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade bd-example-modal-sm{{ $era->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('admin.era.destroy', $era->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger light"
                                                                name="" id="" value="Hapus">
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
                            <th>More</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
