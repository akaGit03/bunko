<x-app-layout>
    <x-slot name="header">
        {{ __('蔵書管理') }}
    </x-slot>

    <div class="text-gray-600 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-center pt-4 pb-8 md:text-3xl">新規登録</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center py-10">
                    <form class="w-full max-w-md md:max-w-xl" action="{{ route('books.store') }}" method="POST">
                        @include('books.form')
                        <div class="flex justify-center">
                            <button type="submit" class="bg-teal-500 text-white font-bold text-xl py-2 px-4 shadow-sm rounded hover:bg-teal-600 focus:shadow-outline focus:outline-none" type="button">
                                登録
                            </button>
                        </div>
                    </form>
                </div>
             </div>
        </div>
    </div>

</x-app-layout>