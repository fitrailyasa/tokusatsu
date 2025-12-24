@extends('layouts.client.app')

@section('title', 'Movie ' . $franchise->name ?? '')

@section('textvideo', 'rounded aktif')

@section('content')

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a class="text-dark" href="{{ route('video') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div>
                <h1 class="text-center responsive-title">Movie {{ $franchise->name }}</h1>
            </div>
            <div>
                <button id="shareBtn" class="btn m-0 p-0">
                    <i class="fa fa-share"></i>
                </button>
            </div>
        </div>

        <div class="row">
            @if ($videos->isEmpty())
                <p class="text-center mt-3">There are no video in this category.</p>
            @else
                <div class="table-responsive">
                    <table class="table align-middle table-hover shadow-sm mt-3">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center" style="max-width: 120px;">Movie</th>
                                <th>Title</th>
                                <th style="max-width: 160px;">Release Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $item)
                                <tr>
                                    <td class="text-center fw-semibold">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                            @if ($item->category->img === null)
                                                <img class="img-fluid rounded shadow-sm" width="150px"
                                                    src="{{ asset('logo.png') }}" alt="{{ $item->category->fullname }}">
                                            @else
                                                <img class="img-fluid rounded shadow-sm" width="150px"
                                                    src="{{ asset('storage/' . $item->category->img ?? '') }}"
                                                    alt="{{ $item->category->fullname }}">
                                            @endif
                                        </a>
                                    </td>

                                    <td class="fw-semibold">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </td>

                                    <td class="text-muted">
                                        {{ \Carbon\Carbon::parse($item->airdate ?? $item->category->first_aired)->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <div class="d-flex justify-content-center">
                {{ $videos->appends(['era_id' => $eraId, 'franchise_id' => $franchiseId, 'perPage' => $perPage, 'search' => $search])->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".bookmark-btn");

            let bookmarks = JSON.parse(localStorage.getItem("bookmarks")) || [];

            function updateButtons() {
                buttons.forEach(btn => {
                    const videoUrl = btn.dataset.url;
                    if (bookmarks.find(b => b.url === videoUrl)) {
                        btn.textContent = "✅";
                        btn.classList.remove("btn-outline-warning");
                        btn.classList.add("btn-success");
                    } else {
                        btn.textContent = "⭐";
                        btn.classList.remove("btn-success");
                        btn.classList.add("btn-outline-warning");
                    }
                });
            }

            buttons.forEach(btn => {
                btn.addEventListener("click", function() {
                    const videoTitle = this.dataset.title;
                    const videoUrl = this.dataset.url;

                    const index = bookmarks.findIndex(b => b.url === videoUrl);

                    if (index === -1) {
                        bookmarks.push({
                            title: videoTitle,
                            url: videoUrl
                        });
                    } else {
                        bookmarks.splice(index, 1);
                    }

                    localStorage.setItem("bookmarks", JSON.stringify(bookmarks));
                    updateButtons();
                });
            });

            updateButtons();
        });
    </script>
    <script>
        document.getElementById("shareBtn").addEventListener("click", async function() {
            const shareData = {
                title: document.title,
                text: "{{ $franchise->name }}",
                url: window.location.href
            };

            if (navigator.share) {
                await navigator.share(shareData);
            }
        });
    </script>
@endsection
