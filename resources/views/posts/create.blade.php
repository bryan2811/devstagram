@extends('layouts.app')
@push('styles')
    <link
        rel="stylesheet"
        href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
        type="text/css"
    />
@endpush

@section('title', 'Create Post - DevStagram')

@section('content')
    <div class="md:flex md:items-center">
        <div class="px-10 md:w-1/2">
            <form
                id="dropzone"
                action="{{ route('images.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded dropzone h-96"
            >
                @csrf
            </form>
        </div>

        <div class="p-10 mt-10 bg-white rounded-lg shadow-xl md:w-1/2 md:mt-0">
            <form
                action="{{ route('posts.store') }}"
                method="POST"
                novalidate
            >
                @csrf
                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="title"
                    >Title</label>
                    <input
                        id="title"
                        class="w-full p-3 border rounded-lg @error('title') border-red-500 @enderror"
                        name="title"
                        type="text"
                        placeholder="Post Title"
                        value={{ old('title') }}
                    >
                    @error('title')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="description"
                    >Description</label>
                    <textarea
                        id="description"
                        class="w-full p-3 border rounded-lg @error('description') border-red-500 @enderror"
                        name="description"
                        type="text"
                        placeholder="Post Description"
                        value={{ old('description') }}
                    >{{ old('title') }}</textarea>

                    @error('description')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input
                        name="image"
                        type="hidden"
                        value="{{ old('image') }}"
                    >
                    @error('image')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                    type="submit"
                >Create Post
                </button>
            </form>
        </div>
    </div>
@endsection
