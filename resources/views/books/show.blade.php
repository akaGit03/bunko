@extends("layouts.app_bunko")
@section("content")
    

    <!-- 本の詳細情報 -->
    <div class="text-gray-700 py-12">
        <div class="flex justify-center">
            <a
                class="bg-slate-400 text-white hover:bg-slate-600 focus:shadow-outline rounded px-4 py-2 font-bold shadow-sm focus:outline-none"
                href="{{ url()->previous() }}">
                戻る
            </a>
        </div>
        <div class="mx-auto max-w-7xl py-8 sm:px-6 lg:px-8">
            <h2
                class="pb-8 pt-4 text-center text-3xl font-semibold md:text-4xl">
                図書情報
            </h2>

            <div class="bg-white mb-4 flex justify-center rounded p-4">
                <div class="w-[80%] px-4 py-6">
                    <!-- 図書情報-->
                    <table
                        class="container w-full border-collapse border md:table">
                        <tr class="block border-b md:table-row md:text-lg">
                            <div>
                                <th class="block p-4 text-left md:table-cell">
                                    タイトル
                                </th>
                                <td class="block p-4 md:table-cell">
                                    {{ $book->title }}
                                </td>
                            </div>
                        </tr>
                        <tr class="block border-b md:table-row md:text-lg">
                            <div>
                                <th class="block p-4 text-left md:table-cell">
                                    著者
                                </th>
                                <td class="block p-4 md:table-cell">
                                    {{ $book->author }}
                                </td>
                            </div>
                        </tr>
                        <tr class="block border-b md:table-row md:text-lg">
                            <div>
                                <th class="block p-4 text-left md:table-cell">
                                    種類
                                </th>
                                <td class="block p-4 md:table-cell">
                                    {{ $book->type->name }}
                                </td>
                            </div>
                        </tr>
                        <tr class="block border-b md:table-row md:text-lg">
                            <div>
                                <th class="block p-4 text-left md:table-cell">
                                    持ち主
                                </th>
                                <td class="block p-4 md:table-cell">
                                    {{ $book->user->name }}
                                </td>
                            </div>
                        </tr>
                    </table>

                    <!-- 持ち主のコメント -->
                    <table class="container my-6 w-full border-collapse border">
                        <tr class="md:text-lg">
                            <th class="px-4 py-2 text-left">持ち主コメント</th>
                        </tr>
                        <tr class="md:text-lg">
                            @if ($book->comment)
                                <td class="border-2 p-4 text-left">
                                    {{ $book->comment }}
                                </td>
                            @else
                                <td class="p-4 text-left"></td>
                            @endif
                        </tr>
                    </table>

                    <!-- 「借りる」ボタンと「返却」ボタン -->
                    <div class="mt-8 flex justify-center">
                        @auth
                            @if ($book->isLent())
                                <form
                                    action="{{ route("books.returnBook", $book) }}"
                                    method="POST"
                                    onsubmit="return confirm('この本を返却しますか？')">
                                    @csrf
                                    <button
                                        class="bg-teal-500 text-white hover:bg-teal-600 rounded px-4 py-2 text-xl font-semibold shadow-sm"
                                        type="submit">
                                        返却する
                                    </button>
                                </form>
                            @elseif (! $book->status)
                                <form
                                    action="{{ route("books.lendBook", $book) }}"
                                    method="POST"
                                    onsubmit="return confirm('この本を借りますか？')">
                                    @csrf
                                    <button
                                        class="bg-pink-400 text-white hover:bg-pink-500 rounded px-4 py-2 text-xl font-semibold shadow-sm"
                                        type="submit">
                                        借りる
                                    </button>
                                </form>
                            @else
                                <span
                                    class="bg-slate-400 text-white px-4 py-2 text-xl">
                                    この本は貸出中です
                                </span>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- コメント欄 -->
    <div class="text-gray-700 pb-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2
                class="pb-8 pt-4 text-center text-3xl font-semibold md:text-4xl">
                コメント
            </h2>

            <!-- コメントフォーム -->
            @auth
                <div class="flex justify-center">
                    <button
                        class="bg-teal-500 text-white hover:bg-teal-600 my-4 rounded px-4 py-2 font-semibold shadow-sm lg:ml-2"
                        id="toggleButton">
                        コメントする
                    </button>
                </div>
                <div class="hidden" id="commentForm">
                    <div
                        class="bg-white mb-4 flex justify-center rounded p-4 shadow-md">
                        <div class="flex justify-center py-6">
                            <form
                                method="POST"
                                action="{{ route("comment.store") }}"
                                onsubmit="return confirm('これでコメントしますか？（後から変更できません）')">
                                @csrf
                                <input
                                    type="hidden"
                                    name="book_id"
                                    value="{{ $book->id }}" />
                                <div class="form-group">
                                    <textarea
                                        name="body"
                                        class="border-4 p-4"
                                        id="body"
                                        cols="30"
                                        rows="6"
                                        placeholder="コメントを255文字以内で入力してください">{{ old("body") }}</textarea>
                                </div>
                                <div
                                    class="form-group mt-4 flex justify-center">
                                    <button
                                        class="bg-teal-500 text-white hover:bg-teal-600 ml-2 rounded px-4 py-2 font-semibold">
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
                <div class="w-[80%] px-4 py-6">
                    @forelse ($book->comments as $comment)
                        <table
                            class="border-slate-300 container mb-4 w-full border-collapse border md:table">
                            <tr class="border-b text-left">
                                <td class="border-2 p-4 text-lg md:text-xl">
                                    {{ $comment->body }}
                                </td>
                            </tr>
                            <tr class="border-slate-300">
                                <td class="text-gray-500 px-4 py-2 md:text-lg">
                                    <div
                                        class="flex items-center justify-start">
                                        <!-- ユーザー名 -->
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
                        <div>コメントはまだありません</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        /* コメントフォームの開閉 */
        document
            .getElementById('toggleButton')
            .addEventListener('click', function () {
                let form = document.getElementById('commentForm');
                let button = document.getElementById('toggleButton');

                form.classList.toggle('hidden');
                button.style.display = 'none';
            });
    </script>
@endsection
