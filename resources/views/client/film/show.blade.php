@extends('layouts.client.app')

@section('title', 'Film')

@section('textFilm', 'rounded aktif')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center px-3 pt-4">
            <div>
                <a class="text-white" href="{{ route('film.category', $category->franchise->slug) }}"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <div>
                <h3 class="text-center responsive-title">Film {{ $category->franchise->name }} {{ $category->name }}</h3>
            </div>
            <div></div>
        </div>

        <div class="row">
            @if ($films->isEmpty())
                <p>There are no film in this category.</p>
            @else
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Title</th>
                            <th class="text-center" scope="col">Bookmark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $film)
                            <tr>
                                <td class="text-center">
                                    <a
                                        href="/{{ $film->category->franchise->slug }}-{{ $film->category->slug }}-{{ $film->type }}-{{ $film->number }}">
                                        {{ ucfirst($film->type) }} {{ $film->number }}
                                        <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                                    </a>
                                </td>
                                <td>{{ $film->name }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-warning bookmark-btn"
                                        data-title="{{ $category->franchise->name }} {{ $category->name }} {{ ucfirst($film->type) }} {{ $film->number }}"
                                        data-url="{{ url($category->franchise->slug . '-' . $film->category->slug . '-' . $film->type . '-' . $film->number) }}">
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
                    const filmUrl = btn.dataset.url;
                    if (bookmarks.find(b => b.url === filmUrl)) {
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
                    const filmTitle = this.dataset.title;
                    const filmUrl = this.dataset.url;

                    const index = bookmarks.findIndex(b => b.url === filmUrl);

                    if (index === -1) {
                        bookmarks.push({
                            title: filmTitle,
                            url: filmUrl
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
