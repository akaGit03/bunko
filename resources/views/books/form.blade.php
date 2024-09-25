@csrf 
<dl class="form-list">
    <dt>タイトル</dt>
    <dd><input type="text" name="title" value="{{ old('title', $book->title) }}"></dd>
    <dt>著者</dt>
    <dd><input type="text" name="author" value="{{ old('author', $book->author) }}"></dd>
    <dt>種類</dt>
    <dd>
        <select name="type_id">
            <option value=""></option>
            @foreach (App\Models\Type::all() as $type)
            <option value="{{ $type->id }}"{{ old('type_id', $book->type_id) == $type->id ? ' selected' : ''}}>{{ $type->name }}</option>
            @endforeach
        </select>
    </dd>
    <dt>コメント</dt>
    <dd><textarea name="comment" rows="5"  value="{{ old('comment', $book->comment) }}"></textarea></dd>
</dl>