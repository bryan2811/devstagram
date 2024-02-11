@extends('layouts.app')

@section('title', 'Profile: ' . $user->username)

@section('content')
    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full md:8/12 lg:w-6/12 md:flex-row">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img
                    src="{{ $user->image ? asset('profiles') . '/' . $user->image : asset('img/user.svg') }}"
                    alt="User Image"
                >
            </div>

            <div class="flex flex-col px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:items-start">
                <div class="flex items-center gap-2">
                    <p class="text-2xl text-gray-700">{{ $user->username }}</p>

                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a
                                href="{{ route('profile.index') }}"
                                class="text-gray-500 cursor-pointer hover:text-gray-600"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-6 h-6"
                                >
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z"
                                    />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    <span class="font-normal">Followers:</span>
                </p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    <span class="font-normal">Following:</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->posts->count() }}
                    <span class="font-normal">Posts</span>
                </p>
            </div>
            <div></div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-4xl font-black text-center">Posts</h2>

        @if ($posts->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($posts->reverse() as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
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
            <p class="text-sm font-bold text-center text-gray-600 uppercase">No Posts</p>
        @endif
    </section>
@endsection
