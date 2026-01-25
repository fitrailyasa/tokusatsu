<?php
use App\Models\Category;
use App\Models\Era;
use App\Models\Franchise;

$franchises = Franchise::withoutTrashed()->where('status', 1)->get();
$eras = Era::withoutTrashed()->get()->where('status', 1)->reverse();
?>

<style>
    .logo-circle {
        width: 45px;
        height: 45px;
        background-color: #ffffff;
        display: block;
        object-fit: cover;
        border-radius: 50%;
        margin: 1px;
        box-sizing: border-box;
    }

    .header-wrapper {
        display: flex;
        align-items: center;
    }

    .header-left {
        flex: 0 0 auto;
    }

    .header-center {
        flex: 1 1 auto;
        justify-content: center;
    }

    .header-right {
        flex: 0 0 auto;
        margin-left: auto;
    }

    @media (max-width: 991px) {
        .header-wrapper {
            justify-content: space-between;
        }

        .header-center {
            display: none !important;
        }
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .header-right .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 38px;
        width: 38px;
        padding: 0;
    }

    .header-right i {
        line-height: 1;
    }
</style>

<header class="header px-3 mb-3 fixed-top">
    <div class="container">
        <div class="d-flex align-items-center header-wrapper">
            <div class="header-left">
                <a href="{{ route('home') }}"
                    class="d-flex align-items-center justify-content-center text-decoration-none"
                    title="{{ ucwords(config('app.name')) }}">
                    <img class="img-fluid logo-circle" src="{{ asset('logo.png') }}"
                        alt="{{ ucwords(config('app.name')) }} Logo">
                    <h5 class="my-3 ms-2 font-weight-bold title-sm">{{ strtoupper(config('app.name')) }}</h5>
                </a>
            </div>

            <div class="header-center d-none d-lg-flex">
                <nav itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-3 justify-content-center mb-md-0">
                        <li itemprop="name">
                            <a itemprop="url" href="{{ route('home') }}"
                                class="nav-link py-3 px-3 fw-bold @yield('textHome')"
                                title="{{ ucwords(config('app.name')) }}">
                                {{ __('Home') }}
                            </a>
                        </li>

                        @php
                            $activeFranchise = request()->route('franchise');
                            $activeCategory = request()->route('category');
                            if (!$activeFranchise && $activeCategory) {
                                $cat = Category::where('slug', $activeCategory)->first();
                                $activeFranchise = $cat?->franchise?->slug;
                            }

                            $mainFranchiseNames = ['Kamen Rider', 'Ultraman', 'Super Sentai'];

                            $mainFranchises = $franchises->whereIn('name', $mainFranchiseNames)->sortBy(function ($fr) {
                                return array_search($fr->name, ['Kamen Rider', 'Ultraman', 'Super Sentai']);
                            });

                            $otherFranchises = $franchises->filter(function ($fr) use ($mainFranchiseNames) {
                                return !in_array($fr->name, $mainFranchiseNames);
                            });
                        @endphp

                        @foreach ($mainFranchises as $franchise)
                            <li class="nav-item dropdown" itemprop="name">
                                <a class="nav-link dropdown-toggle py-3 px-3 fw-bold {{ $activeFranchise == $franchise->slug ? 'aktif rounded' : '' }}"
                                    href="#" itemprop="url">
                                    {{ $franchise->name }}
                                </a>

                                <ul class="dropdown-menu custom-dropdown m-0">
                                    @foreach ($eras as $era)
                                        @php
                                            $list = $franchise->categories
                                                ->where('era_id', $era->id)
                                                ->where('status', 1)
                                                ->reverse();
                                        @endphp

                                        @if ($list->count())
                                            <li>
                                                <h6 class="dropdown-header">{{ strtoupper($era->name) }}</h6>
                                            </li>
                                            @foreach ($list as $item)
                                                <li itemprop="name">
                                                    <a class="dropdown-item"
                                                        href="{{ route('video.category.series', [$franchise->slug, $item->slug]) }}"
                                                        title="Tonton {{ $item->fullname }} dari franchise {{ $franchise->name }}"
                                                        itemprop="url">
                                                        {{ $item->fullname }}
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

                        {{-- OTHER FRANCHISES --}}
                        @php
                            $hasActiveOther =
                                $otherFranchises
                                    ->filter(function ($fr) {
                                        return $fr->categories->where('status', 1)->count() > 0;
                                    })
                                    ->count() > 0;

                            $isOtherActive = $otherFranchises->pluck('slug')->contains($activeFranchise);
                        @endphp
                        @if ($hasActiveOther)
                            <li class="nav-item dropdown" itemprop="name">
                                <a class="nav-link dropdown-toggle py-3 px-3 fw-bold {{ $isOtherActive ? 'aktif rounded' : '' }} {{ request()->route('category') == $item->slug ? 'aktif rounded' : '' }}"
                                    href="#" id="otherDropdown" role="button" itemprop="url">
                                    {{ __('Other') }}
                                </a>
                                <ul class="dropdown-menu m-0" aria-labelledby="otherDropdown">
                                    @foreach ($otherFranchises as $fr)
                                        @php
                                            $activeCategories = $fr->categories->where('status', 1)->reverse();
                                        @endphp
                                        @if ($activeCategories->count() > 0)
                                            <li class="dropdown-submenu" itemprop="name">
                                                <a class="dropdown-item dropdown-toggle" href="#" itemprop="url">
                                                    {{ $fr->name }}
                                                </a>
                                                <ul class="dropdown-menu custom-dropdown">
                                                    @foreach ($activeCategories as $item)
                                                        <li itemprop="name">
                                                            <a class="dropdown-item"
                                                                href="{{ route('video.category.series', [$item->franchise->slug, $item->slug]) }}"
                                                                title="Tonton {{ $item->fullname }} dari franchise {{ $item->franchise->name }}"
                                                                itemprop="url">
                                                                {{ $item->fullname }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        {{-- HISTORY & BOOKMARK --}}
                        <li class="nav-item">
                            <a class="nav-link py-3 px-3 fw-bold @yield('textHistory')" href="{{ route('history') }}"
                                title="History">
                                <i data-feather="clock"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-3 fw-bold @yield('textBookmark')" href="{{ route('bookmark') }}"
                                title="Bookmark Video">
                                <i data-feather="bookmark"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <button id="themeToggle" class="btn">
                    <i class="fa-solid fa-moon"></i>
                </button>
                @auth
                    <a href="{{ route('profile.edit') }}" class="btn d-none d-lg-flex" title="Profile">
                        <i class="fa-solid fa-user"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn" title="Login">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownItems = document.querySelectorAll('.nav-item.dropdown, .dropdown-submenu');
            dropdownItems.forEach(function(dropdown) {
                dropdown.addEventListener('mouseover', function() {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    if (menu) menu.classList.add('show');
                });
                dropdown.addEventListener('mouseout', function() {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    if (menu) menu.classList.remove('show');
                });
            });
        });
    </script>
</header>
