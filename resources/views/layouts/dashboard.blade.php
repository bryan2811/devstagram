@extends('layouts.app')

@section('title', 'Your Account')

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:8/12 lg:w-6/12 md:flex">
            <div class="px-5 md:w-8/12 lg:w-6/12">
                <img
                    src="{{ asset('img/user.svg') }}"
                    alt="User Image"
                >
            </div>

            <div class="px-5 md:w-8/12 lg:w-6/12">
                <p class="text-2xl text-gray-700">{{ auth()->user()->username }}</p>
            </div>
            <div></div>
        </div>
    </div>
@endsection
