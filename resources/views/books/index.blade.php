@extends("layouts.app-bunko")
@section("content")
    <div class="flex flex-col gap-4 text-slate-600 lg:flex-row">
        <!-- 検索窓 -->
        <div class="mb-4 w-full lg:w-1/4">
            <form
                class="mb-4 p-4 sm:p-8 lg:p-4 rounded bg-white shadow"
                action="{{ route('books.search') }}"
                method="get">
                <!-- <div class="mb-2 text-lg font-semibold text-center">本棚検索</div> -->
                <dl class="mb-4">
                    <!-- キーワードで検索 -->
                    <dt class="mb-1 font-medium">キーワード</dt>
                    <dd class="mb-2">
                        <input
                            type="text"
                            name="keyword"
                            class="w-full rounded border-gray-400 px-4 py-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500"
                            placeholder="タイトル・著者名"
                            value="{{ Request::get('keyword') }}" />
                    </dd>

                    <!-- 持ち主で検索 -->
                    <dt class="mb-1 font-medium">持ち主</dt>
                    <dd class="mb-2">
                        <select
                            name="user_id"
                            class="w-full rounded border-gray-400 bg-white px-4 py-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <option value=""></option>
                            @foreach (App\Models\User::all() as $user)
                                <option
                                    value="{{ $user->id }}"
                                    {{ Request::get("user_id") == $user->id ? " selected" : "" }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </dd>

                    <!-- 分類で検索 -->
                    <dt class="mb-1 font-medium">分類</dt>
                    <dd class="mb-2">
                        <select
                            name="type_id"
                            class="w-full rounded border-gray-400 bg-white px-4 py-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <!-- 選択肢をDBから作成 -->
                            <option value=""></option>
                            @foreach (App\Models\Type::all() as $type)
                                <option
                                    value="{{ $type->id }}"
                                    {{ Request::get("type_id") == $type->id ? " selected" : "" }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </dd>

                    <!-- 在架状況で検索 -->
                    <dt class="mb-1 font-medium">貸出可否</dt>
                    <dd class="mb-2">
                        <select
                            name="status"
                            class="w-full rounded border-gray-400 bg-white px-4 py-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <option value=""></option>
                            <option
                                value="0"
                                {{ Request::get("status") === "0" ? "selected" : "" }}>
                                ○：貸出可
                            </option>
                            <option
                                value="1"
                                {{ Request::get("status") === "1" ? "selected" : "" }}>
                                × ：貸出中
                            </option>
                        </select>
                    </dd>
                </dl>

                <!-- 検索ボタン -->
                <div class="mt-6 mb-2 sm:mb-0 flex justify-center">
                    <button
                        type="submit"
                        class="flex w-1/3 lg:w-2/5 items-center justify-center bg-pink-400 py-2 pr-2 text-lg text-white shadow-sm hover:bg-pink-500">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="22"
                            height="22"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="ml-1">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        検索
                    </button>
                </div>
            </form>
        </div>

        <!-- 検索結果の表示 -->
        <div class="w-full lg:w-3/4">
            <!-- 検索結果数 -->
            <div
                class="mb-4 flex items-center justify-between rounded bg-white p-4">
                <div>検索結果：{{ $count ?? $books->total() }} 件</div>
            </div>

            <!-- ページネーション -->
            <!-- ページネーションのCSS管理: resources/views/vendor/pagination/tailwind.blade.php -->
            <div class="hidden lg:block mb-2 mt-4">
                {{ $books->links("pagination::tailwind") }}
            </div>
            
            <!-- 検索結果の一覧 -->
            <div class="overflow-auto">
                <table class="w-full rounded-md bg-white whitespace-nowrap md:whitespace-normal">
                    <thead class="whitespace-nowrap border-b-2 border-pink-300">
                        <tr>
                            <th class="w-1/8 px-4 py-4 text-center">在架</th>
                            <th class="w-3/8 px-4 py-4 text-left">タイトル</th>
                            <th class="w-2/8 px-4 py-4 text-left">著者</th>
                            <th class="w-1/8 px-4 py-4 text-left">分類</th>
                            <th class="w-1/8 px-4 py-4 text-left">持ち主</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($books as $book)
                            <tr
                                onclick="window.location.href='{{ route('books.show', $book) }}'"
                                class="cursor-pointer transition duration-100 hover:bg-custom-yellow hover:text-pink-500">
                                <td class="text-center">
                                    @if ($book->status)
                                        <span class="text-2xl">×</span>
                                    @else
                                        <span class="text-xl text-teal-500">
                                            ◯
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    {{ $book->title }}
                                </td>
                                <td class="p-4">{{ $book->author }}</td>
                                <td class="p-4">{{ $book->type->name }}</td>
                                <td class="p-4">{{ $book->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ページネーション -->
            <!-- ページネーションのCSS管理: resources/views/vendor/pagination/tailwind.blade.php -->
            <div class="my-4 lg:mt-2">
                {{ $books->links("pagination::tailwind") }}
            </div>
        </div>
    </div>
@endsection
