<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>借りている本</h2>
            <table class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <thead>
                    <tr>
                        <th>タイトル</th><th>著者</th><th>借りた日</th>
                    </tr>
                </thead>
                <tbody class="p-6 text-gray-900">
                    @forelse ($currentBorrows as $borrowing)
                    <tr class="book-item">
                        <td class="book-title"><a href="{{ route('books.show', $borrowing->book) }}">{{ $borrowing->book->title }}</a></td>
                        <td class="book-author">{{ $borrowing->book->author }}</td>
                        <td class="book-author">{{ $borrowing->checkout_date }}</td>
                    </tr>
                    @empty
                    <tr>現在借りている本はありません。</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <br>
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>借出履歴</h2>
            <table class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <thead>
                    <tr>
                        <th>タイトル</th><th>著者</th><th>借りた日</th><th>返却日</th>
                    </tr>
                </thead>
                <tbody class="p-6 text-gray-900">
                    @forelse ($borrowingHistory as $borrowing)
                    <tr class="book-item">
                        <td class="book-title"><a href="{{ route('books.show', $borrowing->book) }}">{{ $borrowing->book->title }}</a></td>
                        <td class="book-author">{{ $borrowing->book->author }}</td>
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
</x-app-layout>