<!-- エラーメッセージのテンプレート -->
@if ($errors->any())
    <ul class="alert font-semibold text-orange-600">
        @foreach ($errors->all() as $error)
            <li>※ {{ $error }}</li>
        @endforeach
    </ul>
@endif
