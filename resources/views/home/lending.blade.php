<x-app-layout>
    <x-slot name="header">
        {{ __("貸出表") }}
    </x-slot>

    <!-- 貸出中の一覧 -->
    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 md:px-8">
            <h2 class="py-4 px-8 lg:px-6 text-xl sm:text-2xl font-semibold">
                貸出中：{{ count($currentLends) }} 点
            </h2>

            <div class="overflow-auto bg-white shadow-sm rounded">
                <div class="p-4 md:p-6">
                    <table class="container w-full whitespace-nowrap md:whitespace-normal">
                        <thead class="">
                            <tr class="md:text-lg">
                                <th class="w-2/5 px-4 py-4 text-left">
                                    タイトル
                                </th>
                                <th class="w-1/5 px-4 py-4 text-left">著者</th>
                                <th class="w-1/5 px-4 py-4 text-left">
                                    借りた人
                                </th>
                                <th class="w-1/5 px-4 py-4 text-left">
                                    借りた日
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($currentLends as $book)
                                <tr
                                    onclick="window.location.href='{{ route('books.show', $book) }}'"
                                    class="w-full cursor-pointer border-b transition duration-100 hover:bg-custom-yellow hover:text-pink-500">
                                    <td class="px-4 py-4">
                                        {{ $book->title }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $book->author }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $book->lendings->first()->user->name }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ \Carbon\Carbon::parse($book->lendings->first()->checkout_date)->format("Y-m-d") }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-4">
                                        現在貸出中の本はありません
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br />

        <!-- 貸出履歴 -->
        <div class="mx-auto max-w-7xl pt-10 px-4 md:px-8">
            <h2 class="py-4 px-8 lg:px-6 text-xl sm:text-2xl font-semibold">貸出履歴</h2>

            <div class="overflow-auto bg-white shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6">
                    <table class="container w-full whitespace-nowrap md:whitespace-normal">
                        <thead class="">
                            <tr class="md:text-lg">
                                <th class="w-2/6 px-4 py-4 text-left">
                                    タイトル
                                </th>
                                <th class="w-1/6 px-4 py-4 text-left">著者</th>
                                <th class="w-1/6 px-4 py-4 text-left">
                                    借りた人
                                </th>
                                <th class="w-1/6 px-4 py-4 text-left">
                                    借りた日
                                </th>
                                <th class="w-1/6 px-4 py-4 text-left">
                                    返却日
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($lendingHistory as $book)
                                <tr
                                    onclick="window.location.href='{{ route('books.show', $book) }}'"
                                    class="w-full cursor-pointer border-b transition duration-100 hover:bg-custom-yellow hover:text-pink-500">
                                    <td class="px-4 py-4">
                                        {{ $book->title }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $book->author }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $book->lendings->first()->user->name }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ \Carbon\Carbon::parse($book->lendings->first()->checkout_date)->format("Y-m-d") }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ \Carbon\Carbon::parse($book->lendings->first()->return_date)->format("Y-m-d") }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-4">
                                        まだ貸出はないようです
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
