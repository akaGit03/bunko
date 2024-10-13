@if ($errors->any())
    <div class="flex justify-center">
        <ul class="alert font-semibold text-orange-600 mb-8">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
@endif