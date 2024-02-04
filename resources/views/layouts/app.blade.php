<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevStagram - @yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        <header class="p-5 bg-white border-b shadow">
            <div class="container flex items-center justify-between mx-auto">
                <h1 class="text-3xl font-black">
                    DevStagram
                </h1>

                <nav class="flex gap-2 items-center *:font-bold *:uppercase *:text-gray-600">
                    <a href="#">Login</a>
                    <a href="#">Create Account</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="mb-10 text-3xl font-black text-center">
                @yield('title')
            </h2>

            @yield('content')
        </main>

        <footer class="p-5 font-bold text-center text-gray-500 uppercase">
            DevStagram - All rights reserved &copy; {{ date('Y') }}
        </footer>
    </body>
</html>
