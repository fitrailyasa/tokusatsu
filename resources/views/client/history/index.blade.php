@extends('layouts.client.app')

@section('title', 'History')
@section('textHistory', 'rounded aktif')

@section('content')
    <div class="container my-5 py-4">
        <div id="historyWrapper" class="d-flex justify-content-center">
            <ul id="watchHistory" class="list-group w-100"></ul>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const historyList = document.getElementById("watchHistory");
            const wrapper = document.getElementById("historyWrapper");

            let watchHistory = JSON.parse(localStorage.getItem("watchHistory")) || [];

            function timeAgo(dateString) {
                const now = new Date();
                const past = new Date(dateString);
                const seconds = Math.floor((now - past) / 1000);

                const intervals = {
                    year: 31536000,
                    month: 2592000,
                    week: 604800,
                    day: 86400,
                    hour: 3600,
                    minute: 60,
                    second: 1
                };

                for (const unit in intervals) {
                    const value = Math.floor(seconds / intervals[unit]);
                    if (value >= 1) {
                        return `${value} ${unit}${value > 1 ? 's' : ''} ago`;
                    }
                }
                return "just now";
            }

            function renderHistory() {
                historyList.innerHTML = "";
                if (watchHistory.length === 0) {
                    wrapper.classList.add("align-items-center");
                    wrapper.style.minHeight = "calc(100vh - 220px)";

                    historyList.innerHTML = `
                <li class="list-group-item border-0 bg-transparent">
                    <div class="d-flex flex-column align-items-center text-muted">
                        <i class="fa-regular fa-clock fa-2x mb-2"></i>
                        <span>There is no viewing history yet</span>
                    </div>
                </li>
            `;
                    return;
                }

                wrapper.classList.remove("align-items-center");
                wrapper.style.minHeight = "auto";

                watchHistory.forEach((item, index) => {
                    const li = document.createElement("li");
                    li.className = "list-group-item d-flex justify-content-between align-items-center";

                    const info = document.createElement("div");

                    const link = document.createElement("a");
                    link.href = item.url;
                    link.textContent = item.title;
                    link.className = "fw-semibold text-dark text-decoration-none";

                    const time = document.createElement("div");
                    time.className = "text-muted small";
                    time.textContent = timeAgo(item.time);

                    info.appendChild(link);
                    info.appendChild(time);

                    const deleteBtn = document.createElement("button");
                    deleteBtn.className = "btn btn-sm btn-outline-danger";
                    deleteBtn.innerHTML = "<i class='fas fa-trash'></i>";

                    deleteBtn.onclick = () => {
                        watchHistory.splice(index, 1);
                        localStorage.setItem("watchHistory", JSON.stringify(watchHistory));
                        renderHistory();
                    };

                    li.appendChild(info);
                    li.appendChild(deleteBtn);
                    historyList.appendChild(li);
                });
            }

            renderHistory();
        });
    </script>
@endsection
