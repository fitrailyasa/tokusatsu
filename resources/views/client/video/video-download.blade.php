{{-- Download Button --}}
<div class="action-item" id="downloadWrapper">
    <a id="downloadBtn" href="#" class="btn btn-icon">
        <i data-feather="download" class="d-block mx-auto"></i>
    </a>
    <span>Download</span>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const tokens = @json($downloadTokens ?? []);
        const wrapper = document.getElementById("downloadWrapper");
        const downloadBtn = document.getElementById("downloadBtn");

        function updateDownload(index) {
            const token = tokens[index];

            if (!token) {
                wrapper.classList.add("d-none");
                downloadBtn.removeAttribute("href");
                return;
            }

            downloadBtn.href =
                "{{ route('video.download', '__TOKEN__') }}"
                .replace("__TOKEN__", token);

            wrapper.classList.remove("d-none");
        }

        updateDownload(0);

        document.querySelectorAll(".server-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                updateDownload(btn.dataset.index);
            });
        });

    });
</script>
