<div {{ $attributes->merge(['class' => 'bigText']) }}>
    <h1>{{ $title }}</h1>
    <h3>{{ $info }}</h3>
    <h3>{{ $author }}</h3>
    Let all your things have their places; let each part of your business have its time. - Benjamin Franklin
    <ul>
        @foreach($items('test') as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    {{ $slot }}
</div>
