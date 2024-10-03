<!-- formのCSSはBootstrapのまま-->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('commons.errors')
            <h2>編集</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('books.update', $book) }}" method="POST" onsubmit="return confirm('これで更新しますか？')">
                    @method('patch')
                    @include('books.form')
                    <button type="submit">更新</button>
                    <a href="{{ route('books.show', $book)}}">キャンセル</a>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>