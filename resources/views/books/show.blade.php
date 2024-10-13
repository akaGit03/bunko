@extends('layouts.app_bunko')
@section('content')

<!-- アラート表示 -->
@if (session('success'))
<div class="bg-yellow-400 text-center text-lg text-gray-700 py-4 my-4">
    {{ session('success') }}
</div>
@endif

<!-- 詳細情報 -->
<div class="text-gray-700 py-12">
    <div class="flex justify-center">
        <a class="shadow-sm bg-slate-400 text-white font-bold py-2 px-4 rounded hover:bg-slate-600 focus:shadow-outline focus:outline-none" href="{{ url()->previous() }}">戻る</a>
    </div>
    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl text-center pt-4 pb-8 md:text-4xl">図書情報</h2>

        <div class="flex justify-center bg-white rounded p-4 mb-4">
            <div class="py-6 px-4 w-[80%]">

                <!-- 図書情報-->
                <table class="border container w-full border-collapse md:table">
                    <tr class="block border-b md:table-row md:text-lg">
                        <div>
                            <th class="block p-4 text-left md:table-cell">タイトル</th>
                            <td class="block p-4 md:table-cell">{{ $book->title }}</td>
                        </div>
                    </tr>
                    <tr class="block border-b md:table-row md:text-lg">
                        <div>
                            <th class="block p-4 text-left md:table-cell">著者</th>
                            <td class="block p-4 md:table-cell">{{ $book->author }}</td>
                        </div>
                    </tr>
                    <tr class="block border-b md:table-row md:text-lg">
                        <div>
                            <th class="block p-4 text-left md:table-cell">種類</th>
                            <td class="block p-4 md:table-cell">{{ $book->type->name }}</td>
                        </div>
                    </tr>
                    <tr class="block border-b md:table-row md:text-lg">
                        <div>
                            <th class="block p-4 text-left md:table-cell">持ち主</th>
                            <td class="block p-4 md:table-cell">{{ $book->user->name }}</td>
                        </div>
                    </tr>
                </table>

                <!-- 持ち主のコメント欄 -->
                <table class="border container w-full border-collapse my-6">
                    <tr class="md:text-lg">
                        <th class="py-2 px-4 text-left">持ち主コメント</th>
                    </tr>
                    <tr class="md:text-lg">
                        @if ($book->comment)
                        <td class="border-2 p-4 text-left">{{ $book->comment }}</td>
                        @else
                        <td class="p-4 text-left"></td>
                        @endif
                    </tr>
                </table>

                <!-- 「借りる」ボタンと「返却」ボタン -->
                <div class="flex justify-center mt-6">
                    @auth
                        @if ($book->isLent())
                        <form action="{{ route('books.returnBook', $book) }}" method="POST" onsubmit="return confirm('この本を返却しますか？')">
                            @csrf
                            <button class="bg-teal-500 font-semibold text-xl text-white py-2 px-4 shadow-sm rounded hover:bg-teal-600" type="submit">返却する</button>
                        </form>
                        @elseif (!$book->status)
                        <form action="{{ route('books.lendBook', $book) }}" method="POST" onsubmit="return confirm('この本を借りますか？')" >
                            @csrf
                            <button class="bg-pink-400 font-semibold text-xl  text-white py-2 px-4 shadow-sm rounded hover:bg-pink-600" type="submit">借りる</button>
                        </form>
                        @else
                        <span class="bg-slate-400 text-xl  text-white py-2 px-4">この本は貸出中です</span>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </div>
</div>

<!-- コメント欄 -->
<div class="text-gray-700 pb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl text-center pt-4 pb-8 md:text-4xl">コメント</h2>

        <!-- コメントフォーム -->
        @auth
        <div class="flex justify-center lg:flex-none lg:justify-normal">
            <button class="bg-teal-500 font-semibold text-white py-2 px-4 mb-4 shadow-sm rounded hover:bg-teal-600 lg:ml-2" id="toggleButton">コメントする</button>
        </div>
        <div class="hidden" id="commentForm">
            <div class="flex justify-center bg-white shadow-md rounded p-4 mb-4">
                <div class="flex justify-center py-6">
                    <form method="POST" action="{{route('comment.store')}}" onsubmit="return confirm('これでコメントしますか？（後から変更できません）')">
                        @csrf
                        <input type="hidden" name='book_id' value="{{$book->id}}">
                        <div class="form-group">
                            <textarea name="body" class="border-4 p-4" id="body" cols="30" rows="6" placeholder="コメントを入力する">{{old('body')}}</textarea>
                        </div>
                        <div class="form-group flex justify-center  mt-4">
                            <button class="bg-teal-500 font-semibold text-white py-2 px-4 ml-2 rounded hover:bg-teal-600">投稿</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endauth

        <!-- コメント一覧 -->
        <div class="flex justify-center bg-white rounded p-4">
            <div class="py-6 px-4 w-[80%]">
                @forelse ($book->comments as $comment)
                <table class="container w-full border border-slate-300 border-collapse md:table mb-4">
                    
                    <!-- sm用 -->
                    <tr class="block text-left md:hidden">
                        <td class="block border-2 text-lg p-4">{{ $comment->body }}</td>
                        <!-- コメント主のみ削除できる -->
                        @can('delete', $comment)
                        <td class="block p-2">
                            <form action="{{ route('comment.destroy', $comment) }}" method="POST" onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
                                @csrf
                                @method('delete')
                                <button class="bg-orange-600 text-white py-2 px-4 shadow-sm rounded hover:bg-orange-700" type="submit">コメントを削除</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    <tr class="block text-left md:hidden">
                        <td class="block text-gray-500 py-2 px-4">{{ $comment->user->name ?? '削除されたユーザー' }} さん</td>
                        <!-- 保留 
                        <td class="block text-sm pb-2 px-4">{{ $comment->created_at }}</td>
                        -->
                    </tr>
                    <!-- sm以上用 -->
                    <tr class="hidden border-b md:table-row md:text-xl">
                        <td colspan="4" class="border-2 p-4">{{ $comment->body }}</td>
                    </tr>
                    <tr class="hidden border-slate-300 md:table-row">
                        <td class="text-gray-500 py-2 px-4 md:text-lg">{{ $comment->user->name ?? '削除されたユーザー' }} さん</td>
                        <td class="flex justify-end items-center">
                            <!-- コメント主のみ削除できる -->
                            @can('delete', $comment)
                            <form class="flex justify-center whitespace-nowrap" action="{{ route('comment.destroy', $comment) }}" method="POST" onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
                                @csrf
                                @method('delete')
                                <button class="bg-orange-600 text-white py-2 px-4 shadow-sm rounded hover:bg-orange-700" type="submit">コメントを削除</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    <!-- 保留
                    <tr class="hidden border-slate-300 md:table-row md:text-sm">
                        <td class="pb-2 px-4">{{ $comment->created_at }}</td>
                    </tr>
                    -->
                </table>
                @empty
                <div>コメントはまだありません</div>
                @endforelse
            </div>
        </div>
    </div>
</div>


<script>
    /* コメントフォームの開閉*/
    document.getElementById('toggleButton').addEventListener('click', function() {
        let form = document.getElementById('commentForm');
        let button = document.getElementById('toggleButton')

        form.classList.toggle('hidden');
        button.style.display = 'none';
    })
</script>

@endsection
