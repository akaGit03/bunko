<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>川本文庫</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="dark:bg-black dark:text-white/50 font-sans antialiased">
        <div
            class="bg-stone-100 text-black/50 dark:bg-black dark:text-white/50 flex h-screen items-center justify-center">
            <main class="text-center">
                <h1 class="text-teal-400 mb-8 p-4 text-8xl">川本文庫</h1>
                <nav class="flex flex-col items-center">
                    <a
                        href="{{ route("books.index") }}"
                        class="text-slate-700 bg-yellow-400 hover:bg-yellow-500 mb-6 w-2/5 px-6 py-4 text-lg shadow lg:w-2/3 lg:text-xl">
                        蔵書一覧
                    </a>
                    @if (Route::has("login"))
                        @auth
                            <a
                                href="{{ url("/dashboard") }}"
                                class="text-white bg-slate-400 hover:bg-slate-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white mb-6 w-2/5 px-6 py-4 text-lg shadow ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] lg:w-2/3 lg:text-xl">
                                マイページ
                            </a>
                        @else
                            <a
                                href="{{ route("login") }}"
                                class="text-white bg-pink-400 hover:bg-pink-500 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white mb-6 w-2/5 px-6 py-4 text-lg shadow ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] lg:w-2/3 lg:text-xl">
                                ログイン
                            </a>

                            @if (Route::has("register"))
                                <a
                                    href="{{ route("register") }}"
                                    class="text-white bg-teal-500 hover:bg-teal-600 dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white mb-6 w-2/5 px-6 py-4 text-lg shadow ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] lg:w-2/3 lg:text-xl">
                                    会員登録
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </main>
        </div>
    </body>
</html>
