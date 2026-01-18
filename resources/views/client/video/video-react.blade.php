{{-- Like Button --}}
<div id="like-button" class="action-item {{ $userReaction === 'like' ? 'active' : '' }}" data-status="like"
    data-video="{{ $video->id }}">
    <i data-feather="thumbs-up"></i>
    <span id="like-count">
        {{ $video->video_reacts()->where('status', 'like')->count() }}
    </span>
</div>

{{-- Dislike Button --}}
<div id="dislike-button" class="action-item {{ $userReaction === 'dislike' ? 'active' : '' }}" data-status="dislike"
    data-video="{{ $video->id }}">
    <i data-feather="thumbs-down"></i>
    <span id="dislike-count">
        {{ $video->video_reacts()->where('status', 'dislike')->count() }}
    </span>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
        const likeBtn = document.getElementById('like-button');
        const dislikeBtn = document.getElementById('dislike-button');

        function react(videoId, status) {
            fetch(`/video/${videoId}/react`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('like-count').innerText = data.likes;
                    document.getElementById('dislike-count').innerText = data.dislikes;

                    likeBtn.classList.toggle('active', data.user_reaction === 'like');
                    dislikeBtn.classList.toggle('active', data.user_reaction === 'dislike');

                })
                .catch(err => console.error(err));
        }

        likeBtn.addEventListener('click', function() {

            if (!isLoggedIn) {
                window.location.href = "{{ route('login') }}";
                return;
            }

            react(this.dataset.video, 'like');
        });

        dislikeBtn.addEventListener('click', function() {

            if (!isLoggedIn) {
                window.location.href = "{{ route('login') }}";
                return;
            }

            react(this.dataset.video, 'dislike');
        });
    });
</script>
