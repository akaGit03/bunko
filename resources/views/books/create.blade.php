<x-app-layout>
    <x-slot name="header">
        {{ __("蔵書管理") }}
    </x-slot>

    <!-- 本の新規登録 -->
    <div class="text-gray-600 py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2
                class="pb-8 pt-4 text-center text-2xl font-semibold md:text-3xl">
                新規登録
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center py-10">
                    <form
                        class="w-full max-w-md md:max-w-xl"
                        action="{{ route("books.store") }}"
                        method="POST">
                        @include("books.form")
                        <div class="flex justify-center">
                            <button
                                type="submit"
                                class="bg-teal-500 text-white hover:bg-teal-600 focus:shadow-outline rounded px-4 py-2 text-xl font-bold shadow-sm focus:outline-none"
                                type="button">
                                登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
