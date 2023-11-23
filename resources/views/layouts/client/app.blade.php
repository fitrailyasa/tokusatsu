<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tokusatsu | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <script src="https://kit.fontawesome.com/2a99f4df77.js" crossorigin="anonymous"></script>

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

</head>

<body class="hold-transition sidebar-mini layout-fixed"
    style="background-image: url({{ asset('assets/img/bg.png') }}); background-size: 100%">

    @include('layouts.client.header')

    @yield('content')

    @include('layouts.client.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
