@extends('layouts.client.app')

@section('title', 'Home')

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
            margin-bottom: 5px;
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

    <div class="mt-5 py-3 bg-light text-center">
        @include('client.buttonSearch')
        <br>
        {{-- ===================== KAMEN RIDER ===================== --}}
        <div class="section-title">
            <h5 class="title fw-bold mb-1">Kamen Rider</h5>
            <a class="text-dark" href="{{ route('video.category', 'kamen-rider') }}">Lihat Semua <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper mb-3 px-2 bg-light mySwiperKR">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Kamen Rider' && $category->era->name !== 'Showa')
                        <div class="swiper-slide">
                            <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}">
                                <img src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy">
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
            <a class="text-dark" href="{{ route('video.category', 'ultraman') }}">Lihat Semua <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper mb-3 px-2 bg-light mySwiperUL">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Ultraman' && $category->era->name !== 'Showa')
                        <div class="swiper-slide">
                            <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}">
                                <img src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy">
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
            <a class="text-dark" href="{{ route('video.category', 'super-sentai') }}">Lihat Semua <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper mb-3 px-2 bg-light mySwiperSS">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Super Sentai' && $category->era->name !== 'Showa')
                        <div class="swiper-slide">
                            <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}">
                                <img src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy">
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
