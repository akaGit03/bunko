@extends('layouts.app_bunko')
@section('content')
<book class="book-detail">
    <h1 class="book-title">{{ $book->title }}</h1>
    <h1 class="book-author">{{ $book->author }}</h1>
    <div class="book-owner">{{ $book->user->name }}</div>
    <div class="book-comment">{!! nl2br(e($book->comment)) !!}</div>
    <div class="book-control">
        <form action="{{ route('books.edit', $book) }}" method="get">
            @csrf
            <button type="submit">編集</button>
        </form>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('books.destroy', $book) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
</book>
@endsection