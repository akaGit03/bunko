<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet" />
        <!-- 追加 -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap"
            rel="stylesheet" />

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-body antialiased">
        <div class="bg-stone-100 min-h-screen">
            @include("layouts.navigation")

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white">
                    <div
                        class="mx-auto max-w-7xl px-4 pb-6 pt-8 sm:px-6 lg:px-8">
                        <h2
                            class="text-teal-500 pl-4 text-center text-4xl font-semibold leading-tight md:text-6xl lg:text-left">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <!-- アラート表示 -->
                @if (session("success"))
                    <div
                        class="bg-yellow-300 text-gray-700 mb-4 py-6 text-center text-lg shadow-sm">
                        {{ session("success") }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
