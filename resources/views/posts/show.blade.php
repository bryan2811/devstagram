@extends('layouts.app')

@section('title')

@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img
                src="{{ asset('uploads') . '/' . $post->image }}"
                alt="Post Image {{ $post->title }}"
            >

            <div class="flex items-center gap-4 p-3">
                @auth
                    @if ($post->checkLike(auth()->user()))
                        <form
                            method="POST"
                            action="{{ route('posts.likes.destroy', $post) }}"
                        >
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="red"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form
                            method="POST"
                            action="{{ route('posts.likes.store', $post) }}"
                        >
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="white"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif
                @endauth

                <p class="font-bold">{{ $post->likes->count() }} <span class="font-normal">Likes</span></p>
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
