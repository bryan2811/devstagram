@extends('layouts.app')

@section('title', 'Profile: ' . $user->username)

@section('content')
    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full md:8/12 lg:w-6/12 md:flex-row">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img
                    src="{{ asset('img/user.svg') }}"
                    alt="User Image"
                >
            </div>

            <div class="flex flex-col px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:items-start">
                <p class="mt-5 text-2xl text-gray-700">{{ $user->username }}</p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    <span class="font-normal">Followers:</span>
                </p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    <span class="font-normal">Following:</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">
                    <span class="font-normal">Posts:</span>
                </p>
            </div>
            <div></div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-4xl font-black text-center">Posts</h2>

        @if ($posts->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($posts as $post)
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
