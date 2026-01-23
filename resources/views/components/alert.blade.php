@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                background: 'var(--card-bg)',
                color: 'var(--text-main)',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: `{!! session('error') !!}`,
                background: 'var(--card-bg)',
                color: 'var(--text-main)',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                background: 'var(--card-bg)',
                color: 'var(--text-main)',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
