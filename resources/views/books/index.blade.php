@extends("layouts.app_bunko")
@section("content")
    <div class="text-slate-600 flex flex-col gap-4 lg:flex-row">
        <!-- 検索窓 -->
        <div class="mb-4 w-full lg:w-1/4">
            <form
                class="bg-white mb-4 rounded p-4 shadow"
                action="{{ route("books.search") }}"
                method="get">
                <div class="mb-2 text-lg font-semibold">本棚検索</div>
                <dl class="mb-4">
                    <dt class="font-medium">キーワード</dt>
                    <dd class="mb-2">
                        <input
                            type="text"
                            name="keyword"
                            class="w-full rounded border px-4 py-2"
                            placeholder="タイトル・著者名"
                            value="{{ Request::get("keyword") }}" />
                    </dd>
                    <dt class="font-medium">持ち主</dt>
                    <dd class="mb-2">
                        <select
                            name="user_id"
                            class="bg-white w-full rounded border px-4 py-2">
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
                    <dt class="font-medium">種類</dt>
                    <dd class="mb-2">
                        <select
                            name="type_id"
                            class="bg-white w-full rounded border px-4 py-2">
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
                    <dt class="font-medium">貸出可否</dt>
                    <dd class="mb-2">
                        <select
                            name="status"
                            class="bg-white w-full rounded border px-4 py-2">
                            <option value=""></option>
                            <option
                                value="0"
                                {{ Request::get("status") === "0" ? "selected" : "" }}>
                                ○：貸出可
                            </option>
                            <option
                                value="1"
                                {{ Request::get("status") === "1" ? "selected" : "" }}>
                                ×：貸出中
                            </option>
                        </select>
                    </dd>
                </dl>
                <div class="mt-4 flex justify-center">
                    <button
                        type="submit"
                        class="bg-pink-400 text-white hover:bg-pink-500 flex w-2/5 items-center justify-center py-2 pr-2 text-lg shadow-sm">
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

        <!-- 検索結果 -->
        <div class="w-full lg:w-3/4">
            <div
                class="bg-white mb-4 flex items-center justify-between rounded p-4">
                <div>検索結果：{{ $count ?? $books->total() }}件</div>
            </div>
            <div class="mb-2 mt-4">
                {{ $books->links("pagination::tailwind") }}
            </div>
            <div class="overflow-auto">
                <table class="bg-white w-full table-auto rounded-md">
                    <thead class="border-pink-300 whitespace-nowrap border-b-2">
                        <tr>
                            <th class="w-1/8 px-4 py-4 text-center">貸出</th>
                            <th class="w-3/8 px-4 py-4 text-left">タイトル</th>
                            <th class="w-2/8 px-4 py-4 text-left">著者</th>
                            <th class="w-1/8 px-4 py-4 text-left">種類</th>
                            <th class="w-1/8 px-4 py-4 text-left">持ち主</th>
                        </tr>
                    </thead>
                    <tbody class="divide-gray-200 divide-y">
                        @foreach ($books as $book)
                            <tr
                                class="hover:bg-yellow-300 transition duration-100">
                                <td class="text-center">
                                    @if ($book->status)
                                        <span class="text-2xl">×</span>
                                    @else
                                        <span class="text-teal-500 text-xl">
                                            ◯
                                        </span>
                                    @endif
                                </td>
                                <td class="hover:text-pink-400 p-4">
                                    <a href="{{ route("books.show", $book) }}">
                                        {{ $book->title }}
                                    </a>
                                </td>
                                <td class="p-4">{{ $book->author }}</td>
                                <td class="p-4">{{ $book->type->name }}</td>
                                <td class="p-4">{{ $book->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mb-4 mt-2">
                {{ $books->links("pagination::tailwind") }}
            </div>
        </div>
    </div>
@endsection
