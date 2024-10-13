<x-app-layout>
    <x-slot name="header">
        {{ __('借出表') }}
    </x-slot>

    <!-- 借りている本の一覧 -->
    <div class="text-gray-700 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl pl-9 py-4">借りている本 : {{ count($currentBorrows)}} 点</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="container w-full">
                        <thead class="whitespace-nowrap">
                            <tr class="md:text-lg">
                                <th class="px-4 py-4 text-left">タイトル</th>
                                <th class="px-4 py-4 text-left">著者</th>
                                <th class="px-4 py-4 text-left">持ち主</th>
                                <th class="px-4 py-4 text-left">借りた日</th>
                                <th class="px-4 py-4 text-left"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($currentBorrows as $borrowing)
                            <tr class="w-full border-b hover:bg-yellow-300 transition duration-100">
                                <td class="px-4 py-4"><a href="{{ route('books.show', $borrowing->book) }}">{{ $borrowing->book->title }}</a></td>
                                <td class="px-4 py-4">{{ $borrowing->book->author }}</td>
                                <td class="px-4 py-4">{{ $borrowing->book->user->name }}</td>
                                <td class="px-4 py-4">{{ $borrowing->checkout_date }}</td>
                                <td class="px-4 py-4">
                                <form action="{{ route('books.returnBook', $borrowing->book->id) }}" method="POST" onsubmit="return confirm('この本を返却しますか？')">
                                    @csrf
                                    <button type="submit" class="bg-teal-500 font-semibold text-white py-2 px-4 shadow-sm rounded hover:bg-teal-600">返却する</button>
                                </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-4 py-4">現在借りている本はありません</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>

        <!-- 借出履歴 -->
         <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl pl-9 py-4">借出履歴</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="container w-full">
                        <thead class="whitespace-nowrap">
                            <tr class="md:text-lg">
                                <th class="px-4 py-4 text-left">タイトル</th>
                                <th class="px-4 py-4 text-left">著者</th>
                                <th class="px-4 py-4 text-left">持ち主</th>
                                <th class="px-4 py-4 text-left">借りた日</th>
                                <th class="px-4 py-4 text-left">返却日</th>
                                <th class="px-4 py-4 text-left">返却日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($borrowingHistory as $borrowing)
                            <tr class="w-full border-b hover:bg-yellow-300 transition duration-100">
                                <td class="px-4 py-4"><a href="{{ route('books.show', $borrowing->book) }}">{{ $borrowing->book->title }}</a></td>
                                <td class="px-4 py-4">{{ $borrowing->book->author }}</td>
                                <td class="px-4 py-4">{{ $borrowing->book->user->name }}</td>
                                <td class="px-4 py-4">{{ $borrowing->checkout_date }}</td>
                                <td class="px-4 py-4">{{ $borrowing->return_date }}</td>
                                <td class="px-4 py-4">{{ $borrowing->return_date }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-4 py-4">まだ借りたことがありません</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>