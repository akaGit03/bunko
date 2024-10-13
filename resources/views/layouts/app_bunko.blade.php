<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config("app.name") }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="bg-white">
        <div class="container mx-auto flex justify-between items-center pt-4 pb-2 px-2">
            <a href="/books" class="text-teal-500 text-8xl">{{ config("app.name") }}</a>
            <div class="flex lg:justify-end flex-col lg:flex-row lg:items-center">
                <span class="text-teal-500 sm:text-lg mr-2">ようこそ {{ Auth::user()->name ?? 'ゲスト' }}さん</span>
                @auth
                <form action="{{ route('home.borrows') }}" method="get" class="mt-2 lg:ml-2 lg:mt-0">
                    @csrf
                    <button type="submit" class="bg-slate-400 text-white px-4 py-2 shadow-sm hover:bg-slate-600">マイページ</button>
                </form>
                <form onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post" class="mt-2 lg:ml-2 lg:mt-0">
                    @csrf
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 shadow-sm hover:bg-orange-700">ログアウト</button>
                </form>
                @else
                <form action="{{ route('login') }}" method="get" class="mt-2 lg:ml-2 lg:mt-0">
                    @csrf
                    <button type="submit" class="bg-pink-500 text-white px-4 py-2 shadow-sm hover:bg-pink-600">ログイン</button>
                </form>
                <form action="{{ route('register') }}" method="get" class="mt-2 lg:ml-2 lg:mt-0">
                    @csrf
                    <button type="submit" class="bg-teal-600 text-white px-4 py-2 shadow-sm hover:bg-teal-700">会員登録</button>
                </form>
                @endauth
            </div>
        </div>
    </header>
    <main class="bg-stone-100">
        <div class="container mx-auto py-8">
            @yield("content")
        </div>
    </main>
</body>
</html>
