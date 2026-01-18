<section class="comments-section">
    <div class="section-header">
        <span class="fw-bold">Comments (<span id="comment-count">{{ $video->video_comments->count() }}</span>)</span>
    </div>

    <div id="comment-list">
        @foreach ($video->video_comments()->with('user')->latest()->get() as $comment)
            <div class="d-flex gap-2 mb-2 comment-item">
                <div class="user-mini-avatar">
                    <img src="{{ $comment->user->avatar ?? 'https://via.placeholder.com/40' }}" alt="">
                </div>
                <div>
                    <div style="font-size:0.8rem; font-weight:600; color:var(--text-sec); margin-bottom:2px;">
                        {{ $comment->user->name }}
                    </div>
                    <div style="font-size:0.9rem;">{{ $comment->message }}</div>
                    <div style="font-size:0.7rem; color:var(--text-sec);">
                        {{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
        @endforeach
    </div>

    @auth
        <div class="comment-input-area mt-3">
            <div class="user-mini-avatar">
                <img src="{{ auth()->user()->avatar ?? 'https://via.placeholder.com/40' }}" alt="">
            </div>
            <input type="text" id="comment-input" placeholder="Type a comment..." class="form-control">
            <button id="comment-submit" class="btn btn-primary btn-sm ms-2">Send</button>
        </div>
    @else
        <p class="text-muted mt-2">Please <a href="{{ route('login') }}">login</a> to comment.</p>
    @endauth
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('comment-input');
        const submit = document.getElementById('comment-submit');
        const commentList = document.getElementById('comment-list');
        const commentCount = document.getElementById('comment-count');

        if (!submit) return;

        submit.addEventListener('click', function() {
            const message = input.value.trim();
            if (!message) return;

            fetch("{{ route('video.comment', $video->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: message
                    })
                })
                .then(res => res.json())
                .then(data => {
                    const div = document.createElement('div');
                    div.classList.add('d-flex', 'gap-2', 'mb-2', 'comment-item');
                    div.innerHTML = `
                                            <div class="user-mini-avatar">
                                                <img src="${data.user.avatar}" alt="">
                                            </div>
                                            <div>
                                                <div style="font-size:0.8rem; font-weight:600; color:var(--text-sec); margin-bottom:2px;">
                                                    ${data.user.name}
                                                </div>
                                                <div style="font-size:0.9rem;">${data.message}</div>
                                                <div style="font-size:0.7rem; color:var(--text-sec);">${data.created_at}</div>
                                            </div>
                                        `;
                    commentList.prepend(div);

                    commentCount.innerText = parseInt(commentCount.innerText) + 1;

                    input.value = '';
                })
                .catch(err => console.error(err));
        });

        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                submit.click();
            }
        });
    });
</script>
