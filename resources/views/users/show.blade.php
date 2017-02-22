<ul>
    @if (!empty($user->tweets))
        @foreach ($user->tweets as $tweet)
            <li>
                {{ $tweet->body }}
            </li>
        @endforeach
    @endif
</ul>