@extends('layouts.client.app')

@section('title', 'Bookmark')
@section('textBookmark', 'rounded aktif')

@section('content')
    <div class="container my-5 py-4">
        <div id="bookmarkWrapper" class="d-flex justify-content-center">
            <ul id="bookmarkList" class="list-group w-100"></ul>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bookmarkList = document.getElementById("bookmarkList");
            const wrapper = document.getElementById("bookmarkWrapper");

            let bookmarks = JSON.parse(localStorage.getItem("bookmarks")) || [];

            function renderBookmarks() {
                bookmarkList.innerHTML = "";
                if (bookmarks.length === 0) {
                    wrapper.classList.add("align-items-center");
                    wrapper.style.minHeight = "calc(100vh - 220px)";

                    bookmarkList.innerHTML = `
                <li class="list-group-item border-0 bg-transparent">
                    <div class="d-flex flex-column align-items-center text-muted">
                        <i class="fa-regular fa-bookmark fa-2x mb-2"></i>
                        <span>No bookmarks yet</span>
                    </div>
                </li>
            `;
                    return;
                }

                wrapper.classList.remove("align-items-center");
                wrapper.style.minHeight = "auto";

                bookmarks.forEach((item, index) => {
                    const li = document.createElement("li");
                    li.className =
                        "list-group-item bookmark-item d-flex justify-content-between align-items-center";

                    const link = document.createElement("a");
                    link.href = item.url ?? "#";
                    link.textContent = item.title;
                    link.className = "fw-semibold bookmark-link text-decoration-none";

                    const deleteBtn = document.createElement("button");
                    deleteBtn.className = "btn btn-sm btn-outline-danger";
                    deleteBtn.innerHTML = "<i class='fas fa-trash'></i>";

                    deleteBtn.onclick = () => {
                        bookmarks.splice(index, 1);
                        localStorage.setItem("bookmarks", JSON.stringify(bookmarks));
                        renderBookmarks();
                    };

                    li.appendChild(link);
                    li.appendChild(deleteBtn);
                    bookmarkList.appendChild(li);
                });
            }

            renderBookmarks();
        });
    </script>
@endsection
