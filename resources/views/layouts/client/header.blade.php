<?php
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;
$eras = Era::withoutTrashed()->get()->reverse();
$franchises = Franchise::withoutTrashed()->get()->reverse();
$categories = Category::withoutTrashed()->get()->reverse();
?>
<style>
    .custom-dropdown {
        max-height: 60vh;
        overflow-y: auto;
        overflow-x: hidden;
    }
</style>
<header class="header px-3 border-bottom text-white mb-3 fixed-top" style="background-color: #111111">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center">
                <img class="img-fluid" width="50" src="{{ asset('storage/logo.png') }}" alt="Logo">
                <h4 class="mb-0 font-weight-bold">TOKUSATSU</h4>
            </div>
            <div class="d-none d-lg-block">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-3 justify-content-center mb-md-0">
                    <li><a href="{{ route('beranda') }}"
                            class="nav-link py-3 px-3 text-white fw-bold @yield('textHome')">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle py-3 px-3 text-white fw-bold @yield('textEra')"
                            href="#" id="eraDropdown" role="button">
                            {{ __('Era') }}
                        </a>
                        <ul class="dropdown-menu m-0" aria-labelledby="eraDropdown">
                            @if ($eras != null)
                                @foreach ($eras as $era)
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">{{ $era->name }}</a>
                                        <ul class="dropdown-menu custom-dropdown">
                                            @foreach ($era->categories as $category)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('era.category', [$category->era->slug, $category->slug]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle py-3 px-3 text-white fw-bold @yield('textFranchise')"
                            href="#" id="franchiseDropdown" role="button">
                            {{ __('Franchise') }}
                        </a>
                        <ul class="dropdown-menu m-0" aria-labelledby="franchiseDropdown">
                            @if ($franchises != null)
                                @foreach ($franchises as $franchise)
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle"
                                            href="#">{{ $franchise->name }}</a>
                                        <ul class="dropdown-menu custom-dropdown">
                                            @foreach ($franchise->categories as $category)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('franchise.category', [$category->franchise->slug, $category->slug]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle py-3 px-3 text-white fw-bold @yield('textCategory')"
                            href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('Category') }}
                        </a>
                        <ul class="dropdown-menu m-0 custom-dropdown" aria-labelledby="dropdownMenuLink">
                            @if ($categories != null)
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item"
                                            href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
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
