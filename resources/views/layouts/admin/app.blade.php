<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ $title ?? '' }}</title>

    @include('layouts.admin.style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layouts.admin.navbar')
        @include('layouts.admin.sidebar')

        <div class="content-wrapper mt-5 py-3">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="ml-2">{{ $title ?? '' }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Admin</a></li>
                                <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </section>
        </div>

        @include('layouts.admin.footer')

    </div>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    @include('layouts.admin.script')

</body>

</html>
