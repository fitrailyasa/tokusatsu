<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="manifest" href="/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tokusatsu - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @yield('style')

    <!--Favicon-->
    <link rel="apple-touch-icon-precomposed" sizes="57x57"
        href="{{ asset('assets/favicon/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('assets/favicon/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('assets/favicon/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('assets/favicon/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60"
        href="{{ asset('assets/favicon/apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="{{ asset('assets/favicon/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76"
        href="{{ asset('assets/favicon/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="{{ asset('assets/favicon/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-128.png') }}" sizes="128x128" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('assets/favicon/mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('assets/favicon/mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('assets/favicon/mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('assets/favicon/mstile-310x310.png') }}" />
    <link rel="icon" href="{{ asset('assets/favicon/favicon.ico') }}">
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        .responsive-title {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        @media (max-width: 576px) {
            table.table {
                font-size: 12px;
            }

            table.table th,
            table.table td {
                padding: 0.35rem;
            }

            table.table img {
                width: 60px;
            }

            .responsive-title {
                font-size: 16px;
            }
        }

        @media (min-width: 768px) {
            .responsive-title {
                font-size: 18px;
            }
        }

        @media (min-width: 1200px) {
            .responsive-title {
                font-size: 22px;
            }
        }

        .list-group-item a {
            text-decoration: none;
            color: #000;
            font-size: 1rem;
            word-break: break-word;
        }

        .list-group-item button {
            padding: 0.2rem 0.4rem;
            font-size: 0.8rem;
        }

        .logo-sm {
            width: 50px;
        }

        @media (max-width: 320px) {

            .responsive-title {
                font-size: 1rem !important;
            }

            /* GALLERY */
            .img-gallery {
                width: 80px;
                margin: 2px;
            }

            .modal-body img {
                width: 100%;
            }

            .btn {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }

            h4 {
                font-size: 1rem;
            }

            /* SEARCH */
            .input-group {
                width: 100% !important;
                flex-wrap: nowrap;
            }

            .form-control-sm {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }

            .btn-sm {
                font-size: 0.7rem;
                padding: 0.25rem 0.5rem;
            }

            .input-group .btn {
                width: 30% !important;
            }

            .input-group .form-control {
                width: 70% !important;
            }

            /* HISTORY */
            #watchHistory .list-group-item {
                flex-direction: column;
                align-items: flex-start;
                padding: 0.3rem 0.5rem;
                font-size: 0.8rem;
            }

            #watchHistory .list-group-item a {
                font-size: 0.8rem;
            }

            #watchHistory .list-group-item button {
                margin-top: 0.3rem;
                align-self: flex-end;
                font-size: 0.7rem;
                padding: 0.2rem 0.3rem;
            }

            /* BOOKMARK */
            #bookmarkList .list-group-item {
                flex-direction: column;
                align-items: flex-start;
                padding: 0.3rem 0.5rem;
                font-size: 0.8rem;
            }

            #bookmarkList .list-group-item a {
                font-size: 0.8rem;
            }

            #bookmarkList .list-group-item button {
                margin-top: 0.3rem;
                align-self: flex-end;
                font-size: 0.7rem;
                padding: 0.2rem 0.3rem;
            }

            /* HEADER */
            .header {
                padding: 5px !important;
            }

            .logo-sm {
                width: 30px;
            }

            .title-sm {
                font-size: 0.9rem;
            }

            .d-none.d-lg-block {
                display: none !important;
            }

            /* FOOTER */
            .footer {
                font-size: 10px;
            }

            .footer i {
                width: 16px !important;
                height: 16px !important;
            }

            .footer .nav-link {
                padding: 3px !important;
            }
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed content">

    @include('layouts.client.header')

    @yield('content')

    @include('layouts.client.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @yield('script')
</body>

</html>
