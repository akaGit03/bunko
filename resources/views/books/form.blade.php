@csrf
@include('commons.errors')
<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <div class="flex mb-2 md:justify-between md:items-center md:ml-14 md:mb-0">
            <label class="block font-bold md:text-right" for="inline-title">
                タイトル
            </label>
            <span class="bg-orange-600 font-semibold text-white px-1 ml-1 rounded-full md:mr-3">必須</span>
        </div>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-transparent focus:ring-2 focus:ring-yellow-400" id="inline-title" type="text" name="title" value="{{ old('title', $book->title) }}">
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <div class="flex mb-2 md:justify-between md:items-center md:ml-14 md:mb-0">
            <label class="block font-bold md:text-right" for="inline-author">
                著者
            </label>
            <span class="bg-orange-600 font-semibold text-white px-1 ml-1 rounded-full md:mr-3">必須</span>
        </div>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-transparent focus:ring-2 focus:ring-yellow-400" id="inline-author" type="text" name="author" value="{{ old('author', $book->author) }}">
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <div class="flex mb-2 md:justify-between md:items-center md:ml-14 md:mb-0">
            <label class="block font-bold md:text-right" for="inline-type">
                種類
            </label>
            <span class="bg-orange-600 font-semibold text-white px-1 ml-1 rounded-full md:mr-3">必須</span>
        </div>
    </div>
    <div class="inline-block relative w-64">
        <select class="block appearance-none w-full bg-gray-200 border-2 border-gray-200 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:bg-white focus:border-transparent focus:ring-2 focus:ring-yellow-400" id="inline-type" name="type_id">
            <option class="bg-white" value=""></option>
            @foreach (App\Models\Type::all() as $type)
            <option class="bg-white" value="{{ $type->id }}"{{ old('type_id', $book->type_id) == $type->id ? ' selected' : ''}}>{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <div class="flex mb-2 md:justify-between md:items-center md:ml-14 md:mb-0">
            <label class="block font-bold md:text-right" for="inline-comment">
                コメント
            </label>
            <span class="bg-slate-500 font-semibold text-white px-1 ml-1 rounded-full md:mr-3">任意</span>
        </div>
    </div>
    <div class="md:w-2/3">
        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-transparent focus:ring-2 focus:ring-yellow-400" id="inline-comment" name="comment" rows="10" value="{{ old('comment', $book->comment) }}" placeholder="感想やおすすめのコメント等。250文字以内でご記入ください。"></textarea>
    </div>
</div>