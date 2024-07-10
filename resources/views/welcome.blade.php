<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="py-10 absolute w-full">
        @if (Route::has('login'))
            <nav class="flex items-center justify-center">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <section class="w-full h-full flex items-center justify-center m-0">
        <div class="w-[350px] bg-black text-white p-4 rounded-lg shadow-lg text-center">
            <h1 class="text-2xl font-bold">Bem vindo ao to-do-List</h1>
            <p>Faça Login para continuar</p>
        </div>
    </section>

</body>

</html>