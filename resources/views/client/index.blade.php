@extends('layouts.client.app')

@section('textHome', 'rounded aktif')

@section('content')

    {{-- SWIPER CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .swiper {
            width: 95%;
            padding-top: 20px;
            opacity: 0;
            transition: opacity .3s ease;
        }

        .swiper.swiper-initialized {
            opacity: 1;
        }

        .swiper-slide img {
            width: 100%;
            background-color: #111;
            border-radius: 8px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            top: 40% !important;
            color: #fff !important;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            color: #fff !important;
            font-size: 28px;
        }

        .section-title {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-bottom: 7px;
            padding: 0 15px;
        }

        .section-title .title {
            text-align: center;
            margin: 0;
        }

        .section-title a {
            position: absolute;
            right: 45px;
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
        }

        .section-title a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .section-title {
                justify-content: flex-start;
                padding-left: 20px;
                padding-right: 20px;
            }

            .section-title .title {
                text-align: left !important;
                font-size: 16px !important;
            }

            .section-title a {
                right: 20px;
                font-size: 12px;
            }

            .swiper {
                padding-top: 10px;
            }
        }
    </style>

    <div class="container text-center" style="padding-top: 80px; padding-bottom: 80px;">
        @include('client.buttonSearch')
        <br>
        {{-- ===================== KAMEN RIDER ===================== --}}
        <div class="section-title">
            <h5 class="title fw-bold mb-1">Kamen Rider</h5>
            <a class="text-dark" href="{{ route('video.category', 'kamen-rider') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperKR">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Kamen Rider')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class="bg-white"
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2 text-dark">{{ $category->fullname }}
                                    @if ($category->first_aired)
                                        ({{ \Carbon\Carbon::parse($category->first_aired)->year }})
                                    @endif
                                </p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- ===================== ULTRAMAN ===================== --}}
        <div class="section-title">
            <h5 class="title fw-bold mb-1">Ultraman</h5>
            <a class="text-dark" href="{{ route('video.category', 'ultraman') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperUL">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Ultraman')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class="bg-white"
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2 text-dark">{{ $category->fullname }}
                                    @if ($category->first_aired)
                                        ({{ \Carbon\Carbon::parse($category->first_aired)->year }})
                                    @endif
                                </p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- ===================== SUPER SENTAI ===================== --}}
        <div class="section-title">
            <h5 class="title fw-bold mb-1">Super Sentai</h5>
            <a class="text-dark" href="{{ route('video.category', 'super-sentai') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperSS">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Super Sentai')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class="bg-white"
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2 text-dark">{{ $category->fullname }}
                                    @if ($category->first_aired)
                                        ({{ \Carbon\Carbon::parse($category->first_aired)->year }})
                                    @endif
                                </p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- ===================== POWER RANGERS ===================== --}}
        <div class="section-title">
            <h5 class="title fw-bold mb-1">Power Rangers</h5>
            <a class="text-dark" href="{{ route('video.category', 'power-rangers') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperSS">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Power Rangers')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class="bg-white"
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2 text-dark">{{ $category->fullname }}
                                    @if ($category->first_aired)
                                        ({{ \Carbon\Carbon::parse($category->first_aired)->year }})
                                    @endif
                                </p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <footer class="d-none d-lg-block border-top py-3">
        <div class="container text-center small">
            <a href="{{ route('home') }}" class="text-muted text-decoration-none">
                Copyright &copy; {{ date('Y') }} {{ config('app.name') }}
            </a>
        </div>
        <div class="container text-center small">
            <a href="{{ route('privacy-policy') }}" class="text-muted text-decoration-none">
                Privacy Policy
            </a>
            <span class="text-muted mx-2">|</span>
            <a href="{{ route('terms-conditions') }}" class="text-muted text-decoration-none">
                Terms & Conditions
            </a>
        </div>
        <div class="container text-center small">
            @php
                $at = '@';
                $username = strtolower(str_replace(' ', '', config('app.name')));
            @endphp
            <a href="https://instagram.com/{{ $username }}" class="text-muted text-decoration-none">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <span class="text-muted mx-2">|</span>
            <a href="https://x.com/{{ $username }}" class="text-muted text-decoration-none">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <span class="text-muted mx-2">|</span>
            <a href="https://www.tiktok.com/{{ $at }}{{ $username }}"
                class="text-muted text-decoration-none">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <span class="text-muted mx-2">|</span>
            <a href="https://www.youtube.com/{{ $at }}{{ $username }}"
                class="text-muted text-decoration-none">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </div>
    </footer>

    {{-- SWIPER JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Kamen Rider
        new Swiper(".mySwiperKR", {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: ".mySwiperKR .swiper-button-next",
                prevEl: ".mySwiperKR .swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 4
                },
                1200: {
                    slidesPerView: 5
                },
            }
        });

        // Ultraman
        new Swiper(".mySwiperUL", {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: ".mySwiperUL .swiper-button-next",
                prevEl: ".mySwiperUL .swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 4
                },
                1200: {
                    slidesPerView: 5
                },
            }
        });

        // Super Sentai
        new Swiper(".mySwiperSS", {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: ".mySwiperSS .swiper-button-next",
                prevEl: ".mySwiperSS .swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 4
                },
                1200: {
                    slidesPerView: 5
                },
            }
        });
    </script>

@endsection
