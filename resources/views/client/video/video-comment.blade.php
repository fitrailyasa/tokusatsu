{{-- Escape HTML helper --}}
<script>
    function escapeHtml(text = '') {
        const div = document.createElement('div');
        div.innerText = text;
        return div.innerHTML;
    }
</script>

<section class="comments-section">
    <div class="section-header">
        <span class="fw-bold">
            Comments (<span id="comment-count">{{ $video->video_comments->count() }}</span>)
        </span>
    </div>

    {{-- Comment List --}}
    <div id="comment-list">
        @foreach ($video->video_comments()->with('user')->latest()->get() as $comment)
            <div class="d-flex gap-2 mb-2 comment-item" data-id="{{ $comment->id }}">
                <div class="user-mini-avatar">
                    <img width="30"
                        src="{{ $comment->user->img ? asset('storage/' . $comment->user->img) : 'https://via.placeholder.com/40' }}">
                </div>

                <div>
                    <div style="font-size:.8rem;font-weight:600;color:var(--text-sec)">
                        {{ $comment->user->name }}
                    </div>

                    <div style="font-size:.9rem">
                        {{ $comment->message }}
                    </div>

                    <div style="font-size:.7rem;color:var(--text-sec);display:flex;gap:8px;">
                        <span>{{ $comment->created_at->diffForHumans() }}</span>

                        @auth
                            @if ($comment->user_id === auth()->id())
                                <button class="btn btn-link p-0 text-danger delete-comment" data-id="{{ $comment->id }}"
                                    style="font-size:.7rem">
                                    Delete
                                </button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @auth
        <div class="comment-input-area mt-3 d-flex">
            <input type="text" id="comment-input" placeholder="Type a comment..." class="form-control">
            <button id="comment-submit" class="btn btn-primary btn-sm ms-2">
                Send
            </button>
        </div>
    @else
        <p class="text-muted mt-2">
            Please <a href="{{ route('login') }}">login</a> to comment.
        </p>
    @endauth
</section>

{{-- ADD COMMENT SCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const input = document.getElementById('comment-input');
        const submit = document.getElementById('comment-submit');
        const list = document.getElementById('comment-list');
        const count = document.getElementById('comment-count');

        if (!submit || !list || !count) return;

        submit.addEventListener('click', async () => {

            const message = input.value.trim();
            if (!message) return;

            submit.disabled = true;

            try {
                const res = await fetch("{{ route('video.comment', $video->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        message
                    })
                });

                if (!res.ok) throw new Error('Request failed');

                const data = await res.json();

                const avatar = data.user?.img ?
                    (data.user.img.startsWith('http') ?
                        data.user.img :
                        `/storage/${data.user.img}`) :
                    'https://via.placeholder.com/40';

                const el = document.createElement('div');
                el.className = 'd-flex gap-2 mb-2 comment-item';
                el.dataset.id = data.id;

                el.innerHTML = `
                <div class="user-mini-avatar">
                    <img width="30" src="${avatar}">
                </div>
                <div>
                    <div style="font-size:.8rem;font-weight:600;color:var(--text-sec)">
                        ${escapeHtml(data.user?.name || 'User')}
                    </div>
                    <div style="font-size:.9rem">
                        ${escapeHtml(data.message)}
                    </div>
                    <div style="font-size:.7rem;color:var(--text-sec);display:flex;gap:8px;">
                        <span>${data.created_at}</span>
                        <button class="btn btn-link p-0 text-danger delete-comment"
                                data-id="${data.id}"
                                style="font-size:.7rem">
                            Delete
                        </button>
                    </div>
                </div>
            `;

                list.prepend(el);
                count.innerText = Number(count.innerText) + 1;
                input.value = '';

            } catch (err) {
                console.error('COMMENT ERROR:', err);
                alert('Failed to send comment');
            } finally {
                submit.disabled = false;
            }
        });

        input?.addEventListener('keydown', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                submit.click();
            }
        });
    });
</script>

{{-- DELETE COMMENT SCRIPT --}}
<script>
    document.addEventListener('click', async e => {

        if (!e.target.classList.contains('delete-comment')) return;

        const id = e.target.dataset.id;
        const count = document.getElementById('comment-count');

        if (!confirm('Are you sure you want to delete this comment?')) return;

        try {
            const res = await fetch(`/video/comment/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            });

            if (!res.ok) throw new Error('Delete failed');

            const data = await res.json();

            document
                .querySelector(`.comment-item[data-id="${data.id}"]`)
                ?.remove();

            if (count) {
                count.innerText = Math.max(0, Number(count.innerText) - 1);
            }

        } catch (err) {
            console.error('DELETE ERROR:', err);
            alert('Failed to delete comment');
        }
    });
</script>
