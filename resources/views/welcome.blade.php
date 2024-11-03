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

        <!-- Styles -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="font-body antialiased dark:bg-black dark:text-white/50">
        <div
            class="flex h-screen items-center justify-center bg-stone-100 text-black/50 dark:bg-black dark:text-white/50">
            <main class="text-center">
                <h1 class="mb-8 p-4 font-title text-7xl sm:text-8xl text-teal-400">
                    川本文庫
                </h1>

                <!-- ログインの有無により配置するボタンを変更-->
                <nav class="flex flex-col items-center">
                    <!-- 「本棚検索」ボタン（ログインの有無に関係なく配置 -->
                    <a
                        href="{{ route('books.index') }}"
                        class="mb-4 md:mb-6 w-1/2 bg-yellow-400 px-4 md:px-6 py-4 text-lg text-slate-700 shadow hover:bg-yellow-500 md:w-3/5 md:text-xl">
                        本棚検索
                    </a>

                    @if (Route::has("login"))
                        @auth
                            <!-- 「マイページ」ボタン -->
                            <a
                                href="{{ url('/dashboard') }}"
                                class="mb-4 md:mb-6 w-1/2 bg-slate-400 px-4 md:px-6 py-4 text-lg text-white shadow ring-1 ring-transparent transition hover:bg-slate-500 focus:outline-none focus-visible:ring-[#FF2D20] md:w-3/5 md:text-xl dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                マイページ
                            </a>
                        @else
                            <!-- 「ログイン」ボタン -->
                            <a
                                href="{{ route('login') }}"
                                class="mb-4 md:mb-6 w-1/2 bg-pink-400 px-4 md:px-6 py-4 text-lg text-white shadow ring-1 ring-transparent transition hover:bg-pink-500 focus:outline-none focus-visible:ring-[#FF2D20] md:w-3/5 md:text-xl dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                ログイン
                            </a>

                            <!-- 「会員登録」ボタン（デモンストレーションにつき、この機能は解除） -->
                            @if (Route::has("register"))
                                <a
                                    onclick="alert('デモストレーションのため、現在この機能は利用できません。\n「本棚検索」はログインなしで利用できます。\n「ログイン」はゲストユーザーで可能です。\n\nゲストユーザーでログイン↓\nメールアドレス：guest@exmaple.com\nパスワード：guest')"
                                    href=""
                                    class="mb-4 md:mb-6 w-1/2 bg-teal-500 px-4 md:px-6 py-4 text-lg text-white shadow ring-1 ring-transparent transition hover:bg-teal-600 focus:outline-none focus-visible:ring-[#FF2D20] md:w-3/5 md:text-xl dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
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
