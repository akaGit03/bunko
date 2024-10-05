<!-- trのCSSはBootstrapのまま-->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- ユーザーの蔵書一覧 -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>著者</th>
                                <th>種類</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody class="p-6 text-gray-900">
                            @foreach ($books as $book)
                            <tr class="book-item">
                                <td class="book-title"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                                <td class="book-author">{{ $book->author }}</td>
                                <td class="book-author">{{ $book->type->name }}</td>
                                @can('update', $book)
                                <td class="book-edit">
                                    <form action="{{ route('books.edit', $book) }}" method="GET">
                                        @csrf
                                        <button type="submit">編集</button>
                                    </form>
                                </td>
                                @endcan
                                @can('delete', $book)
                                <td>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">削除</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>