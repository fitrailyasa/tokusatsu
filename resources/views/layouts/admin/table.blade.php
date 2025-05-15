<x-admin-layout>
    <x-slot name="title">
        {{ $title ?? '' }}
    </x-slot>

    <x-slot name="style">
        <style>
            .dataTables_filter {
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }
        </style>
    </x-slot>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="card-title mb-3">Kelola Tabel {{ $title ?? '' }}</h3>
                <div class="d-flex justify-content-end mb-3">

                    {{ $formCreate ?? '' }}

                    {{ $import ?? '' }}

                    {{ $export ?? '' }}

                    {{ $softDeleteAll ?? '' }}

                    {{ $restoreAll ?? '' }}

                    {{ $deleteAll ?? '' }}

                </div>
            </div>
            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: `{!! implode('<br>', $errors->all()) !!}`,
                            confirmButtonColor: '#d33',
                        });
                    });
                </script>
            @endif

            @if (session('message'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('message') }}',
                            confirmButtonColor: '#28a745',
                        });
                    });
                </script>
            @endif

            <div class="table-responsive">
                {{ $search ?? '' }}
                {{ $slot ?? '' }}
                @yield('table')
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <x-slot name="script">
        @include('layouts.admin.datatables')
        <script>
            function previewImage() {
                var input = document.getElementById('image-input');
                var preview = document.getElementById('image-preview');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = '{{ asset('assets/profile/default.png') }}';
                }
            }

            document.getElementById('image-input').addEventListener('change', previewImage);
            window.addEventListener('load', previewImage);
        </script>
    </x-slot>
</x-admin-layout>
