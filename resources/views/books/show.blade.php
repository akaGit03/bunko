@extends('layouts.app_bunko')
@section('content')
{{-- アラート表示 --}}
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif
<book class="book-detail">
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
</book>
@endsection