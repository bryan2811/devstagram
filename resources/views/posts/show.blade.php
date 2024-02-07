@extends('layouts.app')

@section('title')

@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img
                src="{{ asset('uploads') . '/' . $post->image }}"
                alt="Post Image {{ $post->title }}"
            >

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form
                        method="POST"
                        action="{{ route('posts.destroy', $post) }}"
                    >
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            value="Delete Post"
                            class="p-2 mt-4 font-bold text-white transition-colors bg-red-500 rounded cursor-pointer hover:bg-red-600"
                        >
                    </form>
                @endif
            @endauth
        </div>

        <div class="p-5 md:w-1/2">
            <div class="p-5 mb-5 bg-white shadow">
                @auth
                    <p class="mb-4 text-xl font-bold text-center">Add a new comment</p>
                    @if (session('message'))
                        <div class="p-2 mb-6 font-bold text-center text-white uppercase bg-green-500 rounded-lg">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form
                        action="{{ route('comment.store', ['post' => $post, 'user' => $user]) }}"
                        method="POST"
                    >
                        @csrf
                        <div class="mb-5">
                            <label
                                class="block mb-2 font-bold text-gray-500 uppercase"
                                for="comment"
                            >Add Comment</label>
                            <textarea
                                id="comment"
                                class="w-full p-3 border rounded-lg @error('comment') border-red-500 @enderror"
                                name="comment"
                                type="text"
                                placeholder="Add comment"
                            ></textarea>

                            @error('comment')
                                <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                            type="submit"
                        >Comment
                        </button>
                    </form>
                @endauth

                <div class="mt-10 mb-5 overflow-y-auto bg-white shadow max-h-96">
                    @if ($post->comments->count())
                        @foreach ($post->comments->reverse() as $comment)
                            <div class="p-5 border-b border-gray-300">
                                <a
                                    class="font-bold"
                                    href="{{ route('posts.index', $comment->user) }}"
                                >{{ $comment->user->username }}</a>
                                <p>{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Comments</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
