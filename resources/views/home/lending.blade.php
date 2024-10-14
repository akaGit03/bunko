<x-app-layout>
    <x-slot name="header">
        {{ __('貸出表') }}
    </x-slot>

    <!-- 貸出中の一覧 -->
    <div class="text-gray-700 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl pl-9 py-4">貸出中 : {{ count($currentLends)}} 点</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="container w-full">
                        <thead class=" whitespace-nowrap">
                            <tr class="md:text-lg">
                                <th class="w-2/5 px-4 py-4 text-left">タイトル</th>
                                <th class="w-1/5 px-4 py-4 text-left">著者</th>
                                <th class="w-1/5 px-4 py-4 text-left">借りた人</th>
                                <th class="w-1/5 px-4 py-4 text-left">借りた日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($currentLends as $book)
                            <tr class="w-full border-b hover:bg-yellow-300 transition duration-100">
                                <td class="px-4 py-4"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                                <td class="px-4 py-4">{{ $book->author }}</td>
                                <td class="px-4 py-4">{{ $book->lendings->first()->user->name }}</td>
                                <td class="px-4 py-4">{{ \Carbon\Carbon::parse($book->lendings->first()->checkout_date)->format('Y-m-d') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-4 py-4">現在貸出中の本はありません</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>

        <!-- 貸出履歴 -->
         <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl pl-9 py-4">貸出履歴</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="container w-full">
                        <thead class="whitespace-nowrap">
                            <tr class="md:text-lg">
                                <th class="w-2/6 px-4 py-4 text-left">タイトル</th>
                                <th class="w-1/6 px-4 py-4 text-left">著者</th>
                                <th class="w-1/6 px-4 py-4 text-left">借りた人</th>
                                <th class="w-1/6 px-4 py-4 text-left">借りた日</th>
                                <th class="w-1/6 px-4 py-4 text-left">返却日</th>
                            </tr>
                        </thead>
                        <tbody">
                            @forelse ($lendingHistory as $book)
                            <tr class="w-full border-b hover:bg-yellow-300 transition duration-100">
                                <td class="px-4 py-4">{{ $book->title }}</td>
                                <td class="px-4 py-4">{{ $book->author }}</td>
                                <td class="px-4 py-4">{{ $book->lendings->first()->user->name }}</td>
                                <td class="px-4 py-4">{{ \Carbon\Carbon::parse($book->lendings->first()->checkout_date)->format('Y-m-d') }}</td>
                                <td class="px-4 py-4">{{ \Carbon\Carbon::parse($book->lendings->first()->return_date)->format('Y-m-d') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-4 py-4">まだ貸出はないようです</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>