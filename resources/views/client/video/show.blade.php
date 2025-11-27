@extends('layouts.client.app')

@section('title', 'Video')

@section('textvideo', 'rounded aktif')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a class="text-white" href="{{ route('video.category', $category->franchise->slug) }}"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <div>
                <h3 class="text-center responsive-title">{{ $category->fullname }}</h3>
            </div>
            <div></div>
        </div>

        <div class="row">
            @if ($videos->isEmpty())
                <p class="text-center">There are no video in this category.</p>
            @else
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Release Date</th>
                            <th class="text-center" scope="col">Bookmark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $item)
                            <tr>
                                <td class="text-center">
                                    <a href="{{ $item->category->slug }}/{{ $item->type }}/{{ $item->number }}">
                                        {{ ucfirst($item->type) }} {{ $item->number }}
                                        <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                                    </a>
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ date('d M Y', strtotime($item->airdate)) }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-warning bookmark-btn"
                                        data-title="{{ $category->franchise->name }} {{ $category->name }} {{ ucfirst($item->type) }} {{ $item->number }}"
                                        data-url="{{ url('video/' . $category->franchise->slug . '/' . $item->category->slug . '/' . $item->type . '/' . $item->number) }}">
                                        ⭐
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
