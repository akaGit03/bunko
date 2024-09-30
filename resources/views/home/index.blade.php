<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($books as $book)
                    <article class="book-item">
                        <div class="book-title"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></div>
                        <div class="book-author">{{ $book->author }}</div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>