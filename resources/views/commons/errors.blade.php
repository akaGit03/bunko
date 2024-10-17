<!-- エラーメッセージのテンプレート -->
@if ($errors->any())
    <div class="flex justify-center">
        <ul class="alert text-orange-600 mb-8 font-semibold">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
