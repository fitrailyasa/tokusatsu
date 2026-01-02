<footer class="footer px-1 d-block d-lg-none fixed-bottom">
    <div class="container-fluid">
        <ul class="nav nav-fill py-1">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link p-1 fw-normal text-center @yield('textHome')">
                    <i data-feather="home" class="d-block mx-auto"></i>
                    <small>Home</small>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('video') }}" class="nav-link p-1 fw-normal text-center @yield('textvideo')">
                    <i data-feather="play-circle" class="d-block mx-auto"></i>
                    <small>Video</small>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('history') }}" class="nav-link p-1 fw-normal text-center @yield('textHistory')">
                    <i data-feather="clock" class="d-block mx-auto"></i>
                    <small>History</small>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bookmark') }}" class="nav-link p-1 fw-normal text-center @yield('textBookmark')">
                    <i data-feather="bookmark" class="d-block mx-auto"></i>
                    <small>Bookmark</small>
                </a>
            </li>
        </ul>
    </div>
</footer>

<script>
    feather.replace({
        width: 18,
        height: 18
    })
</script>
