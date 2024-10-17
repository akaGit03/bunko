<!-- 入力フォームのテンプレート -->
@csrf
@include("commons.errors")
<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-title">
                タイトル
            </label>
            <span
                class="bg-orange-600 text-white ml-1 rounded-full px-1 font-semibold md:mr-3">
                必須
            </span>
        </div>
    </div>
    <div class="md:w-2/3">
        <input
            class="bg-gray-200 border-gray-200 text-gray-700 focus:bg-white focus:ring-yellow-400 w-full appearance-none rounded border-2 px-4 py-2 leading-tight focus:border-transparent focus:outline-none focus:ring-2"
            id="inline-title"
            type="text"
            name="title"
            value="{{ old("title", $book->title) }}" />
    </div>
</div>

<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-author">
                著者
            </label>
            <span
                class="bg-orange-600 text-white ml-1 rounded-full px-1 font-semibold md:mr-3">
                必須
            </span>
        </div>
    </div>
    <div class="md:w-2/3">
        <input
            class="bg-gray-200 border-gray-200 text-gray-700 focus:bg-white focus:ring-yellow-400 w-full appearance-none rounded border-2 px-4 py-2 leading-tight focus:border-transparent focus:outline-none focus:ring-2"
            id="inline-author"
            type="text"
            name="author"
            value="{{ old("author", $book->author) }}" />
    </div>
</div>

<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-type">
                種類
            </label>
            <span
                class="bg-orange-600 text-white ml-1 rounded-full px-1 font-semibold md:mr-3">
                必須
            </span>
        </div>
    </div>
    <div class="relative inline-block w-64">
        <select
            class="bg-gray-200 border-gray-200 hover:border-gray-400 focus:bg-white focus:ring-yellow-400 block w-full appearance-none rounded border-2 px-4 py-2 pr-8 leading-tight shadow focus:border-transparent focus:outline-none focus:ring-2"
            id="inline-type"
            name="type_id">
            <option class="bg-white" value=""></option>
            @foreach (App\Models\Type::all() as $type)
                <option
                    class="bg-white"
                    value="{{ $type->id }}"
                    {{ old("type_id", $book->type_id) == $type->id ? " selected" : "" }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-comment">
                コメント
            </label>
            <span
                class="bg-slate-500 text-white ml-1 rounded-full px-1 font-semibold md:mr-3">
                任意
            </span>
        </div>
    </div>
    <div class="md:w-2/3">
        <textarea
            class="bg-gray-200 border-gray-200 focus:bg-white focus:ring-yellow-400 w-full appearance-none rounded border-2 px-4 py-2 leading-tight focus:border-transparent focus:outline-none focus:ring-2"
            id="inline-comment"
            name="comment"
            rows="10"
            value="{{ old("comment", $book->comment) }}"
            placeholder="感想やおすすめのコメント等。250文字以内でご記入ください。"></textarea>
    </div>
</div>
