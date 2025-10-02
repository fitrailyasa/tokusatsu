@extends('layouts.client.app')

@section('title', 'History')

@section('textHistory', 'rounded aktif')

@section('content')
    <div class="container my-5 py-4">
        <div class="row mb-3">
            <div class="col-3 text-left">
            </div>
            <div class="col-6">
                <h4 class="text-center responsive-title">History</h4>
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

            let watchHistory =
                JSON.parse(localStorage.getItem("watchHistory")) || [];

            function renderHistory() {
                historyList.innerHTML = "";
                if (watchHistory.length === 0) {
                    historyList.innerHTML =
                        "<li class='list-group-item text-muted'>There is no viewing history yet</li>";
                    return;
                }

                watchHistory.forEach((item, index) => {
                    const li = document.createElement("li");
                    li.className =
                        "list-group-item d-flex justify-content-between align-items-center";

                    const link = document.createElement("a");
                    link.href = item.url;
                    link.textContent = `${item.title} - ${item.time}`;

                    const deleteBtn = document.createElement("button");
                    deleteBtn.className = "btn btn-sm btn-outline-danger";
                    deleteBtn.innerHTML = "<i class='fas fa-trash'></i>";

                    deleteBtn.addEventListener("click", function() {
                        watchHistory.splice(index, 1);
                        localStorage.setItem(
                            "watchHistory",
                            JSON.stringify(watchHistory)
                        );
                        renderHistory();
                    });

                    li.appendChild(link);
                    li.appendChild(deleteBtn);
                    historyList.appendChild(li);
                });
            }

            renderHistory();

            clearHistoryBtn.addEventListener("click", function() {
                if (confirm("Are you sure you want to delete all viewing history?")) {
                    localStorage.removeItem("watchHistory");
                    watchHistory = [];
                    renderHistory();
                }
            });
        });
    </script>
@endsection
