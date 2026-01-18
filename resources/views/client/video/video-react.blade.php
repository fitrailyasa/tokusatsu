{{-- Like Button --}}
<div class="action-item {{ $userReaction === 'like' ? 'active' : '' }}" data-status="like" data-video="{{ $video->id }}"
    onclick="@guest window.location='{{ route('login') }}' @endguest">
    <i data-feather="thumbs-up" class="d-block mx-auto"></i>
    <span id="like-count">{{ $video->video_reacts()->where('status', 'like')->count() }}</span>
</div>

{{-- Dislike Button --}}
<div class="action-item {{ $userReaction === 'dislike' ? 'active' : '' }}" data-status="dislike"
    data-video="{{ $video->id }}" onclick="@guest window.location='{{ route('login') }}' @endguest">
    <i data-feather="thumbs-down" class="d-block mx-auto"></i>
    <span id="dislike-count">{{ $video->video_reacts()->where('status', 'dislike')->count() }}</span>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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

                    if (data.user_reaction === 'like') {
                        document.getElementById('like-button').classList.add('active');
                        document.getElementById('dislike-button').classList.remove('active');
                    } else {
                        document.getElementById('like-button').classList.remove('active');
                        document.getElementById('dislike-button').classList.add('active');
                    }
                });
        }

        document.getElementById('like-button').addEventListener('click', function() {
            react(this.dataset.video, 'like');
        });

        document.getElementById('dislike-button').addEventListener('click', function() {
            react(this.dataset.video, 'dislike');
        });
    });
</script>
