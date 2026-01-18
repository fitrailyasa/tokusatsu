{{-- Report Button --}}
<div class="action-item">
    <button id="reportBtn" class="btn btn-icon">
        <i data-feather="flag" class="d-block mx-auto"></i>
    </button>
    <span>Report</span>
</div>

{{-- Report Modal --}}
<div class="modal fade" id="reportModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-theme">
            <div class="modal-header">
                <h5 class="modal-title">Report Video</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <textarea id="reportMessage" class="form-control" placeholder="Describe the issue..." rows="4"></textarea>

                <div id="reportError" class="text-danger small mt-2 d-none"></div>
                <div id="reportSuccess" class="text-success small mt-2 d-none">
                    Report submitted successfully.
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button id="submitReport" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>

{{-- Video Report --}}
<script>
    document.getElementById("reportBtn").addEventListener("click", function() {
        new bootstrap.Modal(document.getElementById("reportModal")).show();
    });

    document.getElementById("submitReport").addEventListener("click", function() {
        const message = document.getElementById("reportMessage").value.trim();
        const errorBox = document.getElementById("reportError");
        const successBox = document.getElementById("reportSuccess");

        errorBox.classList.add("d-none");
        successBox.classList.add("d-none");

        if (!message) {
            errorBox.textContent = "Message is required.";
            errorBox.classList.remove("d-none");
            return;
        }

        fetch("{{ route('video.report') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    video_id: {{ $video->id ?? 0 }},
                    message: message
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    successBox.classList.remove("d-none");
                    document.getElementById("reportMessage").value = "";

                    setTimeout(() => {
                        bootstrap.Modal.getInstance(
                            document.getElementById("reportModal")
                        ).hide();
                    }, 1500);
                } else {
                    errorBox.textContent = data.message;
                    errorBox.classList.remove("d-none");
                }
            })
            .catch(() => {
                errorBox.textContent = "Something went wrong.";
                errorBox.classList.remove("d-none");
            });
    });
</script>
