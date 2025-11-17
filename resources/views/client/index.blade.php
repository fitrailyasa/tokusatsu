@extends('layouts.client.app')

@section('title', 'Beranda')

@section('textHome', 'rounded aktif')

@section('content')

    {{-- SWIPER CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .swiper {
            width: 95%;
            padding-top: 10px;
            padding-bottom: 30px;
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
    </style>


    <div class="my-5 py-5 text-center">

        @include('client.buttonSearch')
        {{-- ===================== KAMEN RIDER ===================== --}}
        <h4 class="text-white fw-bold mb-3">Kamen Rider</h4>

        <div class="swiper mySwiperKR">
            <div class="swiper-wrapper">

                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Kamen Rider' && $category->era->name !== 'Showa')
                        <div class="swiper-slide">
                            <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}">
                                <img src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy">
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        {{-- ===================== ULTRAMAN ===================== --}}
        <h4 class="text-white fw-bold mb-3">Ultraman</h4>

        <div class="swiper mySwiperUL">
            <div class="swiper-wrapper">

                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Ultraman' && $category->era->name !== 'Showa')
                        <div class="swiper-slide">
                            <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}">
                                <img src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy">
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        {{-- ===================== SUPER SENTAI ===================== --}}
        <h4 class="text-white fw-bold mb-3">Super Sentai</h4>

        <div class="swiper mySwiperSS">
            <div class="swiper-wrapper">

                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Super Sentai' && $category->era->name !== 'Showa')
                        <div class="swiper-slide">
                            <a href="{{ route('beranda.show', [$category->franchise->slug, $category->slug]) }}">
                                <img src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy">
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
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
                    slidesPerView: 6
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
                    slidesPerView: 6
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
                    slidesPerView: 6
                },
            }
        });
    </script>

@endsection
