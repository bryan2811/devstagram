@if ($posts->count())
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                    <img
                        src="{{ asset('uploads') . '/' . $post->image }}"
                        alt="Post Image {{ $post->title }}"
                    >
                </a>
            </div>
        @endforeach
    </div>

    <div class="my-10">{{ $posts->links() }}</div>
@else
    <p class="text-center">No posts, start following someone to see their posts</p>
@endif
