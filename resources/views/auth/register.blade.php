@extends('layouts.app')

@section('title', 'Create Account - DevStagram')

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img src="{{ asset('img/register.jpg') }}" alt="Register Image">
        </div>

        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form>
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-500 uppercase">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="w-full p-3 border rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your Username" class="w-full p-3 border rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your Email" class="w-full p-3 border rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" class="w-full p-3 border rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 font-bold text-gray-500 uppercase">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="w-full p-3 border rounded-lg">
                </div>

                <button type="submit" class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700">Create Account</button>
            </form>
        </div>
    </div>
@endsection
