<!-- 画像ファイルアップロード（※試験運用） -->

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>ファイルアップロード</title>
    </head>
    <body>
        <h1>ファイルアップロード</h1>

        @if (session("success"))
            <p>{{ session("success") }}</p>
        @elseif (session("error"))
            <p>{{ session("error") }}</p>
        @endif
        <form
            action="{{ route('image.upload') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" />
            <button type="submit">アップロード</button>
        </form>
    </body>
</html>
