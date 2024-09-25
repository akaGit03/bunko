@csrf 
<dl class="form-list">
    <dt>タイトル</dt>
    <dd><input type="text" name="title" value="{{ old('title') }}"></dd>
    <dt>著者</dt>
    <div class="invalid-feedback">
        Please choose a username.
    </div>
    <dd><input type="text" name="author" value="{{ old('author') }}"></dd>
    <dt>種類</dt>
    <dd>
        <select name="type_id">
            <option value=""></option>
            @foreach (App\Models\Type::all() as $type)
            <option value="{{ $type->id }}"{{ old('type_id') == $type->id ? ' selected' : ''}}>{{ $type->name }}</option>
            @endforeach
        </select>
    </dd>
    <dt>コメント</dt>
    <dd><textarea name="comment" rows="5"  value="{{ old('comment') }}"></textarea></dd>
</dl>