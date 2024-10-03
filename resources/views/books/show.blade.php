@extends('layouts.app_bunko')
@section('content')
<a href="{{ route('books.index') }}">戻る</a>
{{-- アラート表示 --}}
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="book-detail">
    <h1 class="book-title">{{ $book->title }}</h1>
    <h1 class="book-author">{{ $book->author }}</h1>
    <div class="book-owner">{{ $book->user->name }}</div>
    <div class="book-comment">{!! nl2br(e($book->comment)) !!}</div>
    <div class="book-control">
        @can('update', $book)
        <form action="{{ route('books.edit', $book) }}" method="get">
            @csrf
            <button type="submit">編集</button>
        </form>
        @endcan
        @can('delete', $book)
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('books.destroy', $book) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
        @endcan

        @auth
            @if (!$book->status)
            <form onsubmit="return confirm('この本を借りますか？')" action="{{ route('books.lendBook', $book) }}" method="post">
                @csrf
                <button type="submit">借りる</button>
            </form>
            @elseif($book->isLent())
            <form onsubmit="return confirm('この本を返却しますか？')" action="{{ route('books.returnBook', $book) }}" method="post">
                @csrf
                <button type="submit">返却</button>
            </form>
            @endif
        @endauth
    </div>
</div>


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
    @can('delete', $comment)
    <form onsubmit="return confirm('本当に削除しますか？（一度削除すると元に戻せません）')" action="{{ route('comment.destroy', $comment) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">コメントを削除</button>
    </form>
    @endcan
</div>
@empty
<div>コメントはまだありません。</div>
@endforelse

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

<div class="card mb-4">
    <form onsubmit="return confirm('これでコメントしますか？（後から変更はできません）')" method="post" action="{{route('comment.store')}}">
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