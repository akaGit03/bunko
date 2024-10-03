<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>貸出中</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($currentLends as $book)
                    <article class="book-item">
                        <div class="book-title"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></div>
                        <div class="book-author">{{ $book->author }}</div>
                        <div class="book-borrower">借りた人: {{ $book->lendings->first()->user->name }}</div>
                        <div class="book-checkout">借りた日: {{ $book->lendings->first()->checkout_date }}</div>
                        <div class="book-return">返却日: {{ $book->lendings->first()->return_date }}</div>
                    </article>
                    @empty
                    <div>現在貸出中の本はありません。</div>
                    @endforelse
                </div>
            </div>
        </div>
        <br>
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>貸出履歴</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($lendingHistory as $book)
                    <article class="book-item">
                        <div class="book-title"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></div>
                        <div class="book-author">{{ $book->author }}</div>
                        <div class="book-author">借りた日：{{ $book->checkout_date }}</div>
                        <div class="book-author">返却日：{{ $book->return_date }}</div>
                    </article>
                    @empty
                    <div>まだ貸出はないようです</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>