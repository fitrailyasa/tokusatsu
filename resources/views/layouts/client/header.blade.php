<?php
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;

// Ambil 5 franchise pertama
$franchises = Franchise::withoutTrashed()->take(5)->get();
$eras = Era::withoutTrashed()->get();
?>
<style>
    .custom-dropdown {
        max-height: 60vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .dropdown-header {
        font-weight: bold;
        font-size: 0.9rem;
        color: #555;
    }
</style>
<header class="header px-3 border-bottom text-white mb-3 fixed-top" style="background-color: #111111">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center">
                <img class="img-fluid" width="50" src="{{ asset('logo.png') }}" alt="Logo">
                <h4 class="mb-0 font-weight-bold">TOKUSATSU</h4>
            </div>
            <div class="d-none d-lg-block">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-3 justify-content-center mb-md-0">
                    <li>
                        <a href="{{ route('beranda') }}"
                            class="nav-link py-3 px-3 text-white fw-bold @yield('textHome')">
                            {{ __('Home') }}
                        </a>
                    </li>
                    @foreach ($franchises as $franchise)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle py-3 px-3 text-white fw-bold" href="#"
                                id="franchiseDropdown{{ $franchise->id }}" role="button">
                                {{ $franchise->name }}
                            </a>
                            <ul class="dropdown-menu custom-dropdown m-0"
                                aria-labelledby="franchiseDropdown{{ $franchise->id }}">
                                @foreach ($eras as $era)
                                    @php
                                        $categoriesByEra = $franchise->categories->where('era_id', $era->id);
                                    @endphp

                                    @if ($categoriesByEra->count() > 0)
                                        <li>
                                            <h6 class="dropdown-header fw-bold text-white">
                                                {{ strtoupper($era->name) }}
                                            </h6>
                                        </li>
                                        @foreach ($categoriesByEra as $category)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('film.show', [$franchise->slug, $category->slug]) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link py-3 px-3 text-white fw-bold @yield('textHistory')"
                            href="{{ route('history') }}">
                            <i class="far fa-clock fs-5"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-3 px-3 text-white fw-bold @yield('textBookmark')"
                            href="{{ route('bookmark') }}">
                            <i class="far fa-bookmark fs-5"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownItems = document.querySelectorAll('.nav-item.dropdown, .dropdown-submenu');

            dropdownItems.forEach(function(dropdown) {
                dropdown.addEventListener('mouseover', function() {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    if (menu) {
                        menu.classList.add('show');
                    }
                });

                dropdown.addEventListener('mouseout', function() {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    if (menu) {
                        menu.classList.remove('show');
                    }
                });
            });
        });
    </script>
</header>
