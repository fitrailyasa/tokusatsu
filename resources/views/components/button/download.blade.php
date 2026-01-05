<a id="downloadBtn" href="#" class="btn btn-icon d-none">
    <i data-feather="download" class="d-block mx-auto"></i>
</a>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const tokens = @json($downloadTokens ?? []);
        const downloadBtn = document.getElementById("downloadBtn");

        function updateDownload(index) {
            const token = tokens[index];

            if (!token || token === "") {
                downloadBtn.classList.add("d-none");
                downloadBtn.removeAttribute("href");
                return;
            }

            downloadBtn.href =
                "{{ route('video.download', '__TOKEN__') }}"
                .replace("__TOKEN__", token);

            downloadBtn.classList.remove("d-none");
        }

        updateDownload(0);

        document.querySelectorAll(".server-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                updateDownload(btn.dataset.index);
            });
        });

    });
</script>
