<!-- 入力フォームのテンプレート -->
@csrf

<!-- バリデーションメッセージ -->
<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
        @include("commons.errors")
    </div>
</div>

<!-- タイトルの入力欄 -->
<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-title">
                タイトル
            </label>
            <span
                class="ml-1 rounded-full bg-orange-600 px-1 font-semibold text-white md:mr-3">
                必須
            </span>
        </div>
    </div>

    <div class="md:w-2/3">
        <input
            class="@error('title') border-orange-500 @else border-gray-200 @enderror w-full appearance-none rounded border-2 border-gray-200 bg-gray-200 px-4 py-2 leading-tight text-gray-700 focus:border-transparent focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500"
            id="inline-title"
            type="text"
            name="title"
            value="{{ old("title", $book->title) }}" />
    </div>
</div>

<!-- 著者名の入力欄 -->
<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-author">
                著者
            </label>
            <span
                class="ml-1 rounded-full bg-orange-600 px-1 font-semibold text-white md:mr-3">
                必須
            </span>
        </div>
    </div>

    <div class="md:w-2/3">
        <input
            class="@error('author') border-orange-500 @else border-gray-200 @enderror w-full appearance-none rounded border-2 border-gray-200 bg-gray-200 px-4 py-2 leading-tight text-gray-700 focus:border-transparent focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500"
            id="inline-author"
            type="text"
            name="author"
            value="{{ old("author", $book->author) }}" />
    </div>
</div>

<!-- 分類の入力欄 -->
<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-type">
                分類
            </label>
            <span
                class="ml-1 rounded-full bg-orange-600 px-1 font-semibold text-white md:mr-3">
                必須
            </span>
        </div>
    </div>

    <div class="relative inline-block w-64">
        <select
            class="@error('type_id') border-orange-500 @else border-gray-200 @enderror block w-full appearance-none rounded border-2 border-gray-200 bg-gray-200 px-4 py-2 pr-8 leading-tight shadow focus:border-transparent focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500"
            id="inline-type"
            name="type_id">
            <!-- 選択肢をDBから作成 -->
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

<!-- コメントの入力欄 -->
<div class="mb-6 md:flex md:items-center">
    <div class="md:w-1/3">
        <div
            class="mb-2 flex md:mb-0 md:ml-14 md:items-center md:justify-between">
            <label class="block font-bold md:text-right" for="inline-comment">
                コメント
            </label>
            <span
                class="ml-1 rounded-full bg-slate-500 px-1 font-semibold text-white md:mr-3">
                任意
            </span>
        </div>
    </div>

    <div class="md:w-2/3">
        <textarea
            class="@error('comment') border-orange-500 @else border-gray-200 @enderror w-full appearance-none rounded border-2 border-gray-200 bg-gray-200 px-4 py-2 leading-tight focus:border-transparent focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500"
            id="inline-comment"
            name="comment"
            rows="10"
            placeholder="感想やおすすめのコメント等。255文字以内でご記入ください。">
{{ old("comment", $book->comment) }}</textarea
        >
        <p class="@error('comment') text-orange-600 @enderror" id="char-count">
            0/255 文字
        </p>
    </div>
</div>

<!-- バリデーション -->
<script src="{{ asset('js/commentForm.js') }}"></script>
