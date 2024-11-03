<x-app-layout>
    <x-slot name="header">
        {{ __("蔵書管理") }}
    </x-slot>

    <!-- 本の登録情報の編集 -->
    <div class="py-12 text-gray-600">
        <div class="mx-auto max-w-7xl px-4 md:px-8">
            <!--
            <div class="flex justify-center mb-10">
                <button type="submit" class="bg-gray-400 font-semibold text-white py-2 px-4 rounded hover:bg-gray-500">
                    <a href="{{ route("home.index") }}">蔵書表に戻る</a>
                </button>
            </div>
            -->

            <h2
                class="pb-8 pt-0 md:pt-2 text-center text-2xl font-semibold md:text-3xl">
                編集
            </h2>

            <div class="overflow-hidden bg-white shadow-sm rounded">
                <div class="flex justify-center py-10 px-4">
                    <form
                        class="w-full max-w-md md:max-w-xl"
                        action="{{ route('books.update', $book) }}"
                        method="POST"
                        onsubmit="return confirm('これで更新しますか？')">
                        @method("patch")

                        @include("books.form")

                        <div class="flex justify-center">
                            <button
                                type="submit"
                                class="w-1/5 focus:shadow-outline rounded bg-teal-500 px-4 py-2 text-xl font-bold text-white shadow-sm hover:bg-teal-600 focus:outline-none whitespace-nowrap"
                                type="button">
                                更新
                            </button>

                            <!--
                            <button type="submit" class="shadow bg-gray-500 text-white font-bold py-2 px-4 ml-2 rounded hover:bg-teal-700 focus:shadow-outline focus:outline-none" type="button">
                                <a href="{{ route("books.show", $book) }}">キャンセル</a>
                            </button>
                            -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
