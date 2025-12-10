@extends('layouts.client.app')

@section('title', 'History')

@section('textHistory', 'rounded aktif')

@section('content')
    <div class="container my-5 py-4">
        <div class="row mb-3">
            <div class="col-3 text-left">
            </div>
            <div class="col-6">
                <h1 class="text-center responsive-title">History</h1>
            </div>
            <div class="col-3 text-right"></div>
        </div>

        <div class="mt-4">
            <ul id="watchHistory" class="list-group"></ul>
            {{-- <div class="mt-3">
                <button id="clearHistoryBtn" class="btn btn-danger btn-sm">
                    Delete All History
                </button>
            </div> --}}
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const historyList = document.getElementById("watchHistory");
            const clearHistoryBtn = document.getElementById("clearHistoryBtn");

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
                    historyList.innerHTML =
                        "<li class='list-group-item text-muted'>There is no viewing history yet</li>";
                    return;
                }

                watchHistory.forEach((item, index) => {
                    const li = document.createElement("li");
                    li.className = "list-group-item d-flex justify-content-between align-items-center";
                    const container = document.createElement("div");
                    const link = document.createElement("a");
                    link.href = item.url;
                    link.className = "text-dark fw-semibold text-decoration-none";
                    link.textContent = item.title;

                    const timeAgoText = document.createElement("span");
                    timeAgoText.className = "text-muted ms-2";
                    timeAgoText.textContent = "• " + timeAgo(item.time);

                    container.appendChild(link);
                    container.appendChild(timeAgoText);

                    const deleteBtn = document.createElement("button");
                    deleteBtn.className = "btn btn-sm btn-outline-danger";
                    deleteBtn.innerHTML = "<i class='fas fa-trash'></i>";

                    deleteBtn.addEventListener("click", function() {
                        watchHistory.splice(index, 1);
                        localStorage.setItem("watchHistory", JSON.stringify(watchHistory));
                        renderHistory();
                    });

                    li.appendChild(container);
                    li.appendChild(deleteBtn);
                    historyList.appendChild(li);
                });
            }

            renderHistory();

            // clearHistoryBtn.addEventListener("click", function() {
            //     if (confirm("Are you sure you want to delete all viewing history?")) {
            //         localStorage.removeItem("watchHistory");
            //         watchHistory = [];
            //         renderHistory();
            //     }
            // });
        });
    </script>
@endsection
