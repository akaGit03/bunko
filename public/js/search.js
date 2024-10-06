document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('searchForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // フォームデータを取得し、クエリパラメータを作成
        let formData = new FormData(this);
        sendSearchRequest(formData);
    });
    
    document.addEventListener('click', function(e) {
        if (e.target.tagName === 'A' && e.target.closest('.pagination')) {
            e.preventDefault();
            fetchPage(e.target.href);
        }
    });
});


/* 非同期検索リクエストを送信する関数 */
function sendSearchRequest(formData) {
    let queryString = new URLSearchParams(formData).toString();
    
    fetch(`/books/search?${queryString}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'  // XMLHttpRequestを使用していることを示すヘッダー
        },
    })
    .then(response => response.json())
    .then(data => updateResults(data))
    .catch(error => console.error('Error:', error));
}

/* 非同期ページネーションリクエストを送信する関数 */
function fetchPage(url) {

    // 現在のフォームデータを取得し、クエリパラメータを作成
    let formData = new FormData(document.getElementById('searchForm'));
    let queryString = new URLSearchParams(formData).toString();

    // URLにクエリパラメータを追加
    if (url.includes('?')) {
        url += '&' + queryString;
    } else {
        url += '?' + queryString;
    }

    fetch(url, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'  // XMLHttpRequestを使用していることを示すヘッダー
        }
    })
    .then(response => response.json())
    .then(data => updateResults(data))
    .catch(error => console.error('Error:', error));
}

/* 検索結果をテーブルに反映する関数 */
function updateResults(data) {
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

    // ページネーションの更新
    document.querySelector('.pagination').innerHTML = data.links;
}