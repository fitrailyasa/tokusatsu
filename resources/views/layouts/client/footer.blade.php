<footer class="footer px-1 d-block d-lg-none border-top text-white mt-1 fixed-bottom" style="background-color: #111111">
    <div class="container-fluid">
        <div class="d-flex">
            <ul class="nav col-12 align-items-center justify-content-between py-1">
                <li>
                    <a href="{{ route('beranda') }}" class="nav-link p-1 text-white fw-bold @yield('textHome')">
                        <i data-feather="home"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('film') }}" class="nav-link p-1 text-white fw-bold @yield('textFilm')">
                        <i data-feather="play-circle"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('history') }}" class="nav-link p-1 text-white fw-bold @yield('textHistory')">
                        <i data-feather="clock"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('bookmark') }}" class="nav-link p-1 text-white fw-bold @yield('textBookmark')">
                        <i data-feather="bookmark"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<script>
    feather.replace()
</script>
