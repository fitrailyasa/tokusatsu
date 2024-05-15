<footer class="footer px-3 d-block d-lg-none border-top text-white mt-3 fixed-bottom" style="background-color: #111111">
    <div class="container">
        <div class="d-flex">
            <ul class="nav col-12 align-items-center justify-content-between">
                <li><a href="{{ route('beranda') }}" class="nav-link p-3 text-white fw-bold @yield('textHome')"><i
                            class="fas fa-home fs-4"></i></a>
                </li>
                <li>
                    <a href="{{ route('era') }}" class="nav-link p-3 text-white fw-bold @yield('textEra')"><i
                            class="fas fa-crown fs-4"></i></a>
                </li>
                <li>
                    <a href="{{ route('franchise') }}" class="nav-link p-3 text-white fw-bold @yield('textFranchise')"><i
                            class="fas fa-tv fs-4"></i></a>
                </li>
                <li>
                    <a href="{{ route('category') }}" class="nav-link p-3 text-white fw-bold @yield('textCategory')"><i
                            class="fas fa-tag fs-4"></i></a>
                </li>
            </ul>
        </div>
    </div>
</footer>
