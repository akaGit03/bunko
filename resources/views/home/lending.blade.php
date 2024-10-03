<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- 貸出中の一覧 -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>貸出中</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>著者</th>
                                <th>借りた人</th>
                                <th>借りた日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($currentLends as $book)
                            <tr class="book-item">
                                <td class="book-title"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                                <td class="book-author">{{ $book->author }}</td>
                                <td class="book-borrower">{{ $book->lendings->first()->user->name }}</td>
                                <td class="book-checkout">{{ $book->lendings->first()->checkout_date }}</td>
                            </tr>
                            @empty
                            <tr>現在貸出中の本はありません</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>

        <!-- 貸出履歴 -->
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>貸出履歴</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>著者</th>
                                <th>借りた人</th>
                                <th>借りた日</th>
                                <th>返却日</th>
                            </tr>
                        </thead>
                        <tbody">
                            @forelse ($lendingHistory as $book)
                            <tr class="book-item">
                                <td class="book-title"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                                <td class="book-author">{{ $book->author }}</td>
                                <td class="book-author">{{ $book->lendings->first()->user->name }}</td>
                                <td class="book-author">{{ $book->lendings->first()->checkout_date }}</td>
                                <td class="book-author">{{ $book->lendings->first()->return_date }}</td>
                            </tr>
                            @empty
                            <tr>まだ貸出はないようです</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>