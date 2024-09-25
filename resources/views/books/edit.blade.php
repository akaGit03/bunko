@extends('layouts.app_bunko')
@section('content')
<form onsubmit="return confirm('これで更新しますか？')" action="{{ route('books.update', $book) }}" method="post">
    @method('patch')
    @include('books.form')
    <button type="submit">更新</button>
    <a href="{{ route('books.show', $book)}}">キャンセル</a>
</form>
@endsection