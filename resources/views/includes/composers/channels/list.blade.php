<ul>
    @foreach($channels as $channel)
        <li>{{ $channel->name }}</li>
    @endforeach
</ul>
