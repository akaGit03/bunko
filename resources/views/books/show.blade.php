@extends('layouts.app_bunko')
@section('content')
<book class="book-detail">
    <h1 class="book-title">{{ $book->title }}</h1>
    <h1 class="book-author">{{ $book->author }}</h1>
    <div class="book-owner">{{ $book->user->name }}</div>
    <div class="book-comment">{!! nl2br(e($book->comment)) !!}</div>
    <div class="book-control">
        <a href="{{ route('books.edit', $book) }}">編集</a>
    </div>
</book>
@endsection