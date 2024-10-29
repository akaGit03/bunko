<x-app-layout>
    <x-slot name="header">
        {{ __("蔵書表") }}
    </x-slot>

    <!-- ユーザーの蔵書一覧 -->
    <div class="text-gray-700 py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="py-4 pl-6 text-2xl font-semibold">
                全 {{ count($books) }}点
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-6">
                    <table class="container w-full">
                        <thead>
                            <tr class="md:text-lg">
                                <th class="w-2/7 p-4 text-left">タイトル</th>
                                <th class="w-1/7 text-left">著者</th>
                                <th class="w-1/7 text-left">種類</th>
                                <th class="w-1/7">コメント数</th>
                                <th class="w-1/7">編集</th>
                                <th class="w-1/7">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr
                                    onclick="window.location.href='{{ route('books.show', $book) }}'"
                                    class="hover:bg-custom-yellow hover:text-pink-500 w-full border-b transition duration-100 cursor-pointer">
                                    <td class="w-2/7 p-4">
                                        <a
                                            href="{{ route("books.show", $book) }}">
                                            {{ $book->title }}
                                        </a>
                                    </td>
                                    <td class="w-1/7">{{ $book->author }}</td>
                                    <td class="w-1/7">
                                        {{ $book->type->name }}
                                    </td>
                                    <td class="w-1/7 text-center text-lg">
                                        <a
                                            class="hover:text-pink-400 hover:text-xl hover:font-semibold"
                                            href="{{ route("books.show", $book) }}">
                                            {{ $book->comments()->whereNotNull("body")->count() }}
                                        </a>
                                    </td>
                                    @can("update", $book)
                                        <td class="w-1/7 text-center">
                                            <form
                                                action="{{ route("books.edit", $book) }}"
                                                method="get">
                                                @csrf
                                                <button
                                                    type="submit"
                                                    class="bg-slate-500 text-white hover:bg-slate-600 rounded px-4 py-2 font-semibold shadow-sm">
                                                    編集
                                                </button>
                                            </form>
                                        </td>
                                    @endcan

                                    @can("delete", $book)
                                        <td class="w-1/7 text-center">
                                            <form
                                                action="{{ route("books.destroy", $book) }}"
                                                method="POST"
                                                onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
                                                @csrf
                                                @method("delete")
                                                <button
                                                    type="submit"
                                                    onclick="event.stopPropagation()"
                                                    class="bg-red-500 text-white hover:bg-red-700 rounded px-4 py-2 font-semibold shadow-sm">
                                                    削除
                                                </button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-4">
                                        まだ蔵書の登録はないみたいです
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
