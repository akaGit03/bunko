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

        <!-- Font:Roboto -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet" />

        <!-- Font:Sawarabi Mincho -->
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
        <div class="min-h-screen bg-stone-100">
            @include("layouts.navigation")

            <!-- ヘッダー -->
            @isset($header)
                <header class="bg-white">
                    <div
                        class="mx-auto max-w-7xl px-4 pb-6 pt-8 sm:px-6 lg:px-8">
                        <h2
                            class="pl-4 text-center font-title text-4xl font-semibold leading-tight text-teal-500 md:text-6xl lg:text-left">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <!-- メイン -->
            <main class="font-body">
                <!-- アラート表示 -->
                @if (session("success"))
                    <div
                        class="mb-4 bg-custom-yellow py-6 text-center text-xl text-gray-600 shadow-sm">
                        {{ session("success") }}
                    </div>
                @endif

                <!-- コンテンツ -->
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
