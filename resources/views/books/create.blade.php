@extends('layouts.app_bunko')
@section('content')
@include('commons.errors')
<form action="{{ route('books.store') }}" method="post">
    @include('books.form')
    <button type="submit">登録する</button>
    <a href="{{ route('dashboard') }}">キャンセル</a>
</form>
@endsection