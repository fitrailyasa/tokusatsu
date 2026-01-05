<button id="shareBtn" class="btn btn-icon">
    <i data-feather="share-2" class="d-block mx-auto"></i>
</button>

<script>
    document.getElementById("shareBtn").addEventListener("click", async function() {
        const shareData = {
            title: document.title,
            text: "{{ $title ?? '' }}\n",
            url: window.location.href
        };

        if (navigator.share) {
            await navigator.share(shareData);
        }
    });
</script>
