<strong>
    @foreach ($post->likes as $like)
        @if ($loop->count == 1)
            <a class="black-color no-text-decoration" href="/users/{{ $like->user->id }}">
                {{ $like->user->name }}</a></strong> が「いいね！」しました
            
        @elseif ($loop->last)
            </strong>と<strong>
            <a class="black-color no-text-decoration" href="/users/{{ $like->user->id }}">
                {{ $like->user->name }}</a></strong> が「いいね！」しました
        @elseif (!$loop->first)
            </strong>と {{ $loop->count - 1 }}人 が「いいね！」しました
        @break
        @else
        <a class="black-color no-text-decoration" href="/users/{{ $like->user->id }}">{{ $like->user->name }}</a>
        @endif
    @endforeach
</strong>