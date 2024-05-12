<header class="header px-3 border-bottom text-white mb-3 fixed-top" style="background-color: #111111">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center">
                <img class="img-fluid" width="60" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                <h2 class="mb-0 font-weight-bold">TOKUSATSU</h2>
            </div>
            <div class="d-none d-lg-block">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-3 justify-content-center mb-md-0">
                    <li><a href="{{ route('beranda') }}"
                            class="nav-link py-3 px-3 text-white fw-bold fs-5 @yield('textHome')">{{ __('Home') }}</a>
                    </li>
                    <li><a href="{{ route('era') }}"
                            class="nav-link py-3 px-3 text-white fw-bold fs-5 @yield('textEra')">{{ __('Era') }}</a>
                    </li>
                    <li><a href="{{ route('franchise') }}"
                            class="nav-link py-3 px-3 text-white fw-bold fs-5 @yield('textFranchise')">{{ __('Franchise') }}</a>
                    </li>
                    <li><a href="{{ route('category') }}"
                            class="nav-link py-3 px-3 text-white fw-bold fs-5 @yield('textCategory')">{{ __('Category') }}</a>
                    </li>
                </ul>
            </div>
            {{-- <div class="d-flex align-items-center">
                <a href="#" class="ml-4 border rounded-circle nav-link px-2 text-white fw-bold d-none d-lg-block">
                    <i class="fa-solid fa-user mx-1 fs-4"></i>
                </a>
            </div> --}}
        </div>
    </div>
</header>
