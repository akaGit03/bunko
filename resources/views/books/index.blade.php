@extends("layouts.app_bunko")
@section("content")
<div class="row">
    <!-- 検索窓 -->
    <div class="col-md-4 col-lg-3  mb-4">
        <form id="searchForm" class="card mb-4" action="{{ route('books.search') }}" method="get">
            <div class="card-header">本棚検索</div>
            <dl class="search-box card-body mb-0">
                <dt>キーワード</dt>
                <dd>
                    <input type="text" name="keyword" class="form-control" placeholder="タイトル・著者名" value="{{ Request::get('keyword') }}">
                </dd>
                <dt>持ち主</dt>
                <dd>
                    <select name="user_id" class="form-select">
                        <option value=""></option>
                        @foreach (App\Models\User::all() as $user)
                        <option value="{{ $user->id }}"{{ Request::get('user_id') == $user->id ? ' selected' : ''}}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </dd>
                <dt>種類</dt>
                <dd>
                    <select name="type_id" class="form-select">
                        <option value=""></option>
                        @foreach (App\Models\Type::all() as $type)
                        <option value="{{ $type->id }}"{{ Request::get('type_id') == $type->id ? ' selected' : ''}}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </dd>
            </dl>
            <div class="card-footer">
                <button type="submit" class="btn w-100 btn-success">検索</button>
            </div>
        </form>
    </div>

    <!-- 検索結果 -->
    <div class="col-md-8 col-lg-9">
        <div class="alert alert-secondary d-flex justify-content-between align-items-center">
            <!-- デフォルトは全件検索結果 -->
            <div>検索結果：<span id="resultCount">{{ $count ?? $books->total() }}</span>件</div>
        </div>
        <div class="pagination">
            {{ $books->links() }}
        </div>

        <div class="table-responsive" id="resultTable">            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th>著者</th>
                        <th>種類</th>
                        <th>持ち主</th>
                    </tr>
                </thead>
                <tbody id="booksTableBody">
                    @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->type->name }}</td>
                        <td>{{ $book->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $books->appends(Request::all())->links() }}
    </div>
</div>

<script>
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // フォームデータを取得
        let formData = new FormData(this);

        // クエリパラメータを作成
        let queryString = new URLSearchParams(formData).toString();

        // 非同期リクエストを送信
        fetch("{{ route('books.search') }}?" + queryString, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'  // XMLHttpRequestを使用していることを示すヘッダー
            },
        })
        .then(response => response.json())
        .then(data => {
            // 検索結果を格納
            let books = data.books.data;
            let count = data.count;

            // 結果件数を更新
            document.getElementById('resultCount').innerHTML = count;

            // テーブルをクリア
            let booksTableBody = document.getElementById('booksTableBody');
            booksTableBody.innerHTML =  '';
            
            // テーブルに検索結果を挿入
            books.forEach(function(book) {
                let row = `
                    <tr>
                        <td>${book.id}</td>
                        <td><a href="/books/${book.id}">${book.title}</a></td>
                        <td>${book.author}</td>
                        <td>${book.type?.name || 'N/A'}</td>
                        <td>${book.user?.name || 'N/A'}</td>
                    </tr>
                `;
                booksTableBody.innerHTML += row;
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
@endsection