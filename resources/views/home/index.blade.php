<x-app-layout>
    <x-slot name="header">
        {{ __('蔵書表') }}
    </x-slot>
    
    <!-- ユーザーの蔵書一覧 -->
    <div class="text-gray-700 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl pl-9 py-4">全 {{ count($books)}} 点</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6 px-4">
                    <table class="container w-full">
                        <thead>
                            <tr class="md:text-lg">
                                <th class="p-4 text-left">タイトル</th>
                                <th class="text-left">著者</th>
                                <th class="text-left">種類</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                            <tr class="w-full border-b hover:bg-yellow-300 transition duration-100">
                                <td class="p-4"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                                <td class="">{{ $book->author }}</td>
                                <td class="">{{ $book->type->name }}</td>
                                @can('update', $book)
                                <td class="text-center">
                                    <form action="{{ route('books.edit', $book) }}" method="get">
                                        @csrf
                                        <button type="submit" class="bg-slate-500 font-semibold text-white py-2 px-4 shadow-sm rounded hover:bg-slate-700">編集</button>
                                    </form>
                                </td>
                                @endcan
                                @can('delete', $book)
                                <td  class="text-center">
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 font-semibold text-white py-2 px-4 shadow-sm rounded hover:bg-red-700">削除</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @empty
                            <tr>
                                <td class="px-4 py-4">まだ蔵書の登録はないみたいです</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>