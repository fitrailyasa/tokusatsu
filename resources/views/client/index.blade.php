@extends('layouts.client.app')

@section('textHome', 'rounded aktif')

@section('content')

    <div class="container text-center" style="padding-top: 80px; padding-bottom: 80px;">
        @include('client.buttonSearch')
        <br>
        {{-- ===================== KAMEN RIDER ===================== --}}
        <div class="section-title">
            <h5 class="responsive-title">Kamen Rider</h5>
            <a href="{{ route('video.category', 'kamen-rider') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperKR">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Kamen Rider')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class=""
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2">{{ $category->fullname }}
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
            <h5 class="responsive-title">Ultraman</h5>
            <a href="{{ route('video.category', 'ultraman') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperUL">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Ultraman')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class=""
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2">{{ $category->fullname }}
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
            <h5 class="responsive-title">Super Sentai</h5>
            <a href="{{ route('video.category', 'super-sentai') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperSS">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Super Sentai')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class=""
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2">{{ $category->fullname }}
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
            <h5 class="responsive-title">Power Rangers</h5>
            <a href="{{ route('video.category', 'power-rangers') }}">View All <i
                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="swiper pt-0 pb-3 px-2 mySwiperSS">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category->franchise && $category->franchise->name === 'Power Rangers')
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img class=""
                                    src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="small pt-2">{{ $category->fullname }}
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
            <a href="{{ route('home') }}" class="text-decoration-none">
                Copyright &copy; {{ date('Y') }} {{ config('app.name') }}
            </a>
        </div>
        <div class="container text-center small">
            <a href="{{ route('privacy-policy') }}" class="text-decoration-none">
                Privacy Policy
            </a>
            <span class="mx-2">|</span>
            <a href="{{ route('terms-conditions') }}" class="text-decoration-none">
                Terms & Conditions
            </a>
        </div>
        <div class="container text-center small">
            @php
                $at = '@';
                $username = strtolower(str_replace(' ', '', config('app.name')));
            @endphp
            <a href="https://instagram.com/{{ $username }}" class="text-decoration-none">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <span class="mx-2">|</span>
            <a href="https://x.com/{{ $username }}" class="text-decoration-none">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <span class="mx-2">|</span>
            <a href="https://www.tiktok.com/{{ $at }}{{ $username }}" class="text-decoration-none">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <span class="mx-2">|</span>
            <a href="https://www.youtube.com/{{ $at }}{{ $username }}" class="text-decoration-none">
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
