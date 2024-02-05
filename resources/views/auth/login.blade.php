@extends('layouts.app')

@section('title', 'Login - DevStagram')

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img
                src="{{ asset('img/login.jpg') }}"
                alt="Login Image"
            >
        </div>

        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form
                method="POST"
                action="{{ route('login') }}"
                novalidate
            >
                @csrf

                @if (session('status'))
                    <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ session('status') }}</p>
                @endif

                <div class="mb-5">
                    <label
                        class="block mb-2 font-bold text-gray-500 uppercase"
                        for="email"
                    >Email</label>
                    <input
                        id="email"
                        class="w-full p-3 border rounded-lg @error('email') border-red-500 @enderror"
                        name="email"
                        type="text"
                        placeholder="Your Email"
                        value={{ old('email') }}
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
                        id="password"
                        class="w-full p-3 border rounded-lg @error('password') border-red-500 @enderror"
                        name="password"
                        type="password"
                        placeholder="Your Password"
                    >
                    @error('password')
                        <p class="p-2 my-2 text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-2 mb-5">
                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                    ><label
                        class="text-sm text-gray-500"
                        for="remember"
                    >Remember Me</label>
                </div>

                <button
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                    type="submit"
                >Login</button>
            </form>
        </div>
    </div>
@endsection
