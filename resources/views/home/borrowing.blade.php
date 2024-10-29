<x-app-layout>
    <x-slot name="header">
        {{ __("借出表") }}
    </x-slot>

    <!-- 借りている本の一覧 -->
    <div class="text-gray-700 py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="py-4 pl-6 text-2xl font-semibold">
                借りている本 : {{ count($currentBorrows) }}点
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="container w-full">
                        <thead class="whitespace-nowrap">
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
                                    class="hover:bg-custom-yellow hover:text-pink-500 w-full border-b transition duration-100 cursor-pointer">
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
                                        <form
                                            action="{{ route('books.returnBook', $borrowing->book->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('この本を返却しますか？')">
                                            @csrf
                                            <button
                                                type="submit"
                                                onclick="event.stopPropagation()"
                                                class="bg-teal-500 text-white hover:bg-teal-600 rounded px-4 py-2 font-semibold shadow-sm">
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
        <div class="mx-auto max-w-7xl pt-10 sm:px-6 lg:px-8">
            <h2 class="py-4 pl-6 text-2xl font-semibold">借出履歴</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 p-6">
                    <table class="container w-full">
                        <thead class="whitespace-nowrap">
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
                                    class="hover:bg-custom-yellow hover:text-pink-500 w-full border-b transition duration-100 cursor-pointer">
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
