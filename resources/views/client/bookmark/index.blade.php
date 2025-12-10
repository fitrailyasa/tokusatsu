@extends('layouts.client.app')

@section('title', 'Bookmark')

@section('textBookmark', 'rounded aktif')

@section('content')
    <div class="container my-5 py-4">
        <div class="row mb-3">
            <div class="col-3 text-left"></div>
            <div class="col-6">
                <h1 class="text-center responsive-title">Bookmark</h1>
            </div>
            <div class="col-3 text-right"></div>
        </div>

        <div class="mt-4">
            <ul id="bookmarkList" class="list-group"></ul>
            {{-- <div class="mt-3">
                <button id="clearBookmarkBtn" class="btn btn-danger btn-sm">
                    Delete All Bookmark
                </button>
            </div> --}}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bookmarkList = document.getElementById("bookmarkList");
            const clearBookmarkBtn = document.getElementById("clearBookmarkBtn");

            let bookmarks = JSON.parse(localStorage.getItem("bookmarks")) || [];

            function renderBookmarks() {
                bookmarkList.innerHTML = "";
                if (bookmarks.length === 0) {
                    bookmarkList.innerHTML =
                        "<li class='list-group-item text-muted'>There are no bookmarks yet</li>";
                    return;
                }

                bookmarks.forEach((item, index) => {
                    const li = document.createElement("li");
                    li.className =
                        "list-group-item d-flex justify-content-between align-items-center";

                    const link = document.createElement("a");
                    link.href = item.url ?? "#";
                    link.textContent = item.title;

                    const deleteBtn = document.createElement("button");
                    deleteBtn.className = "btn btn-sm btn-outline-danger";
                    deleteBtn.innerHTML = "<i class='fas fa-trash'></i>";

                    deleteBtn.addEventListener("click", function() {
                        bookmarks.splice(index, 1);
                        localStorage.setItem("bookmarks", JSON.stringify(bookmarks));
                        renderBookmarks();
                    });

                    li.appendChild(link);
                    li.appendChild(deleteBtn);
                    bookmarkList.appendChild(li);
                });
            }

            renderBookmarks();

            // clearBookmarkBtn.addEventListener("click", function() {
            //     if (confirm("Are you sure you want to delete all bookmarks?")) {
            //         localStorage.removeItem("bookmarks");
            //         bookmarks = [];
            //         renderBookmarks();
            //     }
            // });
        });
    </script>
@endsection
