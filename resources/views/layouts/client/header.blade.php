<?php
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;

$franchises = Franchise::withoutTrashed()->take(5)->get();
$eras = Era::withoutTrashed()->get()->reverse();
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
<header class="header px-3 border-bottom mb-3 fixed-top bg-light">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center">
                {{-- <img class="img-fluid logo-sm" src="{{ asset('logo.png') }}" alt="Logo"> --}}
                <h5 class="mb-0 ms-2 font-weight-bold title-sm">TOKUSATSU</h5>
            </div>
            <div class="d-none d-lg-block">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-3 justify-content-center mb-md-0">
                    <li>
                        <a href="{{ route('beranda') }}" class="nav-link text-dark py-3 px-3 fw-bold @yield('textHome')">
                            {{ __('Home') }}
                        </a>
                    </li>
                    {{-- ================= PER MENU ================= --}}
                    @php
                        $mainFranchises = ['Kamen Rider', 'Ultraman', 'Super Sentai'];

                        $franchiseKR = $franchises->firstWhere('name', 'Kamen Rider');
                        $franchiseUL = $franchises->firstWhere('name', 'Ultraman');
                        $franchiseSS = $franchises->firstWhere('name', 'Super Sentai');

                        $otherFranchises = $franchises->filter(function ($item) use ($mainFranchises) {
                            return !in_array($item->name, $mainFranchises);
                        });
                    @endphp

                    {{-- ============ KAMEN RIDER ============ --}}
                    @if ($franchiseKR)
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle py-3 px-3 fw-bold" href="#">
                                Kamen Rider
                            </a>
                            <ul class="dropdown-menu custom-dropdown m-0">
                                @foreach ($eras as $era)
                                    @php
                                        $list = $franchiseKR->categories->where('era_id', $era->id)->reverse();
                                    @endphp
                                    @if ($list->count() > 0)
                                        <li>
                                            <h6 class="dropdown-header">{{ strtoupper($era->name) }}</h6>
                                        </li>
                                        @foreach ($list as $item)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('video.show', [$franchiseKR->slug, $item->slug]) }}">
                                                    {{ \Illuminate\Support\Str::words($item->fullname, 4, '...') }}
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
                    @endif

                    {{-- ============ ULTRAMAN ============ --}}
                    @if ($franchiseUL)
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle py-3 px-3 fw-bold" href="#">
                                Ultraman
                            </a>
                            <ul class="dropdown-menu custom-dropdown m-0">
                                @foreach ($eras as $era)
                                    @php
                                        $list = $franchiseUL->categories->where('era_id', $era->id)->reverse();
                                    @endphp
                                    @if ($list->count() > 0)
                                        <li>
                                            <h6 class="dropdown-header">{{ strtoupper($era->name) }}</h6>
                                        </li>
                                        @foreach ($list as $item)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('video.show', [$franchiseUL->slug, $item->slug]) }}">
                                                    {{ \Illuminate\Support\Str::words($item->fullname, 4, '...') }}
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
                    @endif

                    {{-- ============ SUPER SENTAI ============ --}}
                    @if ($franchiseSS)
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle py-3 px-3 fw-bold" href="#">
                                Super Sentai
                            </a>
                            <ul class="dropdown-menu custom-dropdown m-0">
                                @foreach ($eras as $era)
                                    @php
                                        $list = $franchiseSS->categories->where('era_id', $era->id)->reverse();
                                    @endphp
                                    @if ($list->count() > 0)
                                        <li>
                                            <h6 class="dropdown-header">{{ strtoupper($era->name) }}</h6>
                                        </li>
                                        @foreach ($list as $item)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('video.show', [$franchiseSS->slug, $item->slug]) }}">
                                                    {{ \Illuminate\Support\Str::words($item->fullname, 4, '...') }}
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
                    @endif


                    {{-- ============ OTHER MENU ============ --}}
                    @if ($otherFranchises->count() > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle py-3 px-3 fw-bold" href="#">
                                Other
                            </a>
                            <ul class="dropdown-menu custom-dropdown m-0">

                                @foreach ($otherFranchises as $franchise)
                                    <li>
                                        <h6 class="dropdown-header">{{ strtoupper($franchise->name) }}</h6>
                                    </li>
                                    @foreach ($eras as $era)
                                        @php
                                            $list = $franchise->categories->where('era_id', $era->id)->reverse();
                                        @endphp
                                        @if ($list->count() > 0)
                                            <li class="px-3 text-secondary small">{{ strtoupper($era->name) }}</li>
                                            @foreach ($list as $item)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('video.show', [$franchise->slug, $item->slug]) }}">
                                                        {{ \Illuminate\Support\Str::words($item->fullname, 4, '...') }}
                                                    </a>
                                                </li>
                                            @endforeach
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link text-dark py-3 px-3 fw-bold @yield('textHistory')"
                            href="{{ route('history') }}">
                            <i class="far fa-clock fs-5"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark py-3 px-3 fw-bold @yield('textBookmark')"
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
