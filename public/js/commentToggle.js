/** コメント入力欄の開閉 */
document
    .getElementById('toggleButton')
    .addEventListener('click', function () {
        let form = document.getElementById('commentForm');
        let button = document.getElementById('toggleButton');

        form.classList.toggle('hidden');
        button.style.display = 'none';
    });