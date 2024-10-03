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
            <h2>新規登録</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('books.store') }}" method="POST">
                    @include('books.form')
                    <button type="submit">登録する</button>
                    <a href="{{ route('dashboard') }}">キャンセル</a>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>