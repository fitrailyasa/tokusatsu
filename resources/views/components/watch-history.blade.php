<script>
    document.addEventListener("DOMContentLoaded", function() {
        let watchHistory = JSON.parse(localStorage.getItem("watchHistory")) || [];
        const videoTitle =
            "{{ $title }}";
        const videoUrl = window.location.href;
        const currentTime = new Date().toISOString();

        const exists = watchHistory.find(item => item.url === videoUrl);

        if (!exists) {
            watchHistory.unshift({
                title: videoTitle,
                url: videoUrl,
                time: currentTime
            });

            if (watchHistory.length > 30) {
                watchHistory = watchHistory.slice(0, 30);
            }

            localStorage.setItem("watchHistory", JSON.stringify(watchHistory));
        }
    });
</script>
