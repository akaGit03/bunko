<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
        <!-- ヘッダー -->
        <header class="bg-white">
            <div
                class="container mx-auto flex items-center justify-between px-2 pb-2 pt-4">
                <a href="/books" class="font-title text-teal-500 text-8xl">
                    {{ config("app.name") }}
                </a>
                <div
                    class="flex flex-col lg:flex-row lg:items-center lg:justify-end">
                    <span class="text-teal-500 mr-2 sm:text-lg">
                        ようこそ {{ Auth::user()->name ?? "ゲスト" }} さん
                    </span>

                    <!-- ログインの有無により配置するボタンを変更-->
                    @auth
                        <!-- 「マイページ」ボタン-->
                        <form
                            action="{{ route('home.borrows') }}"
                            method="get"
                            class="mt-2 lg:ml-2 lg:mt-0">
                            @csrf
                            <button
                                type="submit"
                                class="bg-slate-400 text-white hover:bg-slate-500 px-4 py-2 shadow-sm">
                                マイページ
                            </button>
                        </form>

                        <!-- 「ログアウト」ボタン -->
                        <form
                            onsubmit="return confirm('ログアウトしますか？')"
                            action="{{ route('logout') }}"
                            method="post"
                            class="mt-2 lg:ml-2 lg:mt-0">
                            @csrf
                            <button
                                type="submit"
                                class="bg-orange-500 text-white hover:bg-orange-600 px-4 py-2 shadow-sm">
                                ログアウト
                            </button>
                        </form>
                    @else
                        <!-- 「ログイン」ボタン -->
                        <form
                            action="{{ route('login') }}"
                            method="get"
                            class="mt-2 lg:ml-2 lg:mt-0">
                            @csrf
                            <button
                                type="submit"
                                class="bg-pink-400 text-white hover:bg-pink-500 px-4 py-2 shadow-sm">
                                ログイン
                            </button>
                        </form>

                        <!-- 「会員登録」ボタン（デモンストレーションにつき、この機能は解除） -->
                        <form
                            onclick="alert('デモストレーションのため、現在この機能は利用できません。\n「ログイン」はゲストユーザーで可能です。\n\nゲストユーザーでログイン↓\nメールアドレス：guest@exmaple.com\nパスワード：guest')"
                            action=""
                            method="get"
                            class="mt-2 lg:ml-2 lg:mt-0">
                            @csrf
                            <button
                                type="submit"
                                class="bg-teal-500 text-white hover:bg-teal-600 px-4 py-2 shadow-sm">
                                会員登録
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </header>

        <!-- メイン -->
        <main class="bg-stone-100">
            <!-- アラート表示 -->
            @if (session("success"))
                <div class="bg-custom-yellow text-gray-600 mb-4 py-6 text-center text-xl shadow-sm">
                    {{ session("success") }}
                </div>
                @elseif ($errors->any())
                <div class="bg-orange-300 text-orange-700 mb-4 py-6 text-center text-xl shadow-sm">
                    <p>【！！】コメントエラーです。コメント入力欄をご確認ください。</p>
                </div>
                </ul>
            @endif

            <!-- コンテンツ -->
            <div class="container mx-auto py-8">
                @yield("content")
            </div>
        </main>
    </body>
</html>
