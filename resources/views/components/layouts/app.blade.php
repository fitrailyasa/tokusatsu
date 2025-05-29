<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} {{ $title ?? '' }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;400i;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.2.7/sweetalert2.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css">
    <script src="https://kit.fontawesome.com/2a99f4df77.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-favicon />

    <style>
        .border-bottom {
            border-bottom: 0.2px solid rgba(255, 255, 255, 0.2) !important;
        }

        .main-sidebar {
            background-color: rgb(9, 0, 128);
        }

        .aktif {
            background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);
        }

        .bg-info {
            background-image: linear-gradient(to top, #45abc7 0%, #3eb8ff 100%);
        }

        .bg-primary {
            background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);
        }

        .bg-secondary {
            background-image: linear-gradient(to top, #a3a3a3 0%, #707070 100%);
        }

        .bg-success {
            background-image: linear-gradient(to top, #49e0b0 0%, #0ba360 100%);
        }

        .bg-warning {
            background-image: linear-gradient(to top, #f8fa7c 0%, #ffc508 100%);
        }

        .bg-danger {
            background-image: linear-gradient(to top, #fd704d 0%, #ff0844 100%);
        }

        .btn-primary {
            background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);
        }

        .btn-secondary {
            background-image: linear-gradient(to top, #a3a3a3 0%, #707070 100%);
        }

        .btn-success {
            background-image: linear-gradient(to top, #49e0b0 0%, #0ba360 100%);
        }

        .btn-warning {
            background-image: linear-gradient(to top, #f8fa7c 0%, #ffc508 100%);
        }

        .btn-danger {
            background-image: linear-gradient(to top, #fd704d 0%, #ff0844 100%);
        }

        .btn-info {
            background-image: linear-gradient(to top, #45abc7 0%, #3eb8ff 100%);
        }
    </style>

    {{ $style ?? '' }}

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('components.navbar')
        @include('components.layouts.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Admin</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </section>
        </div>

        @include('components.footer')

    </div>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.2.7/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/js/jquery.overlayScrollbars.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </script>

    {{ $script ?? '' }}

</body>

</html>
