<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="manifest" href="/manifest.json">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="{{ ucwords(config('app.name')) }}">
    <meta name="description" content="Streaming Tokusatsu Kamen Rider, Ultraman, Super Sentai, Metal Heroes, Garo, Etc.">
    <meta name="keywords" content="Tokusatsu, Kamen Rider, Ultraman, Super Sentai, Metal Heroes, Garo">
    <meta name="author" content="{{ ucwords(config('app.name')) }}">
    <meta property="og:title" content="{{ ucwords(config('app.name')) }}">
    <meta property="og:description"
        content="Streaming Tokusatsu Kamen Rider, Ultraman, Super Sentai, Metal Heroes, Garo, Etc.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}/">
    <meta property="og:image" content="{{ config('app.url') }}/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ ucwords(config('app.name')) }}">
    <meta name="twitter:description"
        content="Streaming Tokusatsu Kamen Rider, Ultraman, Super Sentai, Metal Heroes, Garo, Etc.">
    <meta name="twitter:image" content="{{ config('app.url') }}/logo.png">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#260751">

    <title>
        @hasSection('title')
            @yield('title') - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @yield('style')

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        #shareBtn {
            background: transparent;
            border: none;
            color: var(--text-color);
            padding: 6px;
            border-radius: 50%;
            transition: background-color 0.2s ease, color 0.2s ease;
            margin: 0;
            padding: 0;
        }

        #shareBtn i {
            color: var(--text-color);
            font-size: 16px;
        }

        #shareBtn:hover {
            background-color: rgba(255, 255, 255, 0.12);
        }

        body.theme-light #shareBtn:hover {
            background-color: rgba(0, 0, 0, 0.08);
        }

        .table {
            font-size: 0.9rem;
        }

        .table th,
        .table td {
            padding: 0.45rem 0.6rem;
            vertical-align: middle;
        }
    </style>

</head>

<body id="appBody" class="theme-dark hold-transition sidebar-mini layout-fixed content">

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

    {{-- THEME SCRIPT --}}
    <script>
        const body = document.getElementById('appBody');
        const toggleBtn = document.getElementById('themeToggle');

        function setTheme(theme) {
            body.classList.remove('theme-dark', 'theme-light');
            body.classList.add(theme);
            localStorage.setItem('theme', theme);

            toggleBtn.innerHTML =
                theme === 'theme-dark' ?
                '<i class="fa-solid fa-moon"></i>' :
                '<i class="fa-solid fa-sun"></i>';
        }

        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('theme') || (prefersDark ? 'theme-dark' : 'theme-light');
        setTheme(savedTheme);

        toggleBtn.addEventListener('click', () => {
            setTheme(
                body.classList.contains('theme-dark') ?
                'theme-light' :
                'theme-dark'
            );
        });
    </script>

    @yield('script')
</body>

</html>
