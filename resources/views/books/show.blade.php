@extends('layouts.app_bunko')
@section('content')
<a href="{{ url()->previous() }}">戻る</a>
<!-- アラート表示 -->
{{-- アラート表示 --}}
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<!--
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
-->

<!-- 詳細情報 -->
<div class="book-detail">
    <h1 class="book-title">{{ $book->title }}</h1>
    <h1 class="book-author">{{ $book->author }}</h1>
    <div class="book-owner">{{ $book->user->name }}</div>
    <div class="book-comment">{!! nl2br(e($book->comment)) !!}</div>

    <!-- ログインユーザー仕様 -->
    <div class="book-control">
        @can('update', $book)
        <form action="{{ route('books.edit', $book) }}" method="get">
            @csrf
            <button type="submit">編集</button>
        </form>
        @endcan
        @can('delete', $book)
        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
        @endcan

        @auth
            @if (!$book->status)
            <form action="{{ route('books.lendBook', $book) }}" method="POST" onsubmit="return confirm('この本を借りますか？')" >
                @csrf
                <button type="submit">借りる</button>
            </form>
            @elseif($book->isLent())
            <form action="{{ route('books.returnBook', $book) }}" method="POST" onsubmit="return confirm('この本を返却しますか？')">
                @csrf
                <button type="submit">返却</button>
            </form>
            @endif
        @endauth
    </div>
</div>

<!-- コメント欄 -->
@forelse ($book->comments as $comment)
<div class="card mb-4">
    <div class="card-body">
        {{$comment->body}}
    </div>
    <div class="card-header">
        {{$comment->user->name ?? '削除されたユーザー'}}
    </div>
    <div class="card-footer">
        <span class="mr-2 float-right">
            投稿日時 {{$comment->created_at->diffForHumans()}}
        </span>
    </div>

    <!-- コメント主のみ -->
    @can('delete', $comment)
    <form action="{{ route('comment.destroy', $comment) }}" method="POST" onsubmit="return confirm('本当に削除しますか？（元に戻せません）')">
        @csrf
        @method('delete')
        <button type="submit">コメントを削除</button>
    </form>
    @endcan
</div>
@empty
<div>コメントはまだありません。</div>
@endforelse

<div class="card mb-4">
    <form method="POST" action="{{route('comment.store')}}" onsubmit="return confirm('これでコメントしますか？（後から変更できません）')">
        @csrf
        <input type="hidden" name='book_id' value="{{$book->id}}">
        <div class="form-group">
            <textarea name="body" class="form-control" id="body" cols="30" rows="5" 
            placeholder="コメントを入力する">{{old('body')}}</textarea>
        </div>
        <div class="form-group mt-4">
        <button class="btn btn-success float-right mb-3 mr-3">コメントする</button>
        </div>
    </form>
</div> 
@endsection

