<x-app-layout>
    <x-slot name="header">
        {{ __("借出表") }}
    </x-slot>

    <!-- 借りている本の一覧 -->
    <div class="py-12 text-gray-700">
        <div class="mx-auto max-w-7xl px-4 md:px-8">
            <h2 class="py-4 px-8 lg:px-6 text-xl sm:text-2xl font-semibold">
                借りている本：{{ count($currentBorrows) }} 点
            </h2>

            <div class="overflow-auto bg-white shadow-sm rounded">
                <div class="p-4 md:p-6">
                    <table class="container w-full whitespace-nowrap md:whitespace-normal">
                        <thead class="">
                            <tr class="md:text-lg">
                                <th class="w-2/6 px-4 py-4 text-left">
                                    タイトル
                                </th>
                                <th class="w-1/6 px-4 py-4 text-left">著者</th>
                                <th class="w-1/6 px-4 py-4 text-left">
                                    持ち主
                                </th>
                                <th class="w-1/6 px-4 py-4 text-left">
                                    借りた日
                                </th>
                                <th class="w-1/6 px-4 py-4 text-left"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($currentBorrows as $borrowing)
                                <tr
                                    onclick="window.location.href='{{ route('books.show', $borrowing->book) }}'"
                                    class="w-full cursor-pointer border-b transition duration-100 hover:bg-custom-yellow hover:text-pink-500">
                                    <td class="px-4 py-4">
                                        {{ $borrowing->book->title }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $borrowing->book->author }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $borrowing->book->user->name }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ \Carbon\Carbon::parse($borrowing->checkout_date)->format("Y-m-d") }}
                                    </td>

                                    <!-- 返却ボタン -->
                                    <td class="px-4 py-4">
                                        <form
                                            action="{{ route('books.returnBook', $borrowing->book->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('この本を返却しますか？')">
                                            @csrf

                                            <button
                                                type="submit"
                                                onclick="event.stopPropagation()"
                                                class="rounded bg-teal-500 px-4 py-2 font-semibold text-white shadow-sm hover:bg-teal-600 whitespace-nowrap">
                                                返却する
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-4">
                                        現在借りている本はありません
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br />

        <!-- 借出履歴 -->
        <div class="mx-auto max-w-7xl pt-10 px-4 md:px-8">
            <h2 class="py-4  px-8 lg:px-6 text-xl sm:text-2xl font-semibold">借出履歴</h2>

            <div class="overflow-auto bg-white shadow-sm rounded">
                <div class="p-4 md:p-6">
                    <table class="container w-full whitespace-nowrap md:whitespace-normal">
                        <thead class="">
                            <tr class="md:text-lg">
                                <th class="w-2/6 px-4 py-4 text-left">
                                    タイトル
                                </th>
                                <th class="w-1/6 px-4 py-4 text-left">著者</th>
                                <th class="w-1/6 px-4 py-4 text-left">
                                    持ち主
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
                            @forelse ($borrowingHistory as $borrowing)
                                <tr
                                    onclick="window.location.href='{{ route('books.show', $borrowing->book) }}'"
                                    class="w-full cursor-pointer border-b transition duration-100 hover:bg-custom-yellow hover:text-pink-500">
                                    <td class="px-4 py-4">
                                        {{ $borrowing->book->title }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $borrowing->book->author }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ $borrowing->book->user->name }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ \Carbon\Carbon::parse($borrowing->checkout_date)->format("Y-m-d") }}
                                    </td>
                                    <td class="px-4 py-4">
                                        {{ \Carbon\Carbon::parse($borrowing->return_date)->format("Y-m-d") }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-4">
                                        まだ借りたことがありません
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
