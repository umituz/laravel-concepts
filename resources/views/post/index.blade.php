<table>
    @forelse($posts as $post)
        <tr>
            <td>{{ $post->active }}</td>
            <td>{{ $post->title }}</td>
        </tr>
    @empty
    @endforelse
</table>

@isset($posts)
    @if(count($posts) > 0)
        <p>
            {{ $posts->appends(request()->input())->links() }}
        </p>
    @endif
@endisset
