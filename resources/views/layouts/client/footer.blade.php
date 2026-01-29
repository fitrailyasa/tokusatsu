<style>
    .nav-icon {
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .nav-icon svg {
        width: 18px;
        height: 18px;
        display: block;
    }
</style>

<footer class="footer px-1 d-block d-lg-none fixed-bottom">
    <div class="container-fluid">
        <ul class="nav nav-fill py-1">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link p-1 fw-normal text-center @yield('textHome')">
                    <span class="nav-icon">
                        <i data-feather="home"></i>
                    </span>
                    <small>Home</small>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('video.series') }}" class="nav-link p-1 fw-normal text-center @yield('series')">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor"
                                stroke-width="2" />
                            <text x="12" y="16.2" text-anchor="middle" font-size="12" font-family="Arial, sans-serif"
                                font-weight="400" fill="currentColor">S</text>
                        </svg>
                    </span>
                    <small>Series</small>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('video.movie') }}" class="nav-link p-1 fw-normal text-center @yield('movie')">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor"
                                stroke-width="2" />
                            <text x="12" y="16.2" text-anchor="middle" font-size="12" font-family="Arial, sans-serif"
                                font-weight="400" fill="currentColor">M</text>
                        </svg>
                    </span>
                    <small>Movie</small>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('history') }}" class="nav-link p-1 fw-normal text-center @yield('textHistory')">
                    <span class="nav-icon">
                        <i data-feather="clock"></i>
                    </span>
                    <small>History</small>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bookmark') }}" class="nav-link p-1 fw-normal text-center @yield('textBookmark')">
                    <span class="nav-icon">
                        <i data-feather="bookmark"></i>
                    </span>
                    <small>Bookmark</small>
                </a>
            </li>
            @auth
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link p-1 fw-normal text-center @yield('textProfile')">
                        <span class="nav-icon">
                            <i data-feather="user"></i>
                        </span>
                        <small>Profile</small>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</footer>

<script>
    feather.replace({
        width: 18,
        height: 18
    })
</script>
