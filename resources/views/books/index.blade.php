@extends("layouts.app_bunko")
@section("content")

<div class="flex flex-col text-slate-600 lg:flex-row gap-4">
    <!-- 検索窓 -->
    <div class="w-full mb-4 lg:w-1/4">
        <form class="bg-white shadow rounded p-4 mb-4" action="{{ route('books.search') }}" method="get">
            <div class="text-lg font-semibold mb-2">本棚検索</div>
            <dl class="mb-4">
                <dt class="font-medium">キーワード</dt>
                <dd class="mb-2">
                    <input type="text" name="keyword" class="w-full px-4 py-2 border rounded" placeholder="タイトル・著者名" value="{{ Request::get('keyword') }}">
                </dd>
                <dt class="font-medium">持ち主</dt>
                <dd class="mb-2">
                    <select name="user_id" class="w-full bg-white px-4 py-2 border rounded">
                        <option value=""></option>
                        @foreach (App\Models\User::all() as $user)
                        <option value="{{ $user->id }}"{{ Request::get('user_id') == $user->id ? ' selected' : ''}}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </dd>
                <dt class="font-medium">種類</dt>
                <dd class="mb-2">
                    <select name="type_id" class="w-full bg-white px-4 py-2 border rounded">
                        <option value=""></option>
                        @foreach (App\Models\Type::all() as $type)
                        <option value="{{ $type->id }}"{{ Request::get('type_id') == $type->id ? ' selected' : ''}}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </dd>
                <dt class="font-medium">貸出可否</dt>
                <dd class="mb-2">
                    <select name="status" class="w-full bg-white px-4 py-2 border rounded">
                        <option value=""></option>
                        <option value="0" {{ Request::get('status') === '0' ? 'selected' : ''}}>○：貸出可</option>
                        <option value="1" {{ Request::get('status') === '1' ? 'selected' : ''}}>×：貸出中</option>
                    </select>
                </dd>
            </dl>
            <div class="flex justify-center mt-4">
                <button type="submit" class="w-2/5 bg-pink-400 text-white text-lg py-2 shadow-sm hover:bg-pink-600">検索</button>
            </div>
        </form>
    </div>

    <!-- 検索結果 -->
    <div class="w-full lg:w-3/4">
        <div class="bg-white p-4 rounded mb-4 flex justify-between items-center">
            <div>検索結果：{{ $count ?? $books->total() }}件</div>
        </div>
        <div class="mt-4 mb-2">
            {{ $books->links('pagination::tailwind') }}
        </div>
        <div class="overflow-auto">
            <table class="bg-white w-full table-auto rounded-md">
                <thead class="border-b-2 border-pink-300 whitespace-nowrap">
                    <tr>
                        <th class="w-1/8 px-4 py-4 text-center">貸出</th>
                        <th class="w-3/8 px-4 py-4 text-left">タイトル</th>
                        <th class="w-2/8 px-4 py-4 text-left">著者</th>
                        <th class="w-1/8 px-4 py-4 text-left">種類</th>
                        <th class="w-1/8 px-4 py-4 text-left">持ち主</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($books as $book)
                    <tr class="hover:bg-yellow-300 transition duration-100">
                        <td class="text-center">
                            @if ($book->status)
                                <span class="text-2xl">×</span>
                            @else
                                <span class="text-teal-500 text-xl">◯</span>
                            @endif
                        </td>
                        <td class="p-4"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td class="p-4">{{ $book->author }}</td>
                        <td class="p-4">{{ $book->type->name }}</td>
                        <td class="p-4">{{ $book->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2 mb-4">
            {{ $books->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
