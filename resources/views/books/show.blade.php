@extends("layouts.app-bunko")
@section("content")
    
    <div class="text-gray-700 py-12">
        <div class="flex justify-center">
            <a
                class="bg-slate-400 text-white hover:bg-slate-600 focus:shadow-outline rounded px-4 py-2 font-bold shadow-sm focus:outline-none"
                href="{{ url()->previous() }}">  <!-- 遷移前のページに戻る -->
                戻る
            </a>
        </div>

        <!-- 図書情報 -->
        <div class="mx-auto max-w-7xl py-8 sm:px-6 lg:px-8">
            <h2
                class="pb-8 pt-4 text-center text-3xl font-semibold md:text-4xl">
                図書情報
            </h2>

            <div class="bg-white mb-4 flex justify-center rounded p-4">
                <div class="w-[80%] px-4 py-6">
                    <!-- レスポンシブのためのラッパー（lgを境にレコードの並び方が変化） -->
                    <div class="flex flex-col lg:flex-row items-center">
                        <!-- 書影 -->
                        <div class="w-full lg:w-1/3 max-w-sm lg:max-w-lg border mx-6 h-auto">
                            <img src="{{ asset('storage/images/no_image.jpg') }}" alt="書影" class="w-full h-auto rounded object-contain">
                        </div>

                        <!-- 図書情報テーブル -->
                        <div class="w-full lg:w-2/3 my-6">
                            <table class="container w-full border-collapse border lg:table">
                                <tr class="border-b md:text-lg lg:table-row">
                                    <th class="block w-1/3 p-4 lg:py-6 text-left md:table-cell">タイトル：</th>
                                    <td class="block w-2/3 px-4 lg:pl-0 pb-4 md:py-6 lg:table-cell">{{ $book->title }}</td>
                                </tr>
                                <tr class="border-b md:text-lg lg:table-row">
                                    <th class="block w-1/3 p-4 lg:py-6 text-left md:table-cell">著者：</th>
                                    <td class="block w-2/3 px-4 lg:pl-0 pb-4 md:py-6 lg:table-cell">{{ $book->author }}</td>
                                </tr>
                                <tr class="border-b md:text-lg lg:table-row">
                                    <th class="block w-1/3 p-4 lg:py-6 text-left md:table-cell">分類：</th>
                                    <td class="block w-2/3 px-4 lg:pl-0 pb-4 md:py-6 lg:table-cell">{{ $book->type->name }}</td>
                                </tr>
                                <tr class="border-b md:text-lg lg:table-row">
                                    <th class="block w-1/3 p-4 lg:py-6 text-left md:table-cell">持ち主：</th>
                                    <td class="block w-2/3 px-4 lg:pl-0 pb-4 md:py-6 lg:table-cell">{{ $book->user->name }}</td>
                                </tr>
                            </table>

                            <!-- 持ち主のコメント用テーブル -->
                            <table class="container mt-6 w-full border-collapse border">
                                <tr class="md:text-lg">
                                    <th class="px-4 py-2 text-left">持ち主のコメント</th>
                                </tr>
                                <tr class="md:text-lg">
                                    @if ($book->comment)
                                        <td class="border-2 p-4 text-left">{{ $book->comment }}</td>
                                    @else
                                        <td class="p-4 text-left"></td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 「借りる」/「返却」ボタン（※ログインユーザーのみ） -->
                    <div class="mt-2 flex justify-center md:justify-center md:mt-4">
                        @auth
                            @if ($book->isLent()) <!-- ユーザー自身が借りている場合 -->
                                <form action="{{ route('books.returnBook', $book) }}" method="POST" onsubmit="return confirm('この本を返却しますか？')">
                                    @csrf
                                    <button class="bg-teal-500 text-white hover:bg-teal-600 rounded px-4 py-2 text-xl font-semibold shadow-sm" type="submit">
                                        返却する
                                    </button>
                                </form>
                            @elseif (! $book->status) <!-- 本が在架の場合 -->
                                <form action="{{ route('books.lendBook', $book) }}" method="POST" onsubmit="return confirm('この本を借りますか？')">
                                    @csrf
                                    <button class="bg-pink-400 text-white hover:bg-pink-500 rounded px-4 py-2 text-xl font-semibold shadow-sm" type="submit">
                                        借りる
                                    </button>
                                </form>
                            @else
                                <span class="bg-slate-400 text-white px-4 py-2 text-xl">
                                    この本は貸出中です
                                </span>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

    <!-- コメント欄 -->
    <div class="text-gray-700 py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2
                class="pb-8 pt-4 text-center text-3xl font-semibold md:text-4xl">
                みんなのコメント
            </h2>

            <!-- コメントフォーム（※ログインユーザーのみ） -->
            @auth
                <!-- コメントフォームを表示するボタン -->
                <div class="{{ $errors->any() ? 'hidden' : '' }} flex justify-center">
                    <button
                        class="bg-teal-500 text-white hover:bg-teal-600 mb-6 rounded px-4 py-2 font-semibold shadow-sm"
                        id="toggleButton">
                        コメントする
                    </button>
                </div>

                <!-- コメント入力フォーム -->
                <div class="{{ $errors->any() ? '' : 'hidden' }}" id="commentForm">
                    <div
                        class="bg-white mb-4 flex justify-center rounded p-4 shadow-md">
                        <div class="flex flex-col justify-center py-6">
                            <!-- エラーメッセージ -->
                            <div class="mb-6">
                                @include("commons.errors")
                            </div>

                            <form
                                method="POST"
                                action="{{ route('comment.store') }}"
                                onsubmit="return confirm('これでコメントしますか？（後から変更できません）')">
                                @csrf

                                <input
                                    type="hidden"
                                    name="book_id"
                                    value="{{ $book->id }}" />
                                <div class="form-group">
                                    <textarea
                                        name="body"
                                        class="bg-gray-200 border-gray-200 @error('comment') border-orange-500 @else border-gray-200 @enderror focus:bg-white focus:ring-teal-500 w-full appearance-none rounded border-2 px-4 py-2 leading-tight focus:border-transparent focus:outline-none focus:ring-2"
                                        id="inline-comment"
                                        cols="30"
                                        rows="10"
                                        placeholder="コメントを255文字以内で入力してください">{{ old("body") }}</textarea>
                                    <p class="@error('comment') text-orange-600 @enderror" id="char-count">0/255 文字</p>
                                </div>

                                <div
                                    class="form-group mt-4 flex justify-center">
                                    <button
                                        class="bg-teal-500 text-white hover:bg-teal-600 ml-2 rounded px-4 py-2 font-semibold shadow-sm">
                                        投稿する
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

            <!-- コメント一覧 -->
            <div class="bg-white flex justify-center rounded p-4">
                <div class="w-[80%] px-4 py-6 my-6">
                    @forelse ($book->comments as $comment)
                        <table
                            class="border-slate-300 container mb-4 w-full border-collapse border">
                            
                            <!-- コメント内容 -->
                            <tr class="border-b text-left">
                                <td class="border-2 p-4 text-lg md:text-xl">
                                    {{ $comment->body }}
                                </td>
                            </tr>

                            <!-- ユーザー名 -->
                            <tr class="border-slate-300">
                                <td class="text-gray-500 px-4 py-2 md:text-lg">
                                    <div
                                        class="flex items-center justify-start">
                                        <span>
                                            {{ $comment->user->name ?? "削除されたユーザー" }}
                                             さん
                                        </span>

                                        <!-- コメント主のみ削除できる -->
                                        @can("delete", $comment)
                                            <form
                                                action="{{ route("comment.destroy", $comment) }}"
                                                method="POST"
                                                onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
                                                @csrf
                                                @method("delete")
                                                <button
                                                    class="bg-orange-500 text-white hover:bg-orange-600 ml-4 rounded px-2 py-1 text-sm shadow-sm"
                                                    type="submit">
                                                    コメントを削除
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        </table>
                    @empty
                        <div class="md:text-lg">コメントはまだありません</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- コメント入力フォームの開閉-->
    <script src="{{ asset('js/commentToggle.js') }}"></script>
    <!-- コメント入力フォームのバリデーション-->
    <script src="{{ asset('js/commentForm.js') }}"></script>

@endsection
