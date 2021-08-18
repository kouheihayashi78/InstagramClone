<strong>
    @foreach ($post->likes as $like)
        @if ($loop->count == 1)
            {{ $like->user->name }} </strong> が「いいね！」しました
        @elseif ($loop->last)
            </strong>と<strong>
                {{ $like->user->name }}</strong> が「いいね！」しました
        @elseif (!$loop->first)
            </strong>と {{ $loop->count - 1 }}人 が「いいね！」しました
        @break
        @else
            {{ $like->user->name }}
        @endif
    @endforeach
</strong>