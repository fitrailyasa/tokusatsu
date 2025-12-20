@extends('layouts.client.app')

@section('title', $category->fullname ?? '')

@section('textvideo', 'rounded aktif')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a class="text-dark" href="{{ route('video.category', $category->franchise->slug) }}"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <div>
                <h1 class="text-center responsive-title">{{ $category->fullname }}</h1>
            </div>
            <div></div>
        </div>

        <div class="row">
            @if ($videos->isEmpty())
                <p class="text-center mt-3">There are no video in this category.</p>
            @else
                <div class="table-responsive">
                    <table class="table align-middle table-hover shadow-sm mt-3">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center" style="width: 120px;">Episode</th>
                                <th>Title</th>
                                <th style="width: 160px;">Release Date</th>
                                <th class="text-center" style="width: 110px;">Bookmark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $item)
                                @if ($item->link != null)
                                    <tr>
                                        <td class="text-center fw-semibold">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                                {{ ucfirst($item->type) }} {{ $item->number }}
                                                <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                            </a>
                                        </td>

                                        <td class="fw-semibold">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                                {{ $item->title }}
                                            </a>
                                        </td>

                                        <td class="text-muted">
                                            {{ date('d M Y', strtotime($item->airdate ?? $item->category->first_aired)) }}
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-sm bookmark-btn px-3 py-1 btn-outline-warning"
                                                data-title="{{ $category->fullname }} {{ ucfirst($item->type) }} {{ $item->number }}"
                                                data-url="{{ route('video.watch', [$item->category->franchise->slug, $item->category->slug, $item->type, $item->number]) }}">
                                                ⭐
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @endif
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
@endsection
