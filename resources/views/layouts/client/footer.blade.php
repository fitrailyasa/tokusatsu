<footer class="footer px-3 d-block d-lg-none border-top text-white mt-3 fixed-bottom" style="background-color: #111111">
    <div class="container">
        <div class="d-flex">
            <ul class="nav col-12 align-items-center justify-content-between">
                <li><a href="{{ route('beranda') }}" class="nav-link p-2 text-white fw-bold @yield('textHome')"><i
                            class="fas fa-home fs-5"></i></a>
                </li>
                <li>
                    <a href="{{ route('franchise') }}" class="nav-link p-2 text-white fw-bold @yield('textFranchise')"><i
                            class="fas fa-image fs-5"></i></a>
                </li>
                <li>
                    <a href="{{ route('film') }}" class="nav-link p-2 text-white fw-bold @yield('textFilm')"><i
                            class="fas fa-video fs-5"></i></a>
                </li>
                <li>
                    <a href="{{ route('history') }}" class="nav-link p-2 text-white fw-bold @yield('textHistory')"><i
                            class="fas fa-history fs-5"></i></a>
                </li>
            </ul>
        </div>
    </div>
</footer>
