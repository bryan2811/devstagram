<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>DevStagram - @yield('title')</title>
    <link
        href="https://fonts.googleapis.com"
        rel="preconnect"
    >
    <link
        href="https://fonts.gstatic.com"
        rel="preconnect"
        crossorigin
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap"
        rel="stylesheet"
    >
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 bg-white border-b shadow">
        <div class="container flex items-center justify-between mx-auto">
            <h1 class="text-lg font-black md:text-3xl">
                DevStagram
            </h1>

            @auth
                <nav class="flex gap-2 items-center *:font-bold *:text-gray-600 *:text-sm *:sm:text-base">
                    <a href="#">
                        Hey: <span class="font-normal">{{ auth()->user()->name }}</span>
                    </a>
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center *:font-bold *:uppercase *:text-gray-600 *:text-sm *:sm:text-base">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Create Account</a>
                </nav>
            @endguest
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="mb-10 text-3xl font-black text-center">
            @yield('title')
        </h2>

        @yield('content')
    </main>

    <footer class="p-5 mt-10 font-bold text-center text-gray-500 uppercase">
        DevStagram - All rights reserved &copy; {{ date('Y') }}
    </footer>
</body>

</html>
