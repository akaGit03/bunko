<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- 借りている本の一覧 -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>借りている本</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>著者</th>
                                <th>持ち主</th>
                                <th>借りた日</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="p-6 text-gray-900">
                            @forelse ($currentBorrows as $borrowing)
                            <tr class="book-item">
                                <td class="book-title"><a href="{{ route('books.show', $borrowing->book) }}">{{ $borrowing->book->title }}</a></td>
                                <td class="book-author">{{ $borrowing->book->author }}</td>
                                <td class="book-author">{{ $borrowing->book->user->name }}</td>
                                <td class="book-author">{{ $borrowing->checkout_date }}</td>
                                <td class="book-return">
                                <form action="{{ route('books.returnBook', $borrowing->book->id) }}" method="POST" onsubmit="return confirm('この本を返却しますか？')">
                                    @csrf
                                    <button type="submit">返却する</button>
                                </form>
                                </td>
                            </tr>
                            @empty
                            <tr>現在借りている本はありません</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>

        <!-- 借出履歴 -->
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>借出履歴</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>著者</th>
                                <th>持ち主</th>
                                <th>借りた日</th>
                                <th>返却日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($borrowingHistory as $borrowing)
                            <tr class="book-item">
                                <td class="book-title"><a href="{{ route('books.show', $borrowing->book) }}">{{ $borrowing->book->title }}</a></td>
                                <td class="book-author">{{ $borrowing->book->author }}</td>
                                <td class="book-author">{{ $borrowing->book->user->name }}</td>
                                <td class="book-author">{{ $borrowing->checkout_date }}</td>
                                <td class="book-author">{{ $borrowing->return_date }}</td>
                            </tr>
                            @empty
                            <tr>まだ借りたことがありません</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>