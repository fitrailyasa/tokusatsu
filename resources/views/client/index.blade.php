@extends('layouts.client.app')

@section('textHome', 'rounded aktif')

@section('content')
    @include('components.pwa')

    <div class="container text-center" style="padding-top: 80px; padding-bottom: 80px;">
        @include('client.buttonSearch')
        <br>

        @php
            $franchises = [
                'Kamen Rider' => 'kamen-rider',
                'Ultraman' => 'ultraman',
                'Super Sentai' => 'super-sentai',
                'Power Rangers' => 'power-rangers',
            ];

            $groupedCategories = $categories->groupBy(fn($c) => optional($c->franchise)->name);
        @endphp

        @foreach ($franchises as $franchiseName => $franchiseSlug)
            <div class="section-title">
                <h5 class="responsive-title">{{ $franchiseName }}</h5>
                <a href="{{ route('video.category', $franchiseSlug) }}">
                    View All <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>

            <div class="swiper pt-0 pb-3 px-2 mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($groupedCategories[$franchiseName] ?? [] as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('video.show', [$category->franchise->slug, $category->slug]) }}">
                                <img src="{{ $category->img ? asset('storage/' . $category->img) : asset('storage/comingsoon.jpg') }}"
                                    loading="lazy" alt="Logo {{ $category->name }}">
                                <p class="pt-2 normal-text">
                                    {{ $category->fullname }}
                                    @if ($category->first_aired)
                                        ({{ \Carbon\Carbon::parse($category->first_aired)->year }})
                                    @endif
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

    <footer class="d-none d-lg-block py-3">
        <div class="container text-center small">
            <a href="{{ route('home') }}" class="text-decoration-none">
                Copyright &copy; {{ date('Y') }} {{ ucwords(config('app.name')) }}
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
                $username = strtolower(str_replace(' ', '', ucwords(config('app.name'))));
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
        document.querySelectorAll('.mySwiper').forEach(swiper => {
            new Swiper(swiper, {
                slidesPerView: 3,
                spaceBetween: 10,
                loop: true,
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
        });
    </script>

@endsection
