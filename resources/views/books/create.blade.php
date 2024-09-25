@extends('layouts.app_bunko')
@section('content')
@include('commons.errors')
<form action="{{ route('books.store') }}" method="post">
    @include('books.form')
    <button type="submit">投稿する</button>
    <a href="{{ route('books.index') }}">キャンセル</a>
</form>
@endsection