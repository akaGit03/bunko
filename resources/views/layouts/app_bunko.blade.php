<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name") }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        th, td { white-space: nowrap; }
    </style>
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="/books" class="navbar-brand">{{ config("app.name") }}</a>
            <span class="nav-text" style="color: #e3f2fd;">ようこそ {{ Auth::user()->name ?? 'ゲスト' }}さん</span>
            @auth
            <form action="{{ route('dashboard') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-sm btn-light">ダッシュボード</button>
            </form>
            <form onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-light">ログアウト</button>
            </form>
            @else
            <form action="{{ route('login') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-sm btn-light">ログイン</button>
            </form>
            <form action="{{ route('register') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-sm btn-light">会員登録</button>
            </form>
            @endauth
        </div>
    </header>
    <div class="container py-4">
        @yield("content")
    </div>
</body>
</html>
