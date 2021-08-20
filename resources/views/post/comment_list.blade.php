@foreach($post->comments as $comment)
<div class="mb-2">
    @if($comment->user_id == Auth::user()->id)
        <a href="/comments/{{ $comment->id }}" class="delete-comment" data-method="delete" data-remote="true" rel="nofollow"></a>
    @endif
    <span>
        <strong>
            <a href="/users/{{ $comment->user->id }}" class="no-text-decoration black-color">{{ $comment->user->name }}</a>
        </strong>
    </span>
    <span>{{ $comment->comment }}</span>
</div>
@endforeach