<!-- エラーメッセージのテンプレート -->
@if ($errors->any())
    <ul class="alert text-orange-600 font-semibold">
        @foreach ($errors->all() as $error)
            <li>※ {{ $error }}</li>
        @endforeach
    </ul>
@endif
