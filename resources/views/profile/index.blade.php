@extends('layouts.app')

@section('title', 'Edit Profile: ' . auth()->user()->username)

@section('content')
    <div class="md:flex md:justify-center">
        <div class="p-6 bg-white shadow md:w-1/2">
            <form
                method="POST"
                class="mt-10 md:mt-0"
                action="{{ route('profile.store') }}"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="username"
                    >Username</label>
                    <input
                        id="username"
                        class="w-full p-3 border rounded-lg @error('username') border-red-500 @enderror"
                        name="username"
                        type="text"
                        placeholder="Your Username"
                        value={{ auth()->user()->username }}
                    >
                    @error('username')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="image"
                    >Profile Image
                    </label>
                    <input
                        id="image"
                        class="w-full p-3 border rounded-lg"
                        name="image"
                        type="file"
                        value=""
                        accept=".jpg, .jpeg, .png"
                    >
                </div>

                <button
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                    type="submit"
                >Save Changes
                </button>
            </form>
        </div>
    </div>
@endsection
