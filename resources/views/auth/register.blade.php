@extends('layouts.app')

@section('title', 'Create Account - DevStagram')

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img
                src="{{ asset('img/register.jpg') }}"
                alt="Register Image"
            >
        </div>

        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form
                action="{{ route('register') }}"
                method="POST"
                novalidate
            >
                @csrf
                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="name"
                    >Name</label>
                    <input
                        class="w-full p-3 border rounded-lg @error('name') border-red-500 @enderror"
                        id="name"
                        name="name"
                        type="text"
                        value={{ old('name') }}
                        placeholder="Your Name"
                    >
                    @error('name')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="username"
                    >Username</label>
                    <input
                        class="w-full p-3 border rounded-lg @error('username') border-red-500 @enderror"
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Your Username"
                    >
                    @error('username')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="email"
                    >Email</label>
                    <input
                        class="w-full p-3 border rounded-lg @error('email') border-red-500 @enderror"
                        id="email"
                        name="email"
                        type="text"
                        placeholder="Your Email"
                    >
                    @error('email')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="password"
                    >Password</label>
                    <input
                        class="w-full p-3 border rounded-lg @error('password') border-red-500 @enderror"
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Your Password"
                    >
                    @error('password')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="password_confirmation"
                    >Confirm Password</label>
                    <input
                        class="w-full p-3 border rounded-lg"
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Confirm Password"
                    >
                </div>

                <button
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                    type="submit"
                >Create Account</button>
            </form>
        </div>
    </div>
@endsection
