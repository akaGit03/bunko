document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // フォームデータを取得し、クエリパラメータを作成
    let formData = new FormData(this);
    let queryString = new URLSearchParams(formData).toString();

    // 非同期リクエストを送信
    fetch(`/books/search?${queryString}`, {
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