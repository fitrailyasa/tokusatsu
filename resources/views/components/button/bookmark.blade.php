{{-- Bookmark Button --}}
<button class="btn btn-icon bookmark-btn"
    data-title="{{ $title }} {{ ucfirst($video->type) }} {{ $video->number }}" data-url="{{ $video->watchUrl() }}">
    <i data-feather="bookmark"></i>
</button>

<style>
    .bookmark-btn {
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".bookmark-btn");

        let bookmarks = JSON.parse(localStorage.getItem("bookmarks")) || [];

        function updateButtons() {
            buttons.forEach(btn => {
                const videoUrl = btn.dataset.url;
                const isBookmarked = bookmarks.some(b => b.url === videoUrl);

                if (window.feather) feather.replace();

                const icon = btn.querySelector('svg');
                if (icon) {
                    if (isBookmarked) {
                        icon.setAttribute('stroke', 'gold');
                    } else {
                        icon.setAttribute('stroke', 'currentColor');
                    }
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
